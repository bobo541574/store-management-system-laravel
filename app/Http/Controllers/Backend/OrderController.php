<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\ProductAttribute;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct()
    {
        return date_default_timezone_set('Asia/Yangon');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('status', 0)->orderBy('ordered', 'desc')->get();

        return view('backend.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $attribute = ProductAttribute::findOrFail($request->attribute_id);

        return view('backend.orders.create', compact('attribute'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $order_code = 'OID' . date('-d-m-Y-h-i-s-') . strtolower($request->color) . '-' . str_replace('-', '', $request->size) . '-' . str_replace(' ', '', strtolower($request->name));

        DB::beginTransaction();

        try {
            Order::create([
                'product_attr_id'    => $request->product_attr_id,
                'order_code'    => $order_code,
                'customer_name'  => $request->name,
                'phone' => $request->phone,
                'quantity'  => $request->quantity,
                'ordered'  => $request->order_date,
                'discount'  => $request->discount ?? 0,
            ]);

            ProductAttribute::findOrFail($request->product_attr_id)->decrement('quantity', $request->quantity);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;

            return redirect()->route('orders.index')->with('error', 'Hey, you have some error.');
        }

        return redirect()->route('orders.index')->with('success', 'Your order has been creaded.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('backend.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('backend.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, $id)
    {
        $order_code = 'OID' . date('-d-m-Y-h-i-s-') . strtolower($request->color) . '-' . str_replace('-', '', $request->size) . '-' . str_replace(' ', '', strtolower($request->name));

        DB::beginTransaction();

        try {

            $order = Order::findOrFail($id);
            $order->order_code    = $order_code;
            $order->customer_name  = $request->name;
            $order->phone = $request->phone;
            $quantity = ($request->quantity > $order->quantity) ? ($request->quantity - $order->quantity) : ($order->quantity - $request->quantity);
            $order->quantity  = $request->quantity;
            $order->ordered = $request->order_date;
            $order->discount  = $request->discount ?? 0;
            $order->save();

            ProductAttribute::findOrFail($request->product_attr_id)->decrement('quantity', $quantity);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;

            return redirect()->route('orders.index')->with('error', 'Hey, you have some error.');
        }

        return redirect()->route('orders.index')->with('success', 'Your order has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order, Request $request)
    {
        DB::beginTransaction();

        try {
            $order->productAttr->quantity += $request->quantity;
            $order->productAttr->save();

            $order->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;

            return redirect()->route('orders.index')->with('error', 'Hey, you have some error.');
        }
        return redirect()->route('orders.index')->with('success', 'Your order has been deleted.');
    }
}