@extends('backend.templates.master')

@section('content')
<div class="col-md-12">
    <div class="card shadow text-left">
        <div class="card-header h3 text-primary font-weight-bold">Role Edit</div>
        <div class="card-body">
            <form action="{{ route('roles.update', $role->id) }}" method="post">
                @method('PUT')
                @include('backend.roles._form', ['buttonText' => "Update Role"])
            </form>
        </div>
    </div>
</div>
@endsection
