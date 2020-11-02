@extends('backend.templates.master')

@section('content')
<div class="col-md-12">
    <div class="card shadow text-left">
        <div class="card-header h3 text-primary font-weight-bold">User & Role Assign</div>
        <div class="card-body">
            <form action="{{ route('users.role.store') }}" method="post">
                @include('backend.users._assign_form', [
                    'buttonText' => "Create User & Role"
                ])
            </form>
        </div>
    </div>
</div>
@endsection
