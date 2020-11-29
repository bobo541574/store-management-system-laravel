<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\SizeAttribute;
use App\Models\ColorAttribute;
use App\Models\ProductAttribute;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductAttribute::orderBy('arrived', 'desc')->get();

        return view('backend.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(old('row'));
        (old('row') > 0) ? ($rowCount = count(old('row'))) : ($rowCount = 0);

        $subcategories = SubCategory::where('status', 'On')->orderBy('name')->get();
        $brands = Brand::orderBy('name')->get();
        $suppliers = Supplier::orderBy('name')->get();
        $colors = ColorAttribute::orderBy('name')->get();
        $sizes = SizeAttribute::orderBy('number')->get();

        return view('backend.products.create', compact('subcategories', 'brands', 'suppliers', 'colors', 'sizes', 'rowCount'));
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
                'subcategory_id'  => $request->subcategory,
                'brand_id'  => $request->brand,
                'supplier_id' => $request->supplier,
                'product_code' => $request->product_code,
                'name'  => $request->name,
                'arrived'   => now(),
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
                    'status' => $attribute['status'],
                    'arrived'   => $attribute['arrived']
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
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
        (old('row') > 0) ? ($rowCount = count(old('row'))) : ($rowCount = 0);

        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $suppliers = Supplier::all();
        $colors = ColorAttribute::orderBy('name')->get();
        $sizes = SizeAttribute::orderBy('number')->get();

        return view('backend.products.edit', compact('product', 'subcategories', 'brands', 'suppliers', 'colors', 'sizes', 'rowCount'));
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
            $product->subcategory_id  = $request->subcategory;
            $product->brand_id  = $request->brand;
            $product->supplier_id = $request->supplier;
            $product->product_code = $request->product_code;
            $product->name  = $request->name;
            $product->arrived   = now();
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
                $attribute->arrived  = $request->row[$key]['arrived'];
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
                    'status' => $request->row[$key]['status'],
                    'arrived' => $request->row[$key]['arrived']
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {

            DB::rollBack();
            throw $e;
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

    public function showExtraCost()
    {
        $productArrivedBySupplier = [];
        $count = 0;
        $products_supplier = Product::all();
        foreach ($products_supplier->sortBy('supplier_id')->groupBy('supplier_id') as $supplier) {

            foreach ($supplier as $products) {
                foreach ($products->productAttrs as $attribute) {
                    array_push($productArrivedBySupplier, $attribute);
                }
                // foreach ($products->productAttrs->groupBy('arrived') as $product) {
                //     array_push($productArrivedBySupplier, $product);
                // }
            }
        }



        // // $productAttrs = ProductAttribute::orderBy('arrived')->get()->groupBy('arrived');
        // // foreach ($productAttrs as $attribute) {
        // //     array_push($productArrivedSupplier, $attribute);
        // //     // array_push($productArrivedSupplier, $attribute->pluck('cost'));
        // // }
        // dd($productArrivedBySupplier[0]);

        dd($productArrivedBySupplier);
        // // dd($products_supplier);
        // dd($productsBySupplier[0]['2020-10-11']->first()->product_id);
        // // dd(collect($productArrivedSupplier[2]));

        return view('backend.products.extra_cost', compact('productArrivedBySupplier'));
    }

    public function addExtraCostToAttributes(Request $request)
    {

        $check = array_column(json_decode($request->check), 'id');
        if ($check == null) {
            return redirect()->back()->with('info', "Hey, you have not been anything checked!");
        }

        $attributes = ProductAttribute::whereIn('id', $check)->get();

        $extra = $request->extra / $attributes->pluck('quantity')->sum();

        foreach ($attributes as $attribute) {
            $attribute->extra = $extra;
            $attribute->save();
        }

        return redirect()->back()->with('success', "You have been updated extra cost!");
    }

    // public function addExtraCost(Request $request, $id)
    // {
    //     if ($request->extra == 0) {
    //         return redirect()->route('attributes.show.extra')->with('info', 'Your have not filled extra cost.');
    //     }

    //     $supplier = Supplier::find($id);

    //     $products = $supplier->products()->where('arrived', $request->arrived)->get();
    //     $totalQuantity = 0;
    //     $extra = 0;
    //     foreach ($products as $product) {
    //         foreach ($product->productAttrs as $attribute) {
    //             $totalQuantity += $attribute->quantity;
    //         }
    //     }
    //     $extra = $request->extra / $totalQuantity;

    //     DB::beginTransaction();

    //     try {
    //         foreach ($products as $product) {
    //             foreach ($product->productAttrs as $attribute) {
    //                 $attribute->extra = $extra;
    //                 $attribute->save();
    //             }
    //         }

    //         DB::commit();
    //     } catch (\Exception $e) {
    //         DB::rollBack();

    //         return redirect()->route('attributes.show.extra')->with('error', 'Hey, you have some error.');
    //     }
    //     return redirect()->route('attributes.show.extra')->with('success', 'Your product has been updated.');
    // }
}