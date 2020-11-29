@csrf

<div class="form-group">
    <label for="name" class="col-form-label">{{ __('Name') }}</label>

    <input id="name" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name"
        value="{{ old('name', $subcategory->name ?? '') }}"
        placeholder="eg. Smart Phone, Appel, Hammer, Eye Drop & ...." autocomplete="on" autofocus>

    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <label for="category" class="col-form-label">{{ __('Category') }}</label>

    <select name="category" id="category" class="custom-select custom-select-sm @error('category') is-invalid @enderror"
        value="{{ old('category') }}" autocomplete="off">
        <option value="">Choose Sub Category</option>
        @foreach ($categories as $category)
        <option value="{{ $category->id }}" {{ ($category->id == ($subcategory->category_id ?? '')) ? 'selected' : '' }}>
            {{ $category->name }}</option>
        @endforeach
    </select>

    @error('category')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <button class="btn btn-sm btn-primary">{{ $buttonText }}</button>
</div>
