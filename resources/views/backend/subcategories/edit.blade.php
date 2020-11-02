@extends('backend.templates.master')

@section('content')
<div class="col-md-12">
    <div class="card shadow text-left">
        <div class="card-header h3 text-primary font-weight-bold">Sub Category Edit</div>
        <div class="card-body">
            <form action="{{ route('subcategories.update', $subcategory->id) }}" method="post">
                @method('PUT')
                @include('backend.subcategories._form', ['categories' => $categories, 'buttonText' => "Update Sub Category"])
            </form>
        </div>
    </div>
</div>
@endsection
