@extends('backend.templates.master')

@section('content')
{{-- <div class="col-md-12">
    <div class="card text-left shadow">
        <div class="card-header h5 text-primary font-weight-bold">
            Report For Unpaid Order List
        </div>
        <div class="card-body">
            @include('backend.shared._messages')
            <div class="row justify-content-between">
                <div class="row col-md-10 py-1">
                    <div class="col-md-1 pr-0">
                        <form action="{{ route('reports.exports', 'csv') }}" method="post">
                            @csrf
                            <input type="hidden" name="excel_date" id="excel_date" value="" placeholder="{{ now() }}">
                            <button class="btn btn-sm btn-primary"> Excel </button>
                        </form>
                        
                    </div>
                    <div class="col-md-1 pl-md-0">
                        <form action="{{ route('reports.exports', 'pdf') }}" method="post">
                            @csrf
                            <input type="hidden" name="pdf_date" id="pdf_date" value="" placeholder="{{ now() }}">
                            <button class="btn btn-sm btn-primary"> PDF </button>
                        </form>
                    </div>
                </div>
                <div class="col-md-2 py-1">
                    <div class="form-group">
                        <input type="date" name="date" id="date" value="" class="form-control form-control-sm">
                    </div>
                </div>
            </div>
            @include('backend.reports._products', ['products' => $products])
        </div>
    </div>
</div> --}}

<div class="col-md-12">
    <div class="card text-left shadow">
        <div class="card-header h5 text-primary font-weight-bold">
            Product List / Month (Report)
        </div>
        <div class="card-body">
            @include('backend.shared._messages')
            <div class="row justify-content-between">
                <div class="row col-md-10 py-1">
                    <div class="col-md-1 pr-0">
                        <form action="{{ route('reports.exports', 'csv') }}" method="post">
                            @csrf
                            <input type="hidden" name="excel_date" id="excel_date" value="" placeholder="{{ now() }}">
                            <button class="btn btn-sm btn-primary"> Excel </button>
                        </form>
                        
                    </div>
                    <div class="col-md-1 pl-md-0">
                        <form action="{{ route('reports.exports', 'pdf') }}" method="post">
                            @csrf
                            <input type="hidden" name="pdf_date" id="pdf_date" value="" placeholder="{{ now() }}">
                            <button class="btn btn-sm btn-primary"> PDF </button>
                        </form>
                    </div>
                </div>
                <div class="col-md-2 py-1">
                    <div class="form-group">
                        <input type="date" name="date" id="date" value="" class="form-control form-control-sm">
                    </div>
                </div>
            </div>
            @if ($orders ?? null)
                @include('backend.reports._orders', ['orders' => $orders])
            @else
                @include('backend.reports._products', ['products' => $products])
            @endif


        </div>
    </div>
    
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        let date = document.querySelector('#date');
        let excel_date = document.querySelector('#excel_date');
        let tbody = document.querySelector('tbody');
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        date.addEventListener('input', () => {
            excel_date.value = date.value;
            fetch(`/reports/products/${date.value}`, {
                method: 'get',
                credentials: "same-origin",
            })
            .then(res => {
                return res.json();
            })
            .then(productAttributes => {
                const total_cost = productAttributes.total_cost;
                const total_price = productAttributes.total_price;
                const total_profit = productAttributes.total_profit;
                const productByArrived = productAttributes.productByArrived;
                let table = '';
                if(productByArrived.length > 0) {
                    productByArrived.forEach(product => {
                        table += 
                                `
                                <tr>
                                    <td>
                                        <span class="">
                                            ${product.supplier}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="">
                                            ${ product.arrived }
                                        </span>
                                    </td>
                                    <td>
                                        <span class="">
                                            ${ product.name }
                                        </span>
                                    </td>
                                    <td>
                                        <span class="">
                                            ${ number_format(product.sub_price, 3) }
                                        </span>
                                    </td>
                                    <td>
                                        <span class=""> - </span>
                                    </td>
                                    <td>
                                        <span class="">
                                            ${ number_format(product.sub_cost, 3) }
                                        </span>
                                    </td>
                                    <td>
                                        <span class=""> = </span>
                                    </td>
                                    <td>
                                        <span class="">
                                            ${ number_format(product.sub_profit, 3) }
                                        </span>
                                    </td>
                                </tr>
                                `;
                    })
                    table +=
                            `
                            <tr>
                                <th colspan="2" class="text-right text-">
                                    Total
                                </th>
                                <th>
                                    <span class=""> => </span>
                                </th>
                                <th>
                                    <span class="">
                                        ${ number_format(total_price, 3) }
                                    </span>
                                </th>
                                <th>
                                    <span class=""> - </span>
                                </th>
                                <th>
                                    <span class="">
                                        ${ number_format(total_cost, 3) }
                                    </span>
                                </th>
                                <th>
                                    <span class=""> = </span>
                                </th>
                                <th>
                                    <span class="">
                                        ${ number_format(total_profit, 3) }
                                    </span>
                                </th>
                            </tr>
                            `;
                } else {
                    table += `
                            <tr>
                                <td colspan="8" class="text-gray-600 text-center font-weight-bold py-3 h6">Nothing to Show</td>
                            </tr>
                            `;
                }
                tbody.innerHTML = table;

            })
        })
    })
</script>
@endpush
