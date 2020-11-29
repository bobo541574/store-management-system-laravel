@extends('backend.templates.master')

@section('content')
<div class="col-md-12">
    <div class="card shadow text-left">
        <div class="card-header h5 text-primary font-weight-bold">Color Create</div>
        <div class="card-body">
            <form action="{{ route('colors.store') }}" method="post">
                @include('backend.colors._form', ['buttonText' => "Create Color"])
            </form>
        </div>
    </div>
</div>
@endsection
