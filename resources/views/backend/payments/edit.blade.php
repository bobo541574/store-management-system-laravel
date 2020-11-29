@extends('backend.templates.master')

@section('content')
<div class="col-md-12">
    <div class="card shadow text-left">
        <div class="card-header h5 text-primary font-weight-bold">Payment Create</div>
        <div class="card-body">
            <form action="{{ route('payments.update', $payment->id) }}" method="post">
                @method('PUT')
                @include('backend.payments._form', ['buttonText' => "Update Payment"])
            </form>
        </div>
    </div>
</div>
@endsection
