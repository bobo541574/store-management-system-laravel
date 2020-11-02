@extends('backend.templates.master')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header h3 text-primary font-weight-bold">
                Check Out Create
            </div>
            <div class="card-body">
                <form action="{{ route('checkouts.store') }}" method="post">
                    @include('backend.checkouts._form', [
                    'buttonText' => 'Create Check Out'
                    ])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        let total_price = document.querySelector('#total_price');
        let price_discount = document.querySelector('#price_discount');
        price_discount = price_discount.value.split('-')[0];
        total_price.value = price_discount;
        priceCalculator(total_price, price_discount);
    })

    function priceCalculator(total_price, price_discount) {
        
        let discount = document.querySelector('#discount')
        let actual_price = document.querySelector('#actual_price')

        discount.addEventListener('keyup', () => {
            total_price.value = (price_discount.split('/')[0] - discount.value) + ' / MMK';
        })

        quantity.addEventListener('click', () => {
            totalPrice(quantity.value, price.value);
        })

        actual_price.value = (price_discount.split('/')[0] - discount.value);
        total_price.value = (price_discount.split('/')[0] - discount.value) + ' / MMK';
    }

</script>
@endpush
