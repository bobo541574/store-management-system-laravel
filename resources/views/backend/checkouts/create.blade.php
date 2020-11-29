@extends('backend.templates.master')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header h5 text-primary font-weight-bold">
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
    function number_format (number, decimals, dec_point, thousands_sep) {
        // Strip all characters but numerical ones.
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 2) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0') + ".000 /MMK";
        }
        return s.join(dec);
    }

    document.addEventListener('DOMContentLoaded', () => {
        let total_price = document.querySelector('#total_price');
        let price_discount = document.querySelector('#price_discount');
        price_discount = price_discount.value.split('-')[0];
        total_price.value = price_discount.value;

        discount.addEventListener('keyup', () => {
            priceCalculator(total_price, price_discount);
        })

        discount.addEventListener('click', () => {
            priceCalculator(total_price, price_discount);
        })
        
        priceCalculator(total_price, price_discount);
    })


    function priceCalculator(total_price, price_discount) {
        
        let discount = document.querySelector('#discount')
        let actual_price = document.querySelector('#actual_price')

        total_price.value = (price_discount - discount.value);
        
        total_price.value = number_format(price_discount.split('/')[0] - discount.value) + ".000 /MMK";
        actual_price.value = price_discount - discount.value;
    }

</script>
@endpush
