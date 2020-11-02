<div class="table-responsive">
    <table class="table table-striped table-inverse table-hover text-center" id="payments">
        <thead class="thead-inverse table-header">
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="text-primary small font-weight-bold">
            @foreach ($payments as $key => $payment)
            <tr>
                <td  class="align-middle">{{ ++$key }}</td>
                <td  class="align-middle">{{ $payment->name }}</td>
                <td  class="align-middle">
                {{-- table action --}}
                @include('backend.shared._tableaction', [
                    'title' => 'payment',
                    'routeDetail'   => route('payments.show', $payment->id),
                    'routeEdit'   => route('payments.edit', $payment->id),
                    'modal'   => '#payment_'.$payment->id,
                ])

                    <!-- Modal -->
                    @include('backend.shared._modal', [
                        'modal' => 'payment_'.$payment->id, 
                        'label' => 'paymentLabel_'.$payment->id,
                        'route' => route('payments.destroy', $payment->id) 
                    ])
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
