@extends('backend.templates.master')

@section('content')
<div class="col-md-12">
    <div class="card shadow text-left">
        <div class="card-header h3 text-primary font-weight-bold">City Edit</div>
        <div class="card-body">
            <form action="{{ route('cities.update', $city->id) }}" method="post">
                @method('PUT')
                @include('backend.cities._form', ['states' => $states, 'buttonText' => "Update City"])
            </form>
        </div>
    </div>
</div>
@endsection
