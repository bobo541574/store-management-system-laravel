@csrf

<div class="form-group">
    <label for="name" class="col-form-label">{{ __('Name') }}</label>

    <input id="name" type="text"
        class="form-control @error('name') is-invalid @enderror" name="name"
        value="{{ old('name', $size->name ?? '') }}" placeholder="eg. XS, 13' & ...." autocomplete="name" autofocus>

    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <button class="btn btn-primary">{{ $buttonText }}</button>
</div>

