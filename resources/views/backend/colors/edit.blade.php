@extends('backend.templates.master')

@section('content')
<div class="col-md-12">
    <div class="card shadow text-left">
        <div class="card-header h3 text-primary font-weight-bold">Color Create</div>
        <div class="card-body">
            <form action="{{ route('colors.update', $color->id) }}" method="post">
                @method('PUT')
                @include('backend.colors._form', ['buttonText' => "Update Color"])
            </form>
        </div>
    </div>
</div>
@endsection
