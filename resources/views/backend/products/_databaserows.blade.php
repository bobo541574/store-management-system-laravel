<div id="product">
    @php
    @endphp
    @foreach ($product->productAttrs as $key => $value)
        <div class="row" id="product_node_{{ $key }}">
            <input type="hidden" name="row[{{ $key }}][id]" id="attribute_{{ $key }}" value="{{ $value->id }}">
            <div class="col-md-12">
                <hr style="border: 1px solid #cfcfcf" />
            </div>
    
            <div class="col-md-2">
                <div class="form-group">
                    <label for="color" class="col-form-label mx-auto">{{ __('Color') }}</label>
    
                    <select name="row[{{ $key }}][color]" id="color_{{ $key }}"
                        class="custom-select @error("row.$key.color") is-invalid @enderror" value="{{ $value->colorAttr->id }}"
                        autocomplete="off">
                        <option value="">Choose color</option>
                        @foreach ($colors as $color)
                        <option value="{{ $color->id }}"
                            {{ ($color->id == ($color->color_id ?? $value->colorAttr->id)) ? 'selected' : '' }}>
                            {{ $color->name }}</option>
                        @endforeach
                    </select>
    
                    @error("row.$key.color")
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
    
            <div class="col-md-2">
                <div class="form-group">
                    <label for="size" class="col-form-label  mx-auto">{{ __('Size') }}</label>
    
                    <select name="row[{{ $key }}][size]" id="size_{{ $key }}"
                        class="custom-select @error("row.$key.size") is-invalid @enderror" value="{{ $value->sizeAttr->id }}"
                        autocomplete="off">
                        <option value="">Choose size</option>
                        @foreach ($sizes as $size)
                        <option value="{{ $size->id }}" {{ ($size->id == ($size->size_id ?? $value->sizeAttr->id)) ? 'selected' : '' }}>
                            {{ $size->letter_number }}</option>
                        @endforeach
                    </select>
    
                    @error("row.$key.size")
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
    
            <div class="col-md-2">
                <div class="form-group">
                    <label for="quantity_{{ $key }}" class="col-form-label  mx-auto">{{ __('Quantity') }}</label>
    
                    <input name="row[{{ $key }}][quantity]" id="quantity_{{ $key }}"
                        class="form-control @error("row.$key.quantity") is-invalid @enderror" type="number"
                        value="{{ $value['quantity'] }}" onclick="priceCalculator({{ $key }})" autocomplete="on" placeholder="0">
    
                    @error("row.$key.quantity")
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
    
                </div>
            </div>
    
            <div class="col-md-2">
                <div class="form-group">
                    <label for="price_{{ $key }}" class="col-form-label  mx-auto">{{ __('Price') }}</label>
    
                    <input name="row[{{ $key }}][price]" id="price_{{ $key }}"
                        class="form-control @error("row.$key.price") is-invalid @enderror" type="number"
                        value="{{ $value['price'] }}" onclick="priceCalculator({{ $key }})" autocomplete="on" placeholder="0">
    
                    @error("row.$key.price")
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
    
                </div>
            </div>
    
            <div class="col-md-2">
                <div class="form-group">
                    <label for="total_price_{{ $key }}" class="col-form-label  mx-auto">{{ __('Total Price') }}</label>

                    <input name="row[{{ $key }}][total_price]" id="total_price_{{ $key }}"
                        class="form-control @error("row.$key.total_price") is-invalid @enderror" type="number"
                        value="{{ $value['total_price'] ?? '' }}" autocomplete="on" placeholder="0" disabled>
    
                    @error("row.$key.total_price")
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
    
                </div>
            </div>
    
            <div class="col-md-2">
                <div class="form-group">
                    <label for="cost" class="col-form-label  mx-auto">{{ __('Cost') }}</label>
    
                    <input name="row[{{ $key }}][cost]" id="cost_{{ $key }}"
                        class="form-control @error("row.$key.cost") is-invalid @enderror" type="number"
                        value="{{ $value['cost'] }}" onclick="costCalculator({{ $key }})" autocomplete="on" placeholder="0">
    
                    @error("row.$key.cost")
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
    
                </div>
            </div>
    
            <div class="col-md-2">
                <div class="form-group">
                    <label for="total_cost" class="col-form-label  mx-auto">{{ __('Total Cost') }}</label>

                    <input name="row[{{ $key }}][total_cost]" id="total_cost_{{ $key }}"
                        class="form-control @error('row.{{ $key }}.total_cost') is-invalid @enderror" type="number"
                        value="{{ $value['total_cost'] ?? '' }}" autocomplete="on" placeholder="0" disabled>
    
                    @error('row.{{ $key }}.total_cost')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
    
                </div>
            </div>
    
            <div class="col-md-2">
                <div class="form-group">
                    <label for="status" class="col-form-label">{{ __('Status') }}</label>
    
                    <select name="row[{{ $key }}][status]" id="status_{{ $key }}"
                        class="custom-select @error("row.$key.status") is-invalid @enderror" value="{{ old('status') }}"
                        autocomplete="off">
                        <option value="">Choose status</option>
                        <option value="1" {{ ("1" == $value['status']) ? 'selected' : '' }}>On</option>
                        <option value="0" {{ ("0" == $value['status']) ? 'selected' : ''  }}>Off</option>
                    </select>
    
                    @error("row.$key.status")
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
    
                        <input type="hidden" name="row[{{ $key }}][old_photo]" value="{{ $value['photo'] ?? '' }}">
    
                        <input type="file" id="photo_{{ $key }}"
                            class="custom-file-input @error("row.$key.photo") is-invalid @enderror"
                            name="row[{{ $key }}][photo][]" value="{{ $value['photo'] ?? '' }}"
                            multiple />
                        <label for="photo" class="custom-file-label">Photo Upload</label>
    
                        @error("row.$key.photo")
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
    
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12 bg-gray-200 justify-content-center text-center m-auto {{ ($product->photo ?? '') ? 'block' : '' }}"
                        id="preview_{{ $key }}">
                        <div class="form-group">
                            @if ($value['photo'] ?? '')
                            {{-- @foreach ($value['photo'] as $key => $photo)
                            <img src="{{ $photo[$key] }}" class="" alt="product">
                            @endforeach --}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>