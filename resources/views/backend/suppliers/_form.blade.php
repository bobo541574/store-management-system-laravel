@csrf

<div class="row">
    <div class="col-md-4 offset-md-4">
        <div class="form-group text-center">
            <div class="mx-auto mb-2" id="box">
                <div class="font-weight-bold {{ ($supplier->logo ?? '') ? 'd-none' : '' }}" id="sample"
                    style="font-size: 140%">Photo</div>
                <img src="{{ $supplier->photo ?? '' }}" id="preview"
                    class="{{ ($supplier->logo ?? '') ? 'd-block' : '' }}" alt="logo">
            </div>

            <div class="form-group mx-auto" id="custom-file">
                <input type="hidden" name="logo" value="{{ old('logo', $supplier->logo ?? '') }}">

                <input type="file" id="photo" class="type_file form-control @error('logo') is-invalid @enderror"
                    name="logo" value="{{ old('logo') }}" />
                <label for="photo" id="label" class="form-label">upload</label>

                @error('logo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-4 offset-md-4">
        <div class="form-group">
            <label for="name" class="col-form-label">{{ __('* Company Name') }}</label>

            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name', $supplier->name ?? '') }}" placeholder="John Doe" autocomplete="on" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

@if (old('row') != '')

    @include('backend.suppliers._oldrows')

@elseif($supplier != '')

    @include('backend.suppliers._databaserows')

@elseif(old('row') == '')

    <div id="company">

    </div>
    
@endif

<div class="row text-center">
    <div class="col-md-4 offset-md-4">
        <div class="form-group">
            <a href="javascript:void(0)" id="add" class="btn btn-sm btn-warning"><i class="fa fa-plus-circle"
                    aria-hidden="true"></i> Add Address</a>
        </div>
    </div>
</div>

<div class="col-md-3 offset-md-9">
    <div class="form-group mb-0">
        <button type="submit" id="submit" class="btn btn-primary col-md-12">
            {{ $buttonText }}
        </button>
    </div>
</div>
