@extends('backend.templates.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header h5 text-primary font-weight-bold">
                    Order Create
                </div>
                <div class="card-body">
                    <form action="{{ route('orders.store') }}" method="post">
                        @include('backend.orders._form', [
                            'buttonText' => 'Create Order'
                        ])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection