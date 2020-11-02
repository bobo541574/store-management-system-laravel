<div class="table-responsive">
    <table class="table table-striped table-inverse table-hover text-center" id="cities">
        <thead class="thead-inverse table-header">
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>State</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="text-primary small font-weight-bold">
            @foreach ($cities as $key => $city)
            <tr>
                <td  class="align-middle">{{ ++$key }}</td>
                <td  class="align-middle">{{ $city->name }}</td>
                <td  class="align-middle">{{ $city->state->name }}</td>
                <td  class="align-middle">
                    {{-- table action --}}
                    @include('backend.shared._tableaction', [
                        'title' => 'city',
                        'routeDetail'   => route('cities.show', $city->id),
                        'routeEdit'   => route('cities.edit', $city->id),
                        'modal'   => '#city_'.$city->id,
                    ])

                    <!-- Modal -->
                    @include('backend.shared._modal', [
                        'modal' => 'city_'.$city->id, 
                        'label' => 'cityLabel_'.$city->id,
                        'route' => route('cities.destroy', $city->id) 
                    ])
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
