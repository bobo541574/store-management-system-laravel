@extends('backend.templates.master')

@section('content')
<div class="col-md-12">
    <div class="card shadow text-left">
        <div class="card-header h5 text-primary font-weight-bold">Brand Create</div>
        <div class="card-body">
            <form action="{{ route('brands.store') }}" method="post" enctype="multipart/form-data">
                @include('backend.brands._form', [
                    'buttonText' => "Create Brand"
                ])
            </form>
        </div>
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
