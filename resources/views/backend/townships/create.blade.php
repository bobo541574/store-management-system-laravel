@extends('backend.templates.master')

@section('content')
<div class="col-md-12">
    <div class="card shadow text-left">
        <div class="card-header h5 text-primary font-weight-bold">Township Create</div>
        <div class="card-body">
            <form action="{{ route('townships.store') }}" method="post">
                @include('backend.townships._form', [
                    'buttonText' => "Create Township"
                ])
            </form>
        </div>
    </div>
</div>
@endsection
