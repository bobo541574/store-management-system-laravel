@extends('backend.templates.master')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow text-left">
            <div class="card-header h3 text-primary font-weight-bold">
                Check Out Detail
            </div>
            <div class="card-body">
                {{-- <div class="row text-center">
                    <div class="col-md-4 offset-md-4">
                        @foreach ($order->productAttr->images as $photo)
                            <img src="{{ $photo }}" width="130px" alt="logo">
                        @endforeach
                        <h4 class="text-primary font-weight-bold my-4">{{ $order->customer_name }}</h4>
                    </div>
                </div> --}}
                {{-- <hr style="border: 1px solid #cfcfcf" /> --}}

                <div class="row mx-3">
                    <div class="col-md-4 h6 text-dark font-weight-bold">
                        <i class="fa fa-barcode" aria-hidden="true"></i> &nbsp;&nbsp;Order Code :
                    </div>
                    <div class="col-md-8 h6 text-dark font-weight-bold">
                        <li><a href="{{ route('orders.show', $checkout->order->id) }}">{{ $checkout->order->order_code }}</a></li>
                    </div>
                </div>
                <div class="row mx-3">
                    <div class="col-md-4 h6 text-dark font-weight-bold">
                        <i class="fa fa-barcode" aria-hidden="true"></i> &nbsp;&nbsp;Product :
                    </div>
                    <div class="col-md-8 h6 text-dark font-weight-bold">
                        <li><a href="{{ route('products.show', $checkout->order->productAttr->id) }}">{{ $checkout->order->productAttr->product->name }}</a></li>
                    </div>
                </div>
                <div class="row mx-3">
                    <div class="col-md-4 h6 text-dark font-weight-bold">
                        <i class="fa fa-user-circle" aria-hidden="true"></i> &nbsp;&nbsp;Customer Name :
                    </div>
                    <div class="col-md-8 h6 text-dark font-weight-bold">
                        <li>{{ $checkout->order->customer_name }}</li>
                    </div>
                </div>
                <div class="row mx-3">
                    <div class="col-md-4 h6 text-dark font-weight-bold">
                        <i class="fa fa-phone"></i> &nbsp;&nbsp;Phone :
                    </div>
                    <div class="col-md-8 h6 text-dark font-weight-bold">
                        <li><a href="tel://{{ $checkout->order->phone }}">{{ $checkout->order->phone }}</a></li>
                    </div>
                </div>
                <div class="row mx-3">
                    <div class="col-md-4 h6 text-dark font-weight-bold">
                        <i class="fa fa-info-circle" aria-hidden="true"></i> &nbsp;&nbsp;Quantity :
                    </div>
                    <div class="col-md-8 h6 text-dark font-weight-bold">
                        <li>{{ $checkout->order->quantity }}</li>
                    </div>
                </div>
                <div class="row mx-3">
                    <div class="col-md-4 h6 text-dark font-weight-bold">
                        <i class="fas fa-dollar-sign"></i> &nbsp;&nbsp;Discount :
                    </div>
                    <div class="col-md-8 h6 text-dark font-weight-bold">
                        <li>{{ $checkout->discount }} / MMK</li>
                    </div>
                </div>
                <div class="row mx-3">
                    <div class="col-md-4 h6 text-dark font-weight-bold">
                        <i class="fas fa-dollar-sign"></i> &nbsp;&nbsp;Total Price :
                    </div>
                    <div class="col-md-8 h6 text-dark font-weight-bold">
                        <li>{{ $checkout->total_price }} /MMK</li>
                    </div>
                </div>
                <div class="row mx-3">
                    <div class="col-md-4 h6 text-dark font-weight-bold">
                        <i class="fas fa-credit-card"></i> &nbsp;&nbsp;Payment Method :
                    </div>
                    <div class="col-md-8 h6 text-dark font-weight-bold">
                        <li>{{ $checkout->payment->name }}</li>
                    </div>
                </div>
                <div class="row mx-3">
                    <div class="col-md-4 h6 text-dark font-weight-bold">
                        <i class="fa fa-clock" aria-hidden="true"></i> &nbsp;&nbsp;Payment Date :
                    </div>
                    <div class="col-md-8 h6 text-dark font-weight-bold">
                        <li>{{ $checkout->created_at->diffForHumans() }}</li>
                    </div>
                </div>
                {{-- <hr style="border: 1px solid #cfcfcf" /> --}}

            </div>
        </div>
    </div>
    @endsection
