<div class="table-responsive">
    <table class="table table-striped table-inverse table-hover text-center" id="suppliers">
        <thead class="thead-inverse table-header">
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Logo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="text-primary small font-weight-bold">
            @foreach ($suppliers as $key => $supplier)
            <tr>
                <td class="align-middle">{{ ++$key }}</td>
                <td class="align-middle">{{ $supplier->name }}</td>
                <td class="align-middle"><span class="badge badge-primary"> {{ $supplier->contacts()->first()->phone ?? '' }} </span></td>
                <td class="align-middle"><img src="{{ $supplier->photo }}" width="45px" alt="logo"></td>
                <td class="align-middle">
                    {{-- table action --}}
                    @include('backend.shared._tableaction', [
                        'title' => 'supplier',
                        'routeDetail'   => route('suppliers.show', $supplier->id),
                        'routeEdit'   => route('suppliers.edit', $supplier->id),
                        'modal'   => '#supplier_'.$supplier->id,
                    ])

                    <!-- Modal -->
                    @include('backend.shared._modal', [
                        'modal' => 'supplier_'.$supplier->id, 
                        'label' => 'supplierLabel_'.$supplier->id,
                        'route' => route('suppliers.destroy', $supplier->id) 
                    ])
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
