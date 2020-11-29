@extends('backend.templates.master')

@section('content')
<div class="col-md-12">
    <div class="card shadow text-left">
        <div class="card-header h5 text-primary font-weight-bold">Role Create</div>
        <div class="card-body">
            <form action="{{ route('roles.store') }}" method="post">
                @include('backend.roles._form', [
                    'buttonText' => "Create Role"
                ])
            </form>
        </div>
    </div>
</div>
@endsection
