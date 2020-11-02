<div class="table-responsive">
    <table class="table table-striped table-inverse table-hover text-center" id="orders">
        <thead class="thead-inverse table-header">
            <tr>
                <th style="">Customer Name</th>
                <th style="">Order ID</th>
                <th style="">Quantity</th>
                <th style="">Price</th>
                <th style="width: 15%">Order Date</th>
                <th style="width: 20%">Action</th>
            </tr>
        </thead>
        <tbody class="text-primary font-weight-bold">
            @foreach ($orders as $key => $order)
            <tr>
                <td class="align-middle">
                    <span class="badge badge-dark">
                        {{ $order->customer_name }}
                    </span>
                </td>
                <td class="align-middle">
                    <span class="small">
                        {{ $order->order_code }}
                    </span>
                </td>
                <td class="align-middle"><span class="badge badge-primary"> {{ $order->quantity }} </span></td>
                <td class="align-middle"><span class="badge badge-primary"> {{ $order->totalPrice }} /MMK </span></td>
                <td class="align-middle"><span class="badge badge-warning"> {{ $order->order_date }} </span></td>
                <td class="align-middle">
                    {{-- table action --}}
                    <div class="row justify-content-center">
                        <form action="{{ route('checkouts.create') }}" method="get">
                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                            <button class="btn btn-sm btn-success mt-1 mx-1" title="checkout" data-toggle="tooltip">
                                <i class="fa fa-credit-card"></i>
                            </button>
                        </form>
                        @include('backend.shared._tableaction', [
                            'title' => 'order',
                            'routeDetail'   => route('orders.show', $order->id),
                            'routeEdit'   => route('orders.edit', $order->id),
                            'modal'   => '#order_'.$order->id,
                        ])
                    </div>

                    <!-- Modal -->
                    @include('backend.shared._modal', [
                        'modal' => 'order_'.$order->id, 
                        'quantity' => $order->quantity, 
                        'label' => 'orderLabel_'.$order->id,
                        'route' => route('orders.destroy', $order->id) 
                    ])
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
