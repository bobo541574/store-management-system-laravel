@extends('backend.templates.master')

@section('content')
<div class="col-md-12">
    <div class="card shadow text-left">
        <div class="card-header h3 text-primary font-weight-bold">Township Edit</div>
        <div class="card-body">
            <form action="{{ route('townships.update', $township->id) }}" method="post">
                @method('PUT')
                @include('backend.townships._form', ['cities' => $cities, 'buttonText' => "Update Township"])
            </form>
        </div>
    </div>
</div>
@endsection
