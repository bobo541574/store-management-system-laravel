<div class="table-responsive">
    <table class="table table-striped table-inverse table-hover text-center" id="checkouts">
        <thead class="thead-inverse table-header">
            <tr>
                <th style="width: 20%">Customer Name</th>
                <th style="width: 10%">Quantity</th>
                <th style="width: 15%">Price</th>
                <th style="width: 15%">Payment Type</th>
                <th style="width: 20%">Payment Date</th>
                <th style="width: 20%">Action</th>
            </tr>
        </thead>
        <tbody class="text-primary small font-weight-bold">
            @foreach ($checkouts as $key => $checkout)
            <tr>
                <td class="align-middle">{{ $checkout->order->customer_name }}</td>
                <td class="align-middle"><span class=""> {{ $checkout->quantity }} </span></td>
                <td class="align-middle"><span class=""> {{ formatted_money($checkout->total_price) }} </span></td>
                <td class="align-middle"><span class=""> {{ $checkout->payment->name }} </span></td>
                <td class="align-middle"><span class=""> {{ $checkout->checkout_date }} </span></td>
                <td class="align-middle">
                    {{-- table action --}}
                    <div class="row justify-content-center">
                        
                        @include('backend.shared._tableaction', [
                            'title' => 'checkout',
                            'routeDetail'   => route('checkouts.show', $checkout->id),
                            'routeEdit'   => route('checkouts.edit', $checkout->id),
                            'modal'   => '#checkout_'.$checkout->id,
                        ])
                    </div>

                    <!-- Modal -->
                    @include('backend.shared._modal', [
                        'modal' => 'checkout_'.$checkout->id, 
                        'quantity' => $checkout->quantity, 
                        'label' => 'checkoutLabel_'.$checkout->id,
                        'route' => route('checkouts.destroy', $checkout->id) 
                    ])
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
