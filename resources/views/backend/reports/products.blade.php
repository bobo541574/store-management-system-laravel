@extends('backend.templates.master')

@section('content')
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
                        <input type="date" name="date" id="date" value="{{ current_date() }}" class="form-control form-control-sm">
                    </div>
                </div>
            </div>
            <table class="display table table-responsive table-striped text-center">
                <thead class="thead-inverse table-header">
                    <tr>
                        <th style="width: 15%">Arrived Date</th>
                        <th style="width: 15%">Supplier Name</th>
                        <th style="width: 15%">Product Name</th>
                        <th style="width: 20%">Total Price</th>
                        <th></th>
                        <th style="width: 20%">Total Cost</th>
                        <th></th>
                        <th style="width: 20%">Profit</th>
                    </tr>
                    </thead>
                    <tbody class="text-primary small font-weight-bold">
                        {{-- @foreach ($products['productByArrived'] as $product)
                            <tr>
                                <td>
                                    <span class="">
                                        {{ $product['arrived'] }}
                                    </span>
                                </td>
                                <td>
                                    <span class="">
                                        {{ $product['supplier'] }}
                                    </span>
                                </td>
                                <td>
                                    <span class="">
                                        {{ $product['name'] }}
                                    </span>
                                </td>
                                <td>
                                    <span class="">
                                        {{ formatted_money($product['sub_price']) }}
                                    </span>
                                </td>
                                <td>
                                    <span class=""> <i class="fa fa-minus" aria-hidden="true"></i> </span>
                                </td>
                                <td>
                                    <span class="">
                                        {{ formatted_money($product['sub_cost']) }}
                                    </span>
                                </td>
                                <td>
                                    <span class=""> <i class="fas fa-equals"></i> </span>
                                </td>
                                <td>
                                    <span class="">
                                        {{ formatted_money($product['sub_profit']) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <th colspan="2" class="text-right">
                                Total
                            </th>
                            <th>
                                <span class=""> <i class="fa fa-arrow-right" aria-hidden="true"></i> </span>
                            </th>
                            <th>
                                <span class="">
                                    {{ formatted_money($products['total_price']) }}
                                </span>
                            </th>
                            <th>
                                <span class=""> <i class="fa fa-minus" aria-hidden="true"></i> </span>
                            </th>
                            <th>
                                <span class="">
                                    {{ formatted_money($products['total_cost']) }}
                                </span>
                            </th>
                            <th>
                                <span class=""> <i class="fas fa-equals"></i> </span>
                            </th>
                            <th>
                                <span class="">
                                    {{ formatted_money($products['total_profit']) }}
                                </span>
                            </th>
                        </tr> --}}
                    </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    
    document.addEventListener('DOMContentLoaded', () => {
        let date = document.querySelector('#date');
        let excel_date = document.querySelector('#excel_date');

        ajaxRequestForProductTable(date.value);
        
        date.addEventListener('input', () => {
            ajaxRequestForProductTable(date.value);
        })
    })

    function ajaxRequestForProductTable(value) {
        let tbody = document.querySelector('tbody');
        fetch(`/reports/products/${value}`, {
            method: 'get',
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
                                    <span> 
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                    </span>
                                </td>
                                <td>
                                    <span class="">
                                        ${ number_format(product.sub_cost, 3) }
                                    </span>
                                </td>
                                <td>
                                    <span> 
                                        <i class="fas fa-equals"></i>
                                    </span>
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
                                <span class=""> 
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i> 
                                </span>
                            </th>
                            <th>
                                <span class="">
                                    ${ number_format(total_price, 3) }
                                </span>
                            </th>
                            <th>
                                <span> 
                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                </span>
                            </th>
                            <th>
                                <span class="">
                                    ${ number_format(total_cost, 3) }
                                </span>
                            </th>
                            <th>
                                <span> 
                                    <i class="fas fa-equals"></i>
                                </span>
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
    }
</script>
@endpush
