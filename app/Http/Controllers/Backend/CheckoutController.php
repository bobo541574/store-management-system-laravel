<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\Checkout;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checkouts = Checkout::orderBy('payment_date', 'desc')->get();

        return view('backend.checkouts.index', compact('checkouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $payments = Payment::all();

        return view('backend.checkouts.create', compact('order', 'payments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckoutRequest $request)
    {
        DB::beginTransaction();

        try {
            Checkout::create([
                'order_id'  => $request->order_id,
                'discount'  => $request->discount ?? 0,
                'quantity'  => $request->quantity,
                'total_price'   => $request->total_price,
                'payment_id'    => $request->payment_type,
                'payment_date'  => $request->payment_date,
            ])->order->toggleStatus()->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
            return redirect()->route('checkouts.index')->with('error', 'Hey, you have some error.');
        }
        return redirect()->route('checkouts.index')->with('success', 'Your checkout has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkout)
    {
        return view('backend.checkouts.show', compact('checkout'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        $order = Order::findOrFail($checkout->order_id);

        $payments = Payment::all();

        return view('backend.checkouts.edit', compact('order', 'checkout', 'payments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CheckoutRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            $checkout = new Checkout();
            $checkout->order_id  = $request->order_id;
            $checkout->quantity  = $request->quantity;
            $checkout->discount  = $request->discount ?? 0;
            $checkout->total_price   = $request->total_price;
            $checkout->payment_id    = $request->payment_type;
            $checkout->payment_date  = $request->payment_date;
            $checkout->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            // throw $e;
            return redirect()->route('checkouts.index')->with('error', 'Hey, you have some error.');
        }
        return redirect()->route('checkouts.index')->with('success', 'Your checkout has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        DB::beginTransaction();

        try {
            $checkout->order->toggleStatus()->save();

            $checkout->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('checkouts.index')->with('error', 'Hey, you have some error.');
        }

        return redirect()->route('checkouts.index')->with('success', 'Your checkout has been deleted.');
    }
}