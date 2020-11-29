<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Report;
use App\Models\Product;
use App\Models\Checkout;
use Barryvdh\DomPDF\PDF;
use App\Exports\ExcelExport;
use Illuminate\Http\Request;
use App\Models\ProductAttribute;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order_quantities = Order::groupByMonth('quantity');
        $product_quantities = Product::groupByMonth('quantity');
        $checkout_quantities = Checkout::groupByMonth('quantity');

        return view('backend.dashboard', compact('order_quantities', 'product_quantities', 'checkout_quantities'));
    }


    public function orderList($date = null)
    {
        $month = date_format(date_create($date), "m") ?? $month = now()->month;
        $year = date_format(date_create($date), "Y") ?? $year = now()->year;
        $orders = Order::where('status', 0)->whereYear('ordered', $year)->whereMonth('ordered', $month)->orderBy('ordered', 'desc')->getOrderList();
        if ($date == null) {
            return view('backend.reports.orders', compact('orders'));
        } else {
            return response()->json([
                'orders'  => $orders
            ]);
        }
    }

    public function productList($date = null)
    {
        $month = date_format(date_create($date), "m") ?? $month = now()->month;
        $year = date_format(date_create($date), "Y") ?? $year = now()->year;
        $products = Product::whereYear('arrived', $year)->whereMonth('arrived', $month)->orderBy('arrived', 'desc')->productAttributes();
        if ($date == null) {
            return view('backend.reports.products', compact('products'));
        } else {
            return response()->json([
                'total_cost'    => $products['total_cost'],
                'total_price'    => $products['total_price'],
                'total_profit'    => $products['total_profit'],
                'productByArrived'  => $products['productByArrived']
            ]);
        }
    }

    public function export(Request $request, $type)
    {
        $month = date_format(date_create($request->excel_date ?? $request->pdf), "m") ?? $month = now()->month;
        $year = date_format(date_create($request->excel_date ?? $request->pdf), "Y") ?? $year = now()->year;
        $products = Product::whereYear('arrived', $year)->whereMonth('arrived', $month)->orderBy('arrived', 'desc')->productAttributes();

        if ($type == "pdf") {
            return (new ExcelExport($products['productByArrived']))->download('productByArrived-' . date_format(now(), 'Y-M-d H-i-s') . '.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
        }

        return Excel::download(new ExcelExport($products['productByArrived']), 'productByArrived-' . date_format(now(), 'Y-M-d H-i-s') . '.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}