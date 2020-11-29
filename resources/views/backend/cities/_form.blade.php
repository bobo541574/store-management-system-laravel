@csrf

<div class="form-group">
    <label for="name" class="col-form-label">{{ __('Name') }}</label>

    <input id="name" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name"
        value="{{ old('name', $city->name ?? '') }}"
        placeholder="eg. Yangon, Mandalay & ...." autocomplete="on" autofocus>

    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <label for="state" class="col-form-label">{{ __('State') }}</label>

    <select name="state" id="state" class="custom-select custom-select-sm @error('state') is-invalid @enderror"
        value="{{ old('state') }}" autocomplete="off">
        <option value="">Choose State</option>
        @foreach ($states as $state)
        <option value="{{ $state->id }}" {{ ($state->id == ($city->state_id ?? '')) ? 'selected' : '' }}>
            {{ $state->name }}</option>
        @endforeach
    </select>

    @error('state')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <button class="btn btn-sm btn-primary">{{ $buttonText }}</button>
</div>
