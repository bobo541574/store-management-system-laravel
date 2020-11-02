@csrf

<div class="row">

    <div class="col-md-2">
        <div class="form-group">
            <label for="arrived" class="col-form-label">{{ __('Arrived') }}</label>

            <input id="arrived" type="date" class="form-control @error('arrived') is-invalid @enderror" name="arrived"
                value="{{ old('arrived', $product->arrived ?? '' ) }}" placeholder="eg. PID0001" autocomplete="on">

            @error('arrived')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="product_code" class="col-form-label">{{ __('Product ID') }}</label>

            <input id="product_code" type="search" class="form-control @error('product_code') is-invalid @enderror" name="product_code"
                value="{{ old('product_code', $product->product_code ?? '') }}" placeholder="eg. PID0001" autocomplete="on">

            @error('product_code')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="name" class="col-form-label">{{ __('Name') }}</label>

            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name', $product->name ?? '') }}" placeholder="eg. IPhone X, Lenovo IdeaPad 320 & ..." autocomplete="on"
                >

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="brand" class="col-form-label">{{ __('Brand') }}</label>

            <select name="brand" id="brand" class="custom-select @error('brand') is-invalid @enderror"
                value="{{ old('brand') }}" autocomplete="off">
                <option value="">Choose Brand</option>
                @foreach ($brands as $brand)
                <option value="{{ $brand->id }}" {{ ($brand->id == ($product->brand_id ?? old('brand'))) ? 'selected' : '' }}>
                    {{ $brand->name }}</option>
                @endforeach
            </select>

            @error('brand')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="supplier" class="col-form-label">{{ __('Supplier') }}</label>

            <select name="supplier" id="supplier" class="custom-select @error('supplier') is-invalid @enderror"
                value="{{ old('supplier') }}" autocomplete="off">
                <option value="">Choose Supplier</option>
                @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->id }}"
                    {{ ($supplier->id == ($product->supplier_id ?? old('supplier'))) ? 'selected' : '' }}>
                    {{ $supplier->name }}</option>
                @endforeach
            </select>

            @error('supplier')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

</div>

@if (old('row') != '')

    @include('backend.products._oldrows')

@elseif($product ?? '' != '')

    @include('backend.products._databaserows')

@elseif(old('row') == '')
<div id="product">
</div>
@endif



<div class="row text-center">
    <div class="col-md-4 offset-md-4">
        <div class="form-group">
            <a href="javascript:void(0)" id="add" data-toggle="tooltip" title="Add Product" class="btn btn-sm btn-warning my-1"><i class="fa fa-plus-circle"
                    aria-hidden="true"></i></a>
            <a href="javascript:void(0)" data-toggle="tooltip" title="Reduce Product" class="btn_remove btn btn-sm btn-danger my-1"><i class="fa fa-minus-circle"
                    aria-hidden="true"></i> </i></a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-3 offset-md-9">
        <div class="form-group mb-0">
            <button type="submit" id="submit" class="btn btn-primary col-md-12">
                {{ $buttonText }}
            </button>
        </div>
    </div>
</div>
