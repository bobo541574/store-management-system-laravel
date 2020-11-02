@extends('backend.templates.master')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow text-left">
            <div class="card-header h3 text-primary font-weight-bold">
                Order Detail
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-4 offset-md-4">
                        @foreach ($order->productAttr->images as $photo)
                            <img src="{{ $photo }}" width="130px" alt="logo">
                        @endforeach
                        <h4 class="text-primary font-weight-bold my-4">{{ $order->customer_name }}</h4>
                    </div>
                </div>
                <hr style="border: 1px solid #cfcfcf" />

                <div class="row mx-3">
                    <div class="col-md-4 h6 text-dark font-weight-bold">
                        <i class="fa fa-barcode" aria-hidden="true"></i> &nbsp;&nbsp;Order Code :
                    </div>
                    <div class="col-md-8 h6 text-dark font-weight-bold">
                        <li>{{ $order->order_code }}</li>
                    </div>
                </div>
                <div class="row mx-3">
                    <div class="col-md-4 h6 text-dark font-weight-bold">
                        <i class="fa fa-phone"></i> &nbsp;&nbsp;Phone :
                    </div>
                    <div class="col-md-8 h6 text-dark font-weight-bold">
                        <li><a href="tel://{{ $order->phone }}">{{ $order->phone }}</a></li>
                    </div>
                </div>
                <div class="row mx-3">
                    <div class="col-md-4 h6 text-dark font-weight-bold">
                        <i class="fa fa-info-circle" aria-hidden="true"></i> &nbsp;&nbsp;Color :
                    </div>
                    <div class="col-md-8 h6 text-dark font-weight-bold">
                        <li>{{ $order->productAttr->colorAttr->name }}</li>
                    </div>
                </div>
                <div class="row mx-3">
                    <div class="col-md-4 h6 text-dark font-weight-bold">
                        <i class="fa fa-info-circle" aria-hidden="true"></i> &nbsp;&nbsp;Size :
                    </div>
                    <div class="col-md-8 h6 text-dark font-weight-bold">
                        <li>{{ $order->productAttr->sizeAttr->letterNumber }}</li>
                    </div>
                </div>
                <div class="row mx-3">
                    <div class="col-md-4 h6 text-dark font-weight-bold">
                        <i class="fa fa-info-circle" aria-hidden="true"></i> &nbsp;&nbsp;Quantity :
                    </div>
                    <div class="col-md-8 h6 text-dark font-weight-bold">
                        <li>{{ $order->quantity }}</li>
                    </div>
                </div>
                <div class="row mx-3">
                    <div class="col-md-4 h6 text-dark font-weight-bold">
                        <i class="fa fa-info-circle" aria-hidden="true"></i> &nbsp;&nbsp;Price :
                    </div>
                    <div class="col-md-8 h6 text-dark font-weight-bold">
                        <li>{{ $order->totalPrice }} /MMK</li>
                    </div>
                </div>
                <div class="row mx-3">
                    <div class="col-md-4 h6 text-dark font-weight-bold">
                        <i class="fa fa-clock" aria-hidden="true"></i> &nbsp;&nbsp;Ordered Time :
                    </div>
                    <div class="col-md-8 h6 text-dark font-weight-bold">
                        <li>{{ $order->created_at->diffForHumans() }}</li>
                    </div>
                </div>
                <hr style="border: 1px solid #cfcfcf" />

            </div>
        </div>
    </div>
    @endsection
