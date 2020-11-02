<div class="table-responsive">
    <table class="table table-striped table-inverse table-hover text-center" id="townships">
        <thead class="thead-inverse table-header">
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>City</th>
                <th>State</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="text-primary small font-weight-bold">
            @foreach ($townships as $key => $township)
            <tr>
                <td  class="align-middle">{{ ++$key }}</td>
                <td  class="align-middle">{{ $township->name }}</td>
                <td  class="align-middle">{{ $township->city->name }}</td>
                <td  class="align-middle">{{ $township->city->state->name }}</td>
                <td  class="align-middle">
                    {{-- table action --}}
                    @include('backend.shared._tableaction', [
                        'title' => 'township',
                        'routeDetail'   => route('townships.show', $township->id),
                        'routeEdit'   => route('townships.edit', $township->id),
                        'modal'   => '#township_'.$township->id,
                    ])

                    <!-- Modal -->
                    @include('backend.shared._modal', [
                        'modal' => 'township_'.$township->id, 
                        'label' => 'townshipLabel_'.$township->id,
                        'route' => route('townships.destroy', $township->id) 
                    ])
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
