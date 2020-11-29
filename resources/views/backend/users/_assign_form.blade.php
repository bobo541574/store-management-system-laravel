@csrf

<div class="form-group">
    <input type="hidden" name="user_id" value="{{ $user->id }}">
    <label for="name" class="col-form-label">{{ __('Name') }}</label>

    <input id="name" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name"
        value="{{ old('name', $user->name ?? '') }}"
        placeholder="eg. admin, staff & ...." autocomplete="on" autofocus>

    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <label for="role" class="col-form-label">{{ __('Role') }}</label>
    <select name="role[]" id="role" class="custom-select custom-select-sm @error('role') is-invalid @enderror"
        value="{{ old('role') }}" autocomplete="off" multiple>
        <option value="">Choose Role</option>
        @foreach ($roles as $role)
        <option value="{{ $role->id }}" 
            @foreach ($user->userRoles as $id)
                {{ ($role->id == ($id ?? '')) ? 'selected' : '' }}
            @endforeach
            >
            {{ $role->name }}</option>
        @endforeach
    </select>

    @error('role')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <button class="btn btn-sm btn-primary">{{ $buttonText }}</button>
</div>
