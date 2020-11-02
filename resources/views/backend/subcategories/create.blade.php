@extends('backend.templates.master')

@section('content')
<div class="col-md-12">
    <div class="card shadow text-left">
        <div class="card-header h3 text-primary font-weight-bold">Sub Category Create</div>
        <div class="card-body">
            <form action="{{ route('subcategories.store') }}" method="post">
                @include('backend.subcategories._form', [
                    'buttonText' => "Create Sub Category"
                ])
            </form>
        </div>
    </div>
</div>
@endsection
