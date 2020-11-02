@csrf

<div class="form-group">
    <label for="name" class="col-form-label">{{ __('Name') }}</label>

    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
        value="{{ old('name', $township->name ?? '') }}"
        placeholder="eg. Thingangyun, Tamwe & ...." autocomplete="on" autofocus>

    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <label for="city" class="col-form-label">{{ __('City') }}</label>

    <select name="city" id="city" class="custom-select @error('city') is-invalid @enderror"
        value="{{ old('city') }}" autocomplete="off">
        <option value="">Choose City</option>
        @foreach ($cities as $city)
        <option value="{{ $city->id }}" {{ ($city->id == ($township->city_id ?? '')) ? 'selected' : '' }}>
            {{ $city->name }}</option>
        @endforeach
    </select>

    @error('city')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <button class="btn btn-primary">{{ $buttonText }}</button>
</div>
