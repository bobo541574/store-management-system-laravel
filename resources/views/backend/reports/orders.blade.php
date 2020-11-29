@extends('backend.templates.master')

@section('content')
<div class="col-md-12">
    <div class="card text-left shadow">
        <div class="card-header h5 text-primary font-weight-bold">
            Order List / Month (Report)
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
            <div class="table-responsive">
                <table class="table table-striped table-hover text-center">
                    <thead class="thead-inverse table-header">
                        <tr>
                            <th class="align-middle">Order Date</th>
                            <th class="align-middle">Customer Name</th>
                            <th class="align-middle">Product Name</th>
                            <th class="align-middle">Quantity</th>
                            <th></th>
                            <th class="align-middle">Cost <small>(MMK)</small> </th>
                            <th class="align-middle">Price <small>(MMK)</small> </th>
                            <th class="align-middle">Total Price <small>(MMK)</small> </th>
                            <th></th>
                            <th class="align-middle">Total Cost <small>(MMK)</small> </th>
                            <th></th>
                            <th class="align-middle">Profit <small>(MMK)</small> </th>
                        </tr>
                    </thead>
                    <tbody class="text-primary small font-weight-bold">
                        {{-- @foreach ($orders as $key => $order)
                        <tr>
                            <td>
                                <span>{{ $order['customer_name'] }}</span>    
                            </td>
                            <td>
                                <span >{{ $order['product_name'] }}</span>
                            </td>
                            <td>
                                <span>{{ $order['order_date'] }}</span>
                            </td>
                            <td>
                                <span> {{ $order['quantity'] }} </span>
                            </td>
                            <td>
                                <span> {{ formatted_money($order['cost']) }} </span>
                            </td>               
                            <td>
                                <span> {{ formatted_money($order['total_cost']) }} </span>
                            </td>
                            <td>
                                <span> {{ formatted_money($order['price']) }} </span>
                            </td>
                            <td>
                                <span> {{ formatted_money($order['total_price']) }} </span>
                            </td>
                            <td>
                                <span> {{ formatted_money($order['profit']) }} </span>
                            </td>
                        </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
    
</div>
@endsection

@push('scripts')
<script>
    
    document.addEventListener('DOMContentLoaded', () => {
        let date = document.querySelector('#date');
        let excel_date = document.querySelector('#excel_date');

        ajaxRequestForOrderTable(date.value);

        date.addEventListener('input', () => {
            ajaxRequestForOrderTable(date.value);
        })
    })

    function ajaxRequestForOrderTable(value) {
        let tbody = document.querySelector('tbody');

        fetch(`/reports/orders/${value}`, {
            method: 'get',
        })
        .then(res => {
            return res.json();
        })
        .then(ordersList => {
            let orders = ordersList.orders;
            let table = '';
            if(orders.length > 0) {
                orders.forEach(order => {
                    table += 
                            `
                            <tr>
                                <td>
                                    <span> ${ order.order_date } </span>
                                </td>
                                <td>
                                    <span> ${ order.customer_name } </span>    
                                </td>
                                <td>
                                    <span> ${ order.product_name } </span>
                                </td>
                                <td>
                                    <span> ${ order.quantity } </span>
                                </td>
                                <td>
                                    <span> 
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </span>
                                </td>
                                <td>
                                    <span> ${ number_format(order.cost, 3) } </span>
                                </td>               
                                <td>
                                    <span> ${ number_format(order.price, 3) } </span>
                                </td>
                                <td>
                                    <span> ${ number_format(order.total_price, 3) } </span>
                                </td>
                                <td>
                                    <span> 
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                    </span>
                                </td>
                                <td>
                                    <span> ${ number_format(order.total_cost, 3) } </span>
                                </td>
                                <td>
                                    <span> 
                                        <i class="fas fa-equals"></i>
                                    </span>
                                </td>
                                <td>
                                    <span> ${ number_format(order.profit, 3) } </span>
                                </td>
                            </tr>
                            `;
                })
            } else {
                table += `
                        <tr>
                            <td colspan="12" class="text-gray-600 text-center font-weight-bold py-3 h6">Nothing to Show</td>
                        </tr>
                        `;
            }
            tbody.innerHTML = table;

        })
    }
</script>
@endpush
