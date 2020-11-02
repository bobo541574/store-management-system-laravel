@extends('backend.templates.master')

@section('content')
<div class="col-md-12">
    <div class="card shadow text-left">
        <div class="card-header h3 text-primary font-weight-bold">Size Create</div>
        <div class="card-body">
            <form action="{{ route('size.store') }}" method="post">
                @include('backend.size._form', ['buttonText' => "Create Size"])
            </form>
        </div>
    </div>
</div>
@endsection
