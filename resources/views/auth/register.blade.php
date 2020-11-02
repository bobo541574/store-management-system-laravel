@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header h5">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group text-center" style="margin-top: 1rem;">
                                    {{-- <label for="profile" class="col-form-label">{{ __('Profile') }}</label> --}}
                                    <div class="mx-auto mb-2 box">
                                        <div class="profile-box font-weight-bold" style="font-size: 140%">Photo</div>
                                        <img src="" alt="profile" class="text-center img">
                                    </div>

                                    <div class="mx-auto photo">
                                        <input type="file" id="photo"
                                            class="form-control @error('profile') is-invalid @enderror" name="profile"
                                            value="{{ old('profile') }}" autocomplete="profile" />
                                        <label for="photo" class="btn-2">upload</label>

                                        <input type="hidden" id="profile"
                                            class="form-control @error('profile') is-invalid @enderror" name="profile"
                                            value="{{ old('profile') }}" autocomplete="profile" />

                                        @error('profile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                                <p class="text-danger col-md-12 font-weight-bolder  p-0">* Need to fill. </p>

                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name" class="col-form-label">{{ __('* Name') }}</label>

                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" placeholder="John Doe" autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-form-label">{{ __('* E-Mail Address') }}</label>

                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" placeholder="example@gmail.com" autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-form-label">{{ __('* Password') }}</label>

                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm"
                                        class="col-form-label">{{ __('* Confirm Password') }}</label>

                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>

                            {{-- Current Address --}}
                            <div class="col-md-3">

                                <div class="form-group">
                                    <label for="phone" class="col-form-label">{{ __('* Phone (Current)') }}</label>

                                    <input id="phone" type="phone"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" placeholder="+959 999 999 999" autocomplete="phone">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="state" class="col-form-label">{{ __('* State & Region (Current)') }}</label>

                                    <select name="state" id="state"
                                        class="custom-select @error('state') is-invalid @enderror"
                                        value="{{ old('state') }}" autocomplete="state">
                                        <option value="">Choose State & Region</option>
                                        @foreach (App\Models\State::all() as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="city" class="col-form-label">{{ __('* City (Current)') }}</label>

                                    <select id="city" name="city" disabled title="Firstly, you need to select state."
                                        class="custom-select @error('city') is-invalid @enderror"
                                        value="{{ old('city') }}" autocomplete="city">
                                        <option value="0">Choose City</option>
                                    </select>
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="township" class="col-form-label">{{ __('* Township & Ward (Current)') }}</label>

                                    <select id="township" name="township" disabled title="Firstly, you need to select city."
                                        class="custom-select @error('township') is-invalid @enderror"
                                        value="{{ old('township') }}" autocomplete="township">
                                        <option value="0">Choose Township & Wrad</option>
                                    </select>
                                    @error('township')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="address" class="col-form-label">{{ __('* Address (Current)') }}</label>

                                    <textarea id="address" name="address" disabled title="Firstly, you need to select township."
                                        class="form-control @error('address') is-invalid @enderror"
                                        value="{{ old('address') }}" placeholder="No(541), Nga Moe Yeik 4st, Nga Moe Yeik Quarter" autocomplete="address">
                                    </textarea>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            {{-- Parement Address --}}
                            <div class="col-md-3">

                                <div class="form-group">
                                    <label for="parmenent_phone" class="col-form-label">{{ __('Phone (Other)') }}</label>

                                    <input id="parmenent_phone" type="parmenent_phone"
                                        class="form-control @error('parmenent_phone') is-invalid @enderror" name="parmenent_phone"
                                        value="{{ old('parmenent_phone') }}" placeholder="+959 999 999 999" autocomplete="parmenent_phone">

                                    @error('parmenent_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="parmenent_state" class="col-form-label">{{ __('State & Region (Parmenent)') }}</label>

                                    <select name="parmenent_state" id="parmenent_state"
                                        class="custom-select @error('parmenent_state') is-invalid @enderror"
                                        value="{{ old('parmenent_state') }}" autocomplete="parmenent_state">
                                        <option value="">Choose State & Region</option>
                                        @foreach (App\Models\State::all() as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('parmenent_state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="parmenent_city" class="col-form-label">{{ __('City (Parmenent)') }}</label>

                                    <select id="parmenent_city" name="parmenent_city" disabled title="Firstly, you need to select state."
                                        class="custom-select @error('parmenent_city') is-invalid @enderror"
                                        value="{{ old('parmenent_city') }}" autocomplete="parmenent_city">
                                        <option value="0">Choose City</option>
                                    </select>
                                    @error('parmenent_city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="parmenent_township" class="col-form-label">{{ __('Township & Ward (Parmenent)') }}</label>

                                    <select id="parmenent_township" name="parmenent_township" disabled title="Firstly, you need to select city."
                                        class="custom-select @error('parmenent_township') is-invalid @enderror"
                                        value="{{ old('parmenent_township') }}" autocomplete="parmenent_township">
                                        <option value="0">Choose Township & Wrad</option>
                                    </select>
                                    @error('parmenent_township')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="parmenent_address" class="col-form-label">{{ __('Address (Parmenent)') }}</label>

                                    <textarea id="parmenent_address" name="parmenent_address" disabled title="Firstly, you need to select city."
                                        class="form-control @error('parmenent_address') is-invalid @enderror"
                                        value="{{ old('parmenent_address') }}" placeholder="No(541), Nga Moe Yeik 4st, Nga Moe Yeik Quarter" autocomplete="parmenent_address">
                                    </textarea>
                                    @error('parmenent_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-3 offset-md-9">
                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-primary col-md-12">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@push('scripts')

<script>
    $(document).ready(function() {
        /* Start - Photo Preview */
        let photo = document.querySelector('#photo');
        let img = document.querySelector('img');
        let box = document.querySelector(".profile-box");
        photo.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = () => {
                    const result = reader.result;
                    let image = document.querySelector("#profile");
                    image.value = file.name;
                    img.src = result;
                    img.style.display = 'block';
                    box.style.display = "none";
                }

            }
        })
        /* End - Photo Preview */

        /* Start - Current Address */
        let state = document.querySelector("#state");
        let cities = document.querySelector("#city");
        let townships = document.querySelector("#township");
        let home = document.querySelector("#address");
        let statePreviousId;
        let cityPreviousId;

        state.addEventListener('click', function () {
            let id = state.value;

            if (id > 0 && statePreviousId != id) {
                let html = "";
                cities.removeAttribute('disabled');
                fetch(`/state/${id}/cities`)
                    .then(res => {
                        return res.json()
                    })
                    .then(result => {
                        html += `<option value=''>Choose City</option>`;
                        result.forEach((city, index) => {
                            html += `<option value="${city.id}">${city.name}</option>`;
                        });

                        cities.innerHTML = html;
                    })
                    .catch(error => console.log(error))
                statePreviousId = id;
            }
        })

        cities.addEventListener('click', function () {
            let id = cities.value;

            if (id > 0 && cityPreviousId != id) {
                let html = "";
                townships.removeAttribute('disabled');
                fetch(`/city/${id}/townships`)
                    .then(res => {
                        return res.json()
                    })
                    .then(result => {
                        console.log(result)
                        html += `<option value=''>Choose City</option>`;
                        result.forEach((township, index) => {
                            html += `<option value="${township.id}">${township.name}</option>`;
                        });

                        townships.innerHTML = html;
                    })
                    .catch(error => console.log(error))
                cityPreviousId = id;
            }
        })

        townships.addEventListener('click', function() {
            let id = townships.value;

            if(id > 0) {
                home.removeAttribute('disabled');
            }
        }) 
        /* End - Current Address */

        /* Start - Parmenent Address */
        let parmenent_state = document.querySelector("#parmenent_state");
        let parmenent_cities = document.querySelector("#parmenent_city");
        let parmenent_townships = document.querySelector("#parmenent_township");
        let parmenent_home = document.querySelector("#parmenent_address");
        let parmenent_statePreviousId;
        let parmenent_cityPreviousId;

        parmenent_state.addEventListener('click', function () {
            let id = parmenent_state.value;

            if (id > 0 && parmenent_statePreviousId != id) {
                let html = "";
                parmenent_cities.removeAttribute('disabled');
                fetch(`/state/${id}/cities`)
                    .then(res => {
                        return res.json()
                    })
                    .then(result => {
                        html += `<option value=''>Choose City</option>`;
                        result.forEach((city, index) => {
                            html += `<option value="${city.id}">${city.name}</option>`;
                        });

                        parmenent_cities.innerHTML = html;
                    })
                    .catch(error => console.log(error))
                parmenent_statePreviousId = id;
            }
        })

        parmenent_cities.addEventListener('click', function () {
            let id = parmenent_cities.value;

            if (id > 0 && parmenent_cityPreviousId != id) {
                let html = "";
                parmenent_townships.removeAttribute('disabled');
                fetch(`/city/${id}/townships`)
                    .then(res => {
                        return res.json()
                    })
                    .then(result => {
                        console.log(result)
                        html += `<option value=''>Choose City</option>`;
                        result.forEach((township, index) => {
                            html += `<option value="${township.id}">${township.name}</option>`;
                        });

                        parmenent_townships.innerHTML = html;
                    })
                    .catch(error => console.log(error))
                parmenent_cityPreviousId = id;
            }
        })

        parmenent_townships.addEventListener('click', function() {
            let id = parmenent_townships.value;

            if(id > 0) {
                parmenent_home.removeAttribute('disabled');
            }
        }) 
        /* End - Parmenent Address */
    });
</script>
@endpush
