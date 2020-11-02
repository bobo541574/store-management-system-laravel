<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\ColorAttribute;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\SizeAttribute;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductAttribute::all();

        return view('backend.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        (old('row') > 0) ? ($rowCount = count(old('row'))) : ($rowCount = 0);

        $brands = Brand::all();
        $suppliers = Supplier::all();
        $colors = ColorAttribute::orderBy('name')->get();
        $sizes = SizeAttribute::orderBy('number')->get();

        return view('backend.products.create', compact('brands', 'suppliers', 'colors', 'sizes', 'rowCount'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        DB::beginTransaction();

        try {

            $product = Product::create([
                'brand_id'  => $request->brand,
                'supplier_id' => $request->supplier,
                'product_code' => $request->product_code,
                'name'  => $request->name,
                'arrived'   => $request->arrived
            ]);

            $dir = '/img/product/';
            $photos = [];

            foreach ($request->row as $attribute) {
                foreach ($attribute['photo'] as $photo) {
                    $upload_path = public_path() . $dir;
                    $image = $photo->getClientOriginalName();
                    if (!$image == false) {
                        $photo->move($upload_path, $image);
                    }
                    array_push($photos, $image);
                }

                $product->productAttrs()->create([
                    'photo' => json_encode($photos),
                    'color_attribute_id' => $attribute['color'],
                    'size_attribute_id' => $attribute['size'],
                    'quantity' => $attribute['quantity'],
                    'price' => $attribute['price'],
                    'cost' => $attribute['cost'],
                    'description' => "This is a product attribute.",
                    'status' => $attribute['status']
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('products.index')->with('error', 'Hey, you have some error.');
        }

        return redirect()->route('products.index')->with('success', 'Your product has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attribute = ProductAttribute::findOrFail($id);
        return view('backend.products.show', compact('attribute'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // dd(old('row'));
        (old('row') > 0) ? ($rowCount = count(old('row'))) : ($rowCount = 0);

        $brands = Brand::all();
        $suppliers = Supplier::all();
        $colors = ColorAttribute::orderBy('name')->get();
        $sizes = SizeAttribute::orderBy('number')->get();

        return view('backend.products.edit', compact('product', 'brands', 'suppliers', 'colors', 'sizes', 'rowCount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        // dd($request->all());
        DB::beginTransaction();

        try {
            $product = Product::findOrFail($id);
            $product->brand_id  = $request->brand;
            $product->supplier_id = $request->supplier;
            $product->product_code = $request->product_code;
            $product->name  = $request->name;
            $product->arrived   = $request->arrived;
            $product->save();

            $dir = '/img/product/';
            $photos = [];

            foreach ($product->productAttrs as $key => $attribute) {
                $hasPhoto = ($request->row[$key]['photo'] ?? false);
                if (!$hasPhoto) {
                    $photos = $request->row[$key]['old_photo'];
                } else {
                    foreach ($request->row[$key]['photo'] as $photo) {
                        $upload_path = public_path() . $dir;
                        $image = $photo->getClientOriginalName();
                        if (!$image == false) {
                            $photo->move($upload_path, $image);
                        }
                        array_push($photos, $image);
                    }
                    $photos = json_encode($photos);
                }

                $attribute->photo   = $photos;
                $attribute->color_attribute_id  = $request->row[$key]['color'];
                $attribute->size_attribute_id   = $request->row[$key]['size'];
                $attribute->quantity    = $request->row[$key]['quantity'];
                $attribute->price   = $request->row[$key]['price'];
                $attribute->cost    = $request->row[$key]['cost'];
                $attribute->description = "This is a product attribute.";
                $attribute->status  = $request->row[$key]['status'];
                $attribute->save();
            }

            for ($key; $key < (count($request->row) - 1);) {
                ++$key;
                $product->productAttrs()->create([
                    'photo' => $photos,
                    'color_attribute_id' => $request->row[$key]['color'],
                    'size_attribute_id' => $request->row[$key]['size'],
                    'quantity' => $request->row[$key]['quantity'],
                    'price' => $request->row[$key]['price'],
                    'cost' => $request->row[$key]['cost'],
                    'description' => "This is a product attribute.",
                    'status' => $request->row[$key]['status']
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()->route('products.index')->with('error', 'Hey, you have some error.');
        }
        return redirect()->route('products.index')->with('success', 'Your product has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::where('product_attr_id', $id)->first();

        if ($order) {
            return redirect()->route('products.index')->with('info', 'Hey, you cannot delete it because you have been already ordered.');
        } else {
            $attribute = ProductAttribute::findOrFail($id);
            $attribute->delete();
            return redirect()->route('products.index')->with('success', 'Your product has been deleted.');
        }
    }

    public function attributeRemove($id)
    {
        $attribute = ProductAttribute::findOrFail($id);

        $images = json_decode($attribute->photo);
        $dir = public_path() . "/img/product/";

        foreach ($images as $image) {
            $hasPhoto = file_exists($dir . $image);
            if ($hasPhoto) {
                \File::delete($dir . $image);
            }
        }

        $attribute->delete();

        return response()->json([
            'data'  => "success"
        ]);
    }

    public function showExtraCost(Product $model)
    {
        $productArrived = [];
        $productArrivedSupplier = [];
        $products = Product::orderBy('arrived', 'desc')->get()->groupBy(['arrived', 'supplier_id']);

        // foreach ($products as $product) {
        //     foreach ($product as $supplier) {
        //         foreach ($supplier as $arrived) {
        //             // echo "<pre>";
        //             // echo $arrived->name . ", " . $arrived->supplier->name . ", " . $arrived->arrived;
        //             // echo "</pre>";
        //             array_push($productArrived, $arrived);
        //         }
        //         array_push($productArrivedSupplier, $productArrived);

        //         // echo "<hr />";
        //     }
        // }
        // dd($productArrivedSupplier[0][0]['name']);

        return view('backend.products.extra_cost', compact('products', 'model'));
    }

    public function addExtraCost(Request $request, $id)
    {
        $supplier = Supplier::find($id);

        $products = $supplier->products()->where('arrived', $request->arrived)->get();
        $totalQuantity = 0;
        $extra = 0;
        foreach ($products as $product) {
            foreach ($product->productAttrs as $attribute) {
                $totalQuantity += $attribute->quantity;
            }
        }
        $extra = $request->extra / $totalQuantity;

        DB::beginTransaction();

        try {
            foreach ($products as $product) {
                foreach ($product->productAttrs as $attribute) {
                    $attribute->extra = $extra;
                    $attribute->save();
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('attributes.show.extra')->with('error', 'Hey, you have some error.');
        }
        return redirect()->route('attributes.show.extra')->with('success', 'Your product has been updated.');
    }
}