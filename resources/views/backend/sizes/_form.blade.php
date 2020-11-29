@csrf

<div class="form-group">
    <label for="letter" class="col-form-label">{{ __('Letter') }}</label>

    <input id="letter" type="text"
        class="form-control form-control-sm @error('letter') is-invalid @enderror" name="letter"
        value="{{ old('letter', $size->letter ?? '') }}" placeholder="eg. XS, S, M' & ...." autocomplete="letter" autofocus>

    @error('letter')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <label for="number" class="col-form-label">{{ __('Number') }}</label>

    <input id="number" type="text"
        class="form-control form-control-sm @error('number') is-invalid @enderror" name="number"
        value="{{ old('number', $size->number ?? '') }}" placeholder="eg. 12, 13, 14' & ...." autocomplete="number" autofocus>

    @error('number')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <button class="btn btn-sm btn-primary">{{ $buttonText }}</button>
</div>

