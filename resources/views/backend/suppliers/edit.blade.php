@extends('backend.templates.master')

@section('content')
    <div class="card shadow text-left">
        <div class="card-header h3 text-primary font-weight-bold">Supplier Edit</div>
    <div class="card-body">
        <form action="{{ route('suppliers.update', $supplier->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @include('backend.suppliers._form', ['buttonText' => "Update Supplier"])
        </form>
    </div>
    </div>
@endsection

@push('scripts')
<script>
</script>
<script src="{{ asset('/js/address.js') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', () => {
    /* Start - logo preview */
    let box = document.querySelector('#box');
    // let sample = document.querySelector('#sample');
    let preview = document.querySelector('#preview');
    let photo = document.querySelector('#photo');
    photoUpload(photo, preview, box, false);

    /* Start - Current Address */
    let add = document.querySelector("#add");
    let html = "";
    var index = "{{ $rowCount }}";
    let company = document.querySelector("#company");
    let supplier = "{{ ($supplier->contacts ? count($supplier->contacts) : 0) }}";
    console.log(supplier)
    supplier ? '' : companyAdderss(index);

    add.addEventListener('click', function () {
        index++;
        companyAdderss(index);
    })

    function companyAdderss(index) {
        company ?? document.createElement('div');
        let e = document.createElement('div');
        e.className = 'row';
        html = 
            `
            <div class="col-md-4 hh">
                <div class="form-group">
                    <label for="email_${index}" class="col-form-label">{{ __('* E-Mail Address') }}</label>

                    <input id="email_${index}" type="email" class="form-control @error('row.${index}.email') is-invalid @enderror" name="row[${index}][email]"
                        value="{{ old('email') }}" placeholder="example@gmail.com" autocomplete="on">

                    @error('row.${index}.email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="phone_${index}" class="col-form-label">{{ __('* Phone') }}</label>

                    <input id="phone_${index}" type="phone" class="form-control @error('row.${index}.phone') is-invalid @enderror" name="row[${index}][phone]"
                        value="{{ old('phone') }}" placeholder="+959 999 999 999" autocomplete="on">

                    @error('row.${index}.phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="state_${index}" class="col-form-label">{{ __('* State & Region') }}</label>

                    <select name="row[${index}][state]" id="state_${index}" class="custom-select @error('row.${index}.state') is-invalid @enderror"
                        value="{{ old('state') }}" onclick="selectState(${index})" autocomplete="off">
                        <option value="">Choose State & Region</option>
                        @foreach ($states as $state)
                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                        @endforeach
                    </select>

                    @error('row.${index}.state')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            {{-- Current Address --}}
            <div class="col-md-4">
                <div class="form-group">
                    <label for="city_${index}" class="col-form-label">{{ __('* City') }}</label>

                    <select id="city_${index}" name="row[${index}][city]" disabled title="Firstly, you need to select state."
                        class="custom-select @error('row.${index}.city') is-invalid @enderror" value="{{ old('city') }}" onclick="selectCity(${index})"
                        autocomplete="off">
                        <option value="0">Choose City</option>
                    </select>
                    @error('row.${index}.city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="township_${index}" class="col-form-label">{{ __('* Township & Ward') }}</label>

                    <select id="township_${index}" name="row[${index}][township]" disabled title="Firstly, you need to select city."
                        class="custom-select @error('row.${index}.township') is-invalid @enderror" value="{{ old('township') }}" onclick="selectTownship(${index})"
                        autocomplete="off">
                        <option value="0">Choose Township & Wrad</option>
                    </select>
                    @error('row.${index}.township')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="address_${index}" class="col-form-label">{{ __('* Address') }}</label>

                    <textarea id="address_${index}" name="row[${index}][address]" disabled title="Firstly, you need to select township."
                        class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}"
                        placeholder="No(541), Nga Moe Yeik 4st, Nga Moe Yeik Quarter" autocomplete="address"></textarea>
                    @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        `;
        e.innerHTML = html;
        
        company ? company.appendChild(e) : '';
    }

    if(supplier > 0) {
        for(let i = 0; i < supplier; i++) {
            selectState(i);
            selectCity(i);
            selectTownship(i);
            index++;
        }
        index--;
    }
})
/* End - Current Address */
</script>
@endpush
