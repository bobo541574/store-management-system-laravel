@extends('backend.templates.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header h3 text-primary font-weight-bold">
                    Order Edit
                </div>
                <div class="card-body">
                    <form action="{{ route('orders.update', $order->id) }}" method="post">
                        @method('PUT')
                        @include('backend.orders._form', [
                            'buttonText' => 'Edit Order'
                        ])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection