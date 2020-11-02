@php
    $old_row = count($supplier->contacts)
@endphp
<div id="company">
    @foreach ($supplier->contacts as $key => $value)
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="email_{{ $key }}" class="col-form-label">{{ __('* E-Mail Address') }}</label>

                <input id="email_{{ $key }}" type="email"
                    class="form-control {{ $errors->has("row.$key.email") ? 'is-invalid' : '' }}"
                    name="row[{{ $key }}][email]" value="{{ $value['email'] }}" placeholder="example@gmail.com"
                    autocomplete="on">

                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first("row.$key.email") }}</strong>
                </span>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="phone_${index}" class="col-form-label">{{ __('* Phone') }}</label>

                <input id="phone_${index}" type="phone"
                    class="form-control {{ $errors->has("row.$key.phone") ? 'is-invalid' : '' }}"
                    name="row[{{ $key }}][phone]" value="{{ $value['phone'] }}" placeholder="+959 999 999 999"
                    autocomplete="on">

                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first("row.$key.phone") }}</strong>
                </span>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="state_{{ $key }}" class="col-form-label">{{ __('* State & Region') }}</label>

                <select name="row[{{ $key }}][state]" id="state_{{ $key }}"
                    class="custom-select {{ $errors->has("row.$key.state") ? 'is-invalid' : '' }}"
                    value="{{ $value['state'] }}" onclick="selectState({{ $key }})" autocomplete="off">
                    <option value="">Choose State & Region</option>
                    @foreach ($states as $state)
                    <option value="{{ $state->id }}" {{ $value['state'] ? (($value['state']['id'] == $state->id) ? 'selected' : '') : '' }}>
                        {{ $state->name }}</option>
                    @endforeach
                </select>

                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first("row.$key.state") }}</strong>
                </span>
            </div>
        </div>

        {{-- Current Address --}}
        <div class="col-md-4">
            <div class="form-group">
                <label for="city_{{ $key }}" class="col-form-label">{{ __('* City') }}</label>

                <select id="city_{{ $key }}" name="row[{{ $key }}][city]" disabled
                    title="Firstly, you need to select state."
                    class="custom-select {{ $errors->has("row.$key.city") ? 'is-invalid' : '' }}"
                    value="{{ $value['city'] ?? '' }}" data-id="{{ $value['city']['id'] }}" onclick="selectCity({{$key}})" autocomplete="off">
                    <option value="0">Choose City</option>
                </select>

                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first("row.$key.city") }}</strong>
                </span>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="township_{{ $key }}" class="col-form-label">{{ __('* Township & Ward') }}</label>

                <select id="township_{{ $key }}" name="row[{{ $key }}][township]" disabled
                    title="Firstly, you need to select city."
                    class="custom-select {{ $errors->has("row.$key.township") ? 'is-invalid' : '' }}"
                    value="{{ $value['township'] ?? '' }}" data-id="{{ $value['township']['id'] }}" onclick="selectTownship({{$key}})" autocomplete="off">
                    <option value="0">Choose Township & Wrad</option>
                </select>

                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first("row.$key.township") }}</strong>
                </span>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="address_{{ $key }}" class="col-form-label">{{ __('* Address') }}</label>

                <textarea id="address_{{ $key }}" name="row[{{ $key }}][address]" disabled
                    title="Firstly, you need to select township."
                    class="form-control {{ $errors->has("row.$key.address") ? 'is-invalid' : '' }}"
                    value="{{ $value['address'] ?? '' }}" placeholder="No(541), Nga Moe Yeik 4st, Nga Moe Yeik Quarter"
                    autocomplete="off">{{ $value['address'] ?? '' }}</textarea>

                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first("row.$key.address") }}</strong>
                </span>
            </div>
        </div>
    </div>
    @endforeach
</div>