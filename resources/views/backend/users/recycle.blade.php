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

            <div class="custom-file mx-auto">
                <input type="hidden" name="logo" value="{{ old('logo', $supplier->logo ?? '') }}">

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

<div id="company">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="email" class="col-form-label">{{ __('* E-Mail Address') }}</label>

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email', ($supplier ?? '') ? $supplier->contacts()->first()->email : '') }}" placeholder="example@gmail.com" autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="phone" class="col-form-label">{{ __('* Phone') }}</label>

                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone"
                    value="{{ old('phone', ($supplier ?? '') ? $supplier->contacts()->first()->phone : '') }}" placeholder="+959 999 999 999" autocomplete="phone">

                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="state" class="col-form-label">{{ __('* State & Region') }}</label>

                <select name="state" id="state" class="custom-select @error('state') is-invalid @enderror"
                    value="{{ old('state') }}" autocomplete="off">
                    <option value="">Choose State & Region</option>
                    @foreach ($states as $state)
                    <option value="{{ $state->id }}" {{ ((($supplier ?? '') ? $supplier->contacts()->first()->state_id : '') == $state->id) ? 'selected' : '' }}>{{ $state->name }}</option>
                    @endforeach
                </select>

                @error('state')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        {{-- Current Address --}}
        <div class="col-md-4">
            <div class="form-group">
                <label for="city" class="col-form-label">{{ __('* City') }}</label>

                <select id="city" name="city" disabled title="Firstly, you need to select state."
                    class="custom-select @error('city') is-invalid @enderror" value="{{ old('city') }}"
                    autocomplete="city">
                    <option value="0">Choose City</option>
                </select>
                @error('city')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="township" class="col-form-label">{{ __('* Township & Ward') }}</label>

                <select id="township" name="township" disabled title="Firstly, you need to select city."
                    class="custom-select @error('township') is-invalid @enderror" value="{{ old('township') }}"
                    autocomplete="township">
                    <option value="0">Choose Township & Wrad</option>
                </select>
                @error('township')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="address" class="col-form-label">{{ __('* Address') }}</label>

                <textarea id="address" name="address" disabled title="Firstly, you need to select township."
                    class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}"
                    placeholder="No(541), Nga Moe Yeik 4st, Nga Moe Yeik Quarter" autocomplete="address">{{ (($supplier ?? '') ? $supplier->contacts()->first()->address : '') }}</textarea>
                @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>
</div>

<div class="row my-2">
    <div class="col-md-2 offset-md-5">
        <a href="javascript:void(0)" id="add" class="btn btn-sm btn-warning"><i class="fa fa-plus-circle"
                aria-hidden="true"></i> Add Address</a>
    </div>
</div>

<div class="col-md-3 offset-md-9">
    <div class="form-group mb-0">
        <button type="submit" class="btn btn-primary col-md-12">
            {{ $buttonText }}
        </button>
    </div>
</div>










/* Start - Current Address */
    let state = document.querySelector(`#company #state_${index}`);
    let cities = document.querySelector(`#company #city_${index}`);
    let townships = document.querySelector(`#company #township_${index}`);
    let home = document.querySelector(`#company #address_${index}`);
    let state_pre_id;
    let city_pre_id;
   
    state ? state.addEventListener('click', function () {
        city()
    }) : city();
    
    function city() {
        let id = state.value;
        if (id > 0 && state_pre_id != id) {
              let html = "";
              cities.removeAttribute('disabled');
              fetch(`/state/${id}/cities`)
                  .then(res => {
                      return res.json()
                  })
                  .then(result => {
                      html += `<option value=''>Choose City</option>`;
                      result.forEach((city, index) => {
                          html += `<option value="${city.id}" ${(city.id == city_id) ? 'selected' : ''}>${city.name}</option>`;
                      });
    
                      cities.innerHTML = html;
                  })
                  .catch(error => console.log(error))
              state_pre_id = id;
          }
    }
        
    cities ? cities.addEventListener('click', function () {
        township()
    }) : township();
    
    function township() {
        let id = (cities.value != 0) ? cities.value : city_id;
        if (id > 0 && city_pre_id != id) {
            let html = "";
            townships.removeAttribute('disabled');
            fetch(`/city/${id}/townships`)
                .then(res => {
                    return res.json()
                })
                .then(result => {
                    console.log(result)
                    html += `<option value=''>Choose Township & Wrad</option>`;
                    result.forEach((township, index) => {
                        html += `<option value="${township.id}" ${(township.id == township_id) ? 'selected' : ''}>${township.name}</option>`;
                    });
    
                    townships.innerHTML = html;
                })
                .catch(error => console.log(error))
            city_pre_id = id;
        }
    }
        
    townships ? townships.addEventListener('click', function() {
        address();
    }) : address();
    
    function address() {
        let id = (townships.value != 0) ? townships.value : township_id;
    
        if(id > 0) {
            home.removeAttribute('disabled');
        }
    }
    /* End - Current Address */



    // function selectState(index) {
        //     let state = document.querySelector(`#state_${index}`);
        //     let cities = document.querySelector(`#city_${index}`);
        //     let city_id = cities.getAttribute('data-id');
        //     let id = state.value;
        //     if (id > 0 && state_pre_id != id) {
        //         let html = "";
        //         cities.removeAttribute('disabled');
        //         fetch(`/state/${id}/cities`)
        //             .then(res => {
        //                 return res.json()
        //             })
        //             .then(result => {
        //                 html += `<option value=''>Choose City</option>`;
        //                 result.forEach((city, index) => {
        //                     html += `<option value="${city.id}" ${(city.id == city_id) ? 'selected' : ''}>${city.name}</option>`;
        //                 });
        //                 cities.innerHTML = html;
        //             })
        //             .catch(error => console.log(error))
        //         state_pre_id = id;
        //       }
        // }
        
        // function selectCity(index) {
        //     let cities = document.querySelector(`#city_${index}`);
        //     let townships = document.querySelector(`#township_${index}`);
        //     let township_id = townships.getAttribute('data-id');
        //     let id = (cities.value != 0) ? cities.value : cities.getAttribute('data-id');
        //     if (id > 0 && city_pre_id != id) {
        //         let html = "";
        //         townships.removeAttribute('disabled');
        //         fetch(`/city/${id}/townships`)
        //             .then(res => {
        //                 return res.json()
        //             })
        //             .then(result => {
        //                 html += `<option value=''>Choose Township & Wrad</option>`;
        //                 result.forEach((township, index) => {
                            
        //                     html += `<option value="${township.id}" ${(township.id == township_id) ? 'selected' : ''}>${township.name}</option>`;
        //                 });
        
        //                 townships.innerHTML = html;
        //             })
        //             .catch(error => console.log(error))
        //         city_pre_id = id;
        //     }
        // }
        
        // function selectTownship(index) {
        //     let townships = document.querySelector(`#township_${index}`);
        //     let home = document.querySelector(`#address_${index}`);
        //     let id = (townships.value != 0) ? townships.value : townships.getAttribute('data-id');
        
        //     if(id > 0) {
        //         home.removeAttribute('disabled');
        //     }
        // }