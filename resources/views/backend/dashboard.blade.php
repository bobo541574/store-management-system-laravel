@extends('backend.templates.master')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card text-center">
            <h4 class="card-header font-weight-bolder">Admin Dashboard</h4>
            <div class="card-body">
                @include('backend.shared._messages')
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
@endpush