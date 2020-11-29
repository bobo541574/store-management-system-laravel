@extends('backend.templates.master')

@section('content')
<div class="card shadow text-left">
    <div class="card-header h5 text-primary font-weight-bold">Product Edit</div>
    <div class="card-body">
        <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @include('backend.products._form', ['buttonText' => "Update Product"])
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
</script>
<script src="{{ asset('/js/address.js') }}"></script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        let add = document.querySelector('#add');
        let index = "{{ $rowCount }}";
        let product = "{{ ($product->productAttrs ? count($product->productAttrs) : 0) }}";

        add.addEventListener('click', () => {
            index++;
            addProduct(index);
        });

        function addProduct(index) {
            let product = document.querySelector('#product');
            let row = document.createElement('div');
            row.className = 'row';
            row.id = `product_node_${index}`;
            let html = `
                    <input type="hidden" name="row[${index}][id]" id="attribute_${index}" value="9999">

                    <div class="col-md-12" >
                        <hr style="border: 1px solid #cfcfcf" />
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="arrived" class="col-form-label">{{ __('Arrived') }}</label>

                            <input id="arrived_${index}" type="date" class="form-control form-control-sm @error('arrived') is-invalid @enderror" 
                                name="row[${index}][arrived]" value="{{ old('arrived') }}">

                            @error('arrived')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="color" class="col-form-label mx-auto">{{ __('Color') }}</label>

                            <select name="row[${index}][color]" id="color_${index}" class="custom-select custom-select-sm @error('row.${index}.color') is-invalid @enderror"
                                value="{{ old('color') }}" autocomplete="off">
                                <option value="">Choose color</option>
                                @foreach ($colors as $color)
                                <option value="{{ $color->id }}"
                                    {{ ($color->id == ($color->color_id ?? old('color'))) ? 'selected' : '' }}>
                                    {{ $color->name }}</option>
                                @endforeach
                            </select>

                            @error('row.${index}.color')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="size" class="col-form-label  mx-auto">{{ __('Size') }}</label>

                            <select name="row[${index}][size]" id="size_${index}" class="custom-select custom-select-sm @error('row.${index}.size') is-invalid @enderror"
                                value="{{ old('size') }}" autocomplete="off">
                                <option value="">Choose size</option>
                                @foreach ($sizes as $size)
                                <option value="{{ $size->id }}" {{ ($size->id == ($size->size_id ?? '')) ? 'selected' : '' }}>
                                    {{ $size->letter_number }}</option>
                                @endforeach
                            </select>

                            @error('row.${index}.size')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="quantity_${index}" class="col-form-label  mx-auto">{{ __('Quantity') }}</label>

                            <input name="row[${index}][quantity]" id="quantity_${index}" class="form-control form-control-sm @error('row.${index}.quantity') is-invalid @enderror"
                                type="number" value="{{ old('quantity') }}" onclick="priceCalculator(${index})" autocomplete="on" placeholder="0">

                            @error('row.${index}.quantity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="price_${index}" class="col-form-label  mx-auto">{{ __('Price') }}</label>

                            <input name="row[${index}][price]" id="price_${index}" class="form-control form-control-sm @error('row.${index}.price') is-invalid @enderror" type="number"
                                value="{{ old('price') }}" onclick="priceCalculator(${index})" autocomplete="on" placeholder="0">

                            @error('row.${index}.price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="total_price_${index}" class="col-form-label  mx-auto">{{ __('Total Price') }}</label>

                            <input name="row[${index}][total_price]" id="total_price_${index}" class="form-control form-control-sm @error('row.${index}.total_price') is-invalid @enderror" type="number"
                                value="{{ old('total_price') }}" autocomplete="on" placeholder="0" disabled>

                            @error('row.${index}.total_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="cost" class="col-form-label  mx-auto">{{ __('Cost') }}</label>

                            <input name="row[${index}][cost]" id="cost_${index}" class="form-control form-control-sm @error('row.${index}.cost') is-invalid @enderror" type="number"
                                value="{{ old('cost') }}" onclick="costCalculator(${index})" autocomplete="on" placeholder="0">

                            @error('row.${index}.cost')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="total_cost" class="col-form-label  mx-auto">{{ __('Total Cost') }}</label>

                            <input name="row[${index}][total_cost]" id="total_cost_${index}" class="form-control form-control-sm @error('row.${index}.total_cost') is-invalid @enderror" type="number"
                                value="{{ old('total_cost') }}" autocomplete="on" placeholder="0" disabled>

                            @error('row.${index}.total_cost')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="status" class="col-form-label">{{ __('Status') }}</label>

                            <select name="row[${index}][status]" id="status_${index}" class="custom-select custom-select-sm @error('row.${index}.status') is-invalid @enderror"
                                value="{{ old('status') }}" autocomplete="off">
                                <option value="">Choose status</option>
                                <option value="On">On</option>
                                <option value="Off">Off</option>
                            </select>

                            @error('row.${index}.status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="photo" class="col-form-label">Photo Upload</label>
                            
                            <div class="custom-file">
                        <input type="hidden" name="row[${index}][old_photo]" value="">

                                <input type="file" id="photo_${index}" class="custom-file-input @error('row.${index}.photo') is-invalid @enderror"
                                    name="row[${index}][photo][]" value="{{ old('photo') }}" multiple />
                                <label for="photo" class="custom-file-label col-form-label-sm">Photo Upload</label>
                    
                                @error('row.${index}.photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                    
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-12 bg-gray-200 justify-content-center text-center m-auto"
                                id="preview_${index}">
                            </div>
                        </div>
                    </div>
              `;

            row.innerHTML = html;

            product.appendChild(row);

            let btnRemove = document.querySelector(".btn_remove");
            btnRemove.id = `btn_remove_${index}`;
        }

        let btnRemove = document.querySelector(".btn_remove");

        if (index > 0 || product > 0) {
            count = index > 0 ? index : product;
            for (let i = 0; i < count; i++) {
                priceCalculator(i);
                costCalculator(i);
                // photoUpload(i);
                index = count;
            }
            --index;
            btnRemove.id = `btn_remove_${index}`;
        }

        let remove = document.querySelector(`#btn_remove_${index}`);

        remove.addEventListener('click', () => {
            if (index == 0) {
                alert("You cannot be removed!!!");
            } else {

                let productNode = document.querySelector(`#product_node_${index}`);
                let attribute_id = document.querySelector(`#attribute_${index}`);
                let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                if (attribute_id.value) {
                    let id = attribute_id.value;
                    fetch(`/attributes/${id}`, {
                            headers: {
                                "Content-Type": "application/json",
                                "Accept": "application/json, text-plain, */*",
                                "X-Requested-With": "XMLHttpRequest",
                                "X-CSRF-TOKEN": token
                            },
                            method: 'post',
                            credentials: "same-origin",
                        })
                        .then((res) => {
                            return res.json();
                        })
                        .then((result) => {
                            console.log(result.data);
                        })
                        .catch((err) => {
                            console.log(err);
                        })
                }
                productNode.remove();
                index--;
                btnRemove.id = `btn_remove_${index}`;
            }
        });

    })

    function photoUpload(index) {
        let photo = document.querySelector(`#photo_${index}`);
        photo ? photo.addEventListener('change', function () {
            parent = photo.parentNode;

            let images = this.files;
            let html = "";
            let preview = document.querySelector(`#preview_${index}`);
            for (let i = 0; i < images.length; i++) {
                const image = images[i];
                const reader = new FileReader();

                reader.readAsDataURL(image);
                reader.onload = () => {
                    const result = reader.result;
                    html += `
                            <img src="${result}" class="m-1 shadow-lg" width="125px" height="130px" alt="product" />
                            `;
                    preview.style.display = 'block';
                    preview.innerHTML = html;
                    parent.innerHTML +=
                        `<input type="hidden" name="row[${index}][images][${result}][${i}]">`;

                }

            }
        }) : console.log('empty');
    }

    function priceCalculator(index) {
        let quantity = document.querySelector(`#quantity_${index}`);
        let price = document.querySelector(`#price_${index}`);

        quantity.addEventListener('keyup', () => {
            totalPrice(index, quantity.value, price.value);
        })

        price.addEventListener('keyup', () => {
            totalPrice(index, quantity.value, price.value);
        })

        quantity.addEventListener('click', () => {
            totalPrice(index, quantity.value, price.value);
        })

        price.addEventListener('click', () => {
            totalPrice(index, quantity.value, price.value);
        })

        totalPrice(index, quantity.value, price.value);
    }

    function totalPrice(index, quantity, price) {
        let total_price = quantity * price;
        console.log(total_price);
        let html_price = document.querySelector(`#total_price_${index}`);
        html_price.value = total_price;
    }

    function costCalculator(index) {
        let quantity = document.querySelector(`#quantity_${index}`);
        let cost = document.querySelector(`#cost_${index}`);
        quantity.addEventListener('keyup', () => {
            totalCost(index, quantity.value, cost.value);
        })

        cost.addEventListener('keyup', () => {
            totalCost(index, quantity.value, cost.value);
        })

        quantity.addEventListener('click', () => {
            totalCost(index, quantity.value, cost.value);
        })

        cost.addEventListener('click', () => {
            totalCost(index, quantity.value, cost.value);
        })

        totalCost(index, quantity.value, cost.value);
    }

    function totalCost(index, quantity, cost) {
        let total_cost = quantity * cost;
        console.log(total_cost);
        let html_cost = document.querySelector(`#total_cost_${index}`);
        html_cost.value = total_cost;
    }

</script>
@endpush
