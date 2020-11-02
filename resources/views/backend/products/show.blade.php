@extends('backend.templates.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow text-left">
                <div class="card-header h3 text-primary font-weight-bold">
                    Product Detail
                </div>
              <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-4 offset-md-4">
                        <h4 class="text-primary font-weight-bold my-2">{{ $attribute->product->name }} </h4>
                    </div>
                </div>
                <hr style="border: 1px solid #cfcfcf" />
                    {{-- @foreach ($attribute->productAttrs as $attribute) --}}
                        <div class="row mx-3">
                            <div class="col-md-4 h6 text-dark">
                                <i class="fas fa-truck-loading    "></i> &nbsp;&nbsp;Supplier : 
                            </div>
                            <div class="col-md-8 h6 text-dark">
                            <li><a href="{{ route('suppliers.show', $attribute->product->supplier->id) }}">{{ $attribute->product->supplier->name }}</a></li>
                            </div>
                        </div>
                        <div class="row mx-3">
                            <div class="col-md-4 h6 text-dark">
                                <i class="fa fa-clone" aria-hidden="true"></i> &nbsp;&nbsp;color : 
                            </div>
                            <div class="col-md-8 h6 text-dark">
                            <li>{{ $attribute->colorAttr->name }}</a></li>
                            </div>
                        </div>
                        <div class="row mx-3">
                            <div class="col-md-4 h6 text-dark">
                                <i class="fa fa-search" aria-hidden="true"></i> &nbsp;&nbsp;size : 
                            </div>
                            <div class="col-md-8 h6 text-dark">
                                <li>{{ $attribute->sizeAttr->letter_number }} </li>
                            </div>
                        </div>
                        <div class="row mx-3">
                            <div class="col-md-4 h6 text-dark">
                                <i class="fa fa-sitemap" aria-hidden="true"></i> &nbsp;&nbsp;quantity : 
                            </div>
                            <div class="col-md-8 h6 text-dark">
                                <li>{{ $attribute->quantity }}</li>
                            </div>
                        </div>
                        <div class="row mx-3">
                            <div class="col-md-4 h6 text-dark">
                                <i class="fas fa-dollar-sign"></i> &nbsp;&nbsp;price : 
                            </div>
                            <div class="col-md-8 h6 text-dark">
                                <li>{{ $attribute->price }}</li>
                            </div>
                        </div>
                        <div class="row mx-3">
                            <div class="col-md-4 h6 text-dark">
                                <i class="fas fa-dollar-sign"></i> &nbsp;&nbsp;cost : 
                            </div>
                            <div class="col-md-8 h6 text-dark">
                                <li>{{ $attribute->cost }}</li>
                            </div>
                        </div>
                        <div class="row mx-3">
                            <div class="col-md-4 h6 text-dark">
                                <i class="fa fa-file" aria-hidden="true"></i> &nbsp;&nbsp;description : 
                            </div>
                            <div class="col-md-8 h6 text-dark">
                                <li>{{ $attribute->description }}</li>
                            </div>
                        </div>
                        <div class="row mx-3">
                            <div class="col-md-4 h6 text-dark">
                                <i class="fas fa-image"></i> &nbsp;&nbsp;photos : 
                            </div>
                            <div class="col-md-8 h6 text-dark">
                                <li>
                                    @foreach ($attribute->images as $image)
                                        <img src="{{ $image }}" width="120px" alt="logo">
                                    @endforeach
                                </li>
                            </div>
                        </div>
                        <hr style="border: 1px solid #cfcfcf" />

                    {{-- @endforeach --}}
            </div>
        </div>
    </div>
@endsection