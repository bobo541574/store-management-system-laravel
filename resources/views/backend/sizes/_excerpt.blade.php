<div class="table-responsive">
    <table class="table table-striped table-inverse table-hover text-center" id="sizes">
        <thead class="thead-inverse table-header">
            <tr>
                <th>No.</th>
                <th>Letter</th>
                <th>Number</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="text-primary small font-weight-bold">
            @foreach ($sizes as $key => $size)
            <tr>
                <td  class="align-middle">{{ ++$key }}</td>
                <td  class="align-middle">{{ $size->letter ?? "-" }}</td>
                <td  class="align-middle">{{ $size->number }}</td>
                <td  class="align-middle">
                {{-- table action --}}
                @include('backend.shared._tableaction', [
                    'title' => 'size',
                    'routeDetail'   => route('sizes.show', $size->id),
                    'routeEdit'   => route('sizes.edit', $size->id),
                    'modal'   => '#size_'.$size->id,
                ])

                    <!-- Modal -->
                    @include('backend.shared._modal', [
                        'modal' => 'size_'.$size->id, 
                        'label' => 'sizeLabel_'.$size->id,
                        'route' => route('sizes.destroy', $size->id) 
                    ])
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
