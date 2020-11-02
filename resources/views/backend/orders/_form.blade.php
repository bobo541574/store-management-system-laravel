@csrf

<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <label for="product_name" class="col-form-label">{{ __('Product Name') }}</label>

            <input id="product_name" type="text" class="form-control form-control-sm" name="name"
                value="{{ $attribute->product->name ?? $order->productAttr->product->name }}" autocomplete="on" disabled>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="product_color" class="col-form-label">{{ __('Product Color') }}</label>

            <input id="product_color" type="text" class="form-control form-control-sm" name="product_color"
                value="{{ $attribute->colorAttr->name ?? $order->productAttr->colorAttr->name }}" autocomplete="on" disabled>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="product_size" class="col-form-label">{{ __('Product Size') }}</label>

            <input id="product_size" type="text" class="form-control form-control-sm" name="product_size"
                value="{{ $attribute->sizeAttr->letterNumber ?? $order->productAttr->sizeAttr->letterNumber }}" autocomplete="on" disabled>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="product_price" class="col-form-label">{{ __('Product Price') }}</label>

            <input id="product_price" type="text" class="form-control form-control-sm" name="product_price"
                value="{{ $attribute->price ?? $order->productAttr->price }} / MMK" autocomplete="on" disabled>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="product_cost" class="col-form-label">{{ __('Product Cost') }}</label>

            <input id="product_cost" type="text" class="form-control form-control-sm" name="product_cost"
                value="{{ $attribute->totalCost ?? $order->productAttr->totalCost }} / MMK" autocomplete="on" disabled>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="product_quantity" class="col-form-label">{{ __('Product Quantity') }}</label>

            <input id="product_quantity" type="text" class="form-control form-control-sm" name="product_quantity"
                value="{{ $attribute->quantity ?? $order->productAttr->quantity }}" autocomplete="on" disabled>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <input type="hidden" name="product_attr_id" value="{{ $attribute->id ?? $order->productAttr->id }}">
        <input type="hidden" name="color" value="{{ $attribute->colorAttr->name ?? $order->productAttr->colorAttr->name }}">
        <input type="hidden" name="size" value="{{ $attribute->sizeAttr->letterNumber ?? $order->productAttr->sizeAttr->letterNumber }}">
        <div class="form-group">
            <label for="name" class="col-form-label">{{ __('* Customer Name') }}</label>

            <input id="name" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror"
                name="name" value="{{ $order->customer_name ?? old('name') }}" placeholder="John Doe" autocomplete="on" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="phone" class="col-form-label">{{ __('* Customer Phone') }}</label>

            <input id="phone" type="text" class="form-control form-control-sm @error('phone') is-invalid @enderror"
                name="phone" value="{{ $order->phone ?? old('phone') }}" placeholder="+959 999 999 999" autocomplete="on" autofocus>

            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="quantity" class="col-form-label">{{ __('* Quantity') }}</label>

            <input id="quantity" type="number"
                class="form-control form-control-sm @error('quantity') is-invalid @enderror" name="quantity"
                value="{{ $order->quantity ?? old('quantity') }}" placeholder="0" autocomplete="on" autofocus>

            @error('quantity')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="order_date" class="col-form-label">{{ __('* Order Date') }}</label>

            <input id="order_date" type="date"
                class="form-control form-control-sm @error('order_date') is-invalid @enderror" name="order_date"
                value="{{ old('order_date') ?? ($order->order_date ?? '') }}" placeholder="0" autocomplete="on" autofocus>

            @error('order_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="discount" class="col-form-label">{{ __('Discount') }}</label>

            <input id="discount" type="number"
                class="form-control form-control-sm @error('discount') is-invalid @enderror" name="discount"
                value="{{ $order->discount ?? old('discount') }}" placeholder="0" autocomplete="on" autofocus>

            @error('discount')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2 offset-md-10">
        <div class="form-group mb-0">
            <button type="submit" id="submit" class="btn btn-sm btn-primary col-md-12">
                {{ $buttonText }}
            </button>
        </div>
    </div>
</div>
