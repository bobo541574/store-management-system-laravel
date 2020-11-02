@extends('backend.templates.master')

@section('content')
<div class="col-md-12">
    <div class="card shadow text-left">
        <div class="card-header h3 text-primary font-weight-bold">Category Create</div>
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="post">
                @include('backend.categories._form', ['buttonText' => "Create Category"])
            </form>
        </div>
    </div>
</div>
@endsection
