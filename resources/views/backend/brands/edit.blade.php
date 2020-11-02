@extends('backend.templates.master')

@section('content')
<div class="card shadow text-left">
    <div class="card-header h3 text-primary font-weight-bold">Brand Edit</div>
    <div class="card-body">
        <form action="{{ route('brands.update', $brand->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @include('backend.brands._form', ['buttonText' => "Update Brand"])
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    /* Start - logo preview */
    let box = document.querySelector('#box');
    // let sample = document.querySelector('#sample');
    let preview = document.querySelector('#preview');
    let photo = document.querySelector('#photo');
    photoUpload(photo, preview, box, false);

</script>
@endpush
