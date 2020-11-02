@csrf

<div class="form-group">
    <label for="name" class="col-form-label">{{ __('Name') }}</label>

    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
        value="{{ old('name', $brand->name ?? '') }}" placeholder="eg. Apple, Sony, Dell, Mother Choice & ...."
        autocomplete="on" autofocus>

    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <label for="subcategory" class="col-form-label">{{ __('Sub Category') }}</label>

    <select name="subcategory" id="subcategory" class="custom-select @error('subcategory') is-invalid @enderror"
        value="{{ old('subcategory') }}" autocomplete="off">
        <option value="">Choose Sub Category</option>
        @foreach ($subcategories as $subcategory)
        <option value="{{ $subcategory->id }}"
            {{ ($subcategory->id == ($brand->subcategory_id ?? '')) ? 'selected' : '' }}>
            {{ $subcategory->name }}</option>
        @endforeach
    </select>

    @error('subcategory')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>


<div class="form-group">
    <div class="col-md-4">

        <div class="mb-2" id="box">
            <div class="font-weight-bold {{ ($brand->logo ?? '') ? 'd-none' : '' }}" id="sample"
                style="font-size: 140%">Photo</div>
            <img src="{{ $brand->photo ?? '' }}" id="preview" class="{{ ($brand->logo ?? '') ? 'd-block' : '' }}"
                alt="logo">
        </div>

        <div class="custom-file mx-auto">
            <input type="hidden" name="logo" value="{{ old('logo', $brand->logo ?? '') }}">

            <input type="file" id="photo" class="type_file custom-file-input @error('logo') is-invalid @enderror"
                name="logo" value="{{ old('logo') }}" />
            <label for="photo" id="label" class="custom-file-label">upload</label>

            @error('logo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

    </div>

</div>

{{-- <div class="form-group">
    <label for="logo" class="col-form-label">{{ __('Logo') }}</label>

<div class="custom-file">
    <input type="hidden" name="logo" id="photo" value="{{ old('logo', $brand->logo ?? '') }}">

    <input id="logo" type="file" class="custom-file-input @error('logo') is-invalid @enderror" name="logo"
        value="{{ old('logo', $brand->logo ?? '') }}" autocomplete="on" autofocus>
    <label class="custom-file-label" for="logo">Choose file</label>
    @error('logo')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div id="box" class="{{ ($brand->logo ?? '') ? 'd-block' : ''}}">
    <img src="{{ $brand->photo ?? '' }}" id="img" class="{{ ($brand->logo ?? '') ? 'd-block' : ''}}" alt="logo">
</div>
</div> --}}

<div class="form-group">
    <button class="btn btn-primary">{{ $buttonText }}</button>
</div>
