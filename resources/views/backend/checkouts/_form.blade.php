@csrf

<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <label for="product_name" class="col-form-label">{{ __('Product Name') }}</label>

            <input id="product_name" type="text" class="form-control form-control-sm" name="name"
                value="{{ $order->productAttr->product->name }}" autocomplete="on" disabled>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="product_color" class="col-form-label">{{ __('Product Color') }}</label>

            <input id="product_color" type="text" class="form-control form-control-sm" name="product_color"
                value="{{ $order->productAttr->colorAttr->name }}" autocomplete="on" disabled>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="product_size" class="col-form-label">{{ __('Product Size') }}</label>

            <input id="product_size" type="text" class="form-control form-control-sm" name="product_size"
                value="{{ $order->productAttr->sizeAttr->letterNumber }}" autocomplete="on" disabled>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="product_price" class="col-form-label">{{ __('Product Price') }}</label>

            <input id="product_price" type="text" class="form-control form-control-sm" name="product_price"
                value="{{ $order->productAttr->price }} / MMK" autocomplete="on" disabled>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="product_cost" class="col-form-label">{{ __('Product Cost') }}</label>

            <input id="product_cost" type="text" class="form-control form-control-sm" name="product_cost"
                value="{{ $order->productAttr->totalCost }} / MMK" autocomplete="on" disabled>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="product_quantity" class="col-form-label">{{ __('Product Quantity') }}</label>

            <input id="product_quantity" type="text" class="form-control form-control-sm" name="product_quantity"
                value="{{ $order->productAttr->quantity }}" autocomplete="on" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="name" class="col-form-label">{{ __('* Customer Name') }}</label>

            <input id="name" type="text" class="form-control form-control-sm"
                name="name" value="{{ $order->customer_name }}" placeholder="John Doe" disabled autocomplete="on" autofocus>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="phone" class="col-form-label">{{ __('* Customer Phone') }}</label>

            <input id="phone" type="text" class="form-control form-control-sm"
                name="phone" value="{{ $order->phone }}" placeholder="+959 999 999 999" disabled autocomplete="on" autofocus>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="quantity" class="col-form-label">{{ __('* Quantity') }}</label>

            <input id="quantity" type="text"
                class="form-control form-control-sm" name="quantity"
                value="{{ $order->quantity }}" placeholder="0" disabled autocomplete="on" autofocus>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="price_discount" class="col-form-label">{{ __('Price (with discount)') }}</label>

            <input id="price_discount" type="text"
                class="form-control form-control-sm" name="price_discount"
                value="{{ $order->totalPrice }} / MMK - ({{ $order->discount }})" placeholder="0" disabled autocomplete="on" autofocus>
        </div>
    </div>
</div>

<div class="row">
    <input type="hidden" name="order_id" value="{{ $order->id ?? '' }}">
    {{-- <input type="hidden" name="color" value="{{ $attribute->colorAttr->name ?? $order->productAttr->colorAttr->name }}"> --}}
    {{-- <input type="hidden" name="size" value="{{ $attribute->sizeAttr->letterNumber ?? $order->productAttr->sizeAttr->letterNumber }}"> --}}
    <div class="col-md-2">
        <div class="form-group">
            <label for="discount" class="col-form-label">{{ __('* Discount') }}</label>

            <input id="discount" type="number" class="form-control form-control-sm @error('discount') is-invalid @enderror"
                name="discount" value="{{ old('discount') ?? ($checkout->discount ?? "") }}" min="0" placeholder="0" autocomplete="on" autofocus>

            @error('discount')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="total_price" class="col-form-label">{{ __('* Total Price') }}</label>
            <input type="hidden" name="total_price" id="actual_price" value="">
            <input id="total_price" type="text" class="form-control form-control-sm @error('total_price') is-invalid @enderror"
                name="total_price" value="{{ $checkout->total_price ?? old('total_price') }}" placeholder=" / MMK" disabled autocomplete="on" autofocus>

            @error('total_price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="payment_type" class="col-form-label">{{ __('* Payment Method') }}</label>

            <select class="custom-select custom-select-sm @error('payment_type') is-invalid @enderror" name="payment_type"
                value="{{ $checkout->payment_id ?? old('payment_type') }}" placeholder="0" autocomplete="on" autofocus" name="" id="">
                <option value="">Choose payment</option>
                @foreach ($payments as $payment)
                    <option value="{{ $payment->id }}" {{ ((old('payment_type') ?? ($checkout->payment_id ?? "")) == $payment->id) ? "selected" : "" }}>{{ $payment->name }}</option>
                @endforeach
            </select>
            
            @error('payment_type')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="payment_date" class="col-form-label">{{ __('* Payment Date') }}</label>
            
            <input id="payment_date" type="date"
                class="form-control form-control-sm @error('payment_date') is-invalid @enderror" name="payment_date"
                value="{{ old('payment_date') ?? ($checkout->payment_date ?? '') }}">

            @error('payment_date')
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
