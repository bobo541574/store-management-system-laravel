@extends('backend.templates.master')

@section('content')
<div class="col-md-12">
    <div class="card shadow text-left">
        <div class="card-header h3 text-primary font-weight-bold">City Create</div>
        <div class="card-body">
            <form action="{{ route('cities.store') }}" method="post">
                @include('backend.cities._form', [
                    'buttonText' => "Create City"
                ])
            </form>
        </div>
    </div>
</div>
@endsection
