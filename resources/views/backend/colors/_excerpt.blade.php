<div class="table-responsive">
    <table class="table table-striped table-inverse table-hover text-center" id="colors">
        <thead class="thead-inverse table-header">
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="text-primary small font-weight-bold">
            @foreach ($colors as $key => $color)
            <tr>
                <td  class="align-middle">{{ ++$key }}</td>
                <td  class="align-middle">{{ $color->name }}</td>
                <td  class="align-middle">
                {{-- table action --}}
                @include('backend.shared._tableaction', [
                    'title' => 'color',
                    'routeDetail'   => route('colors.show', $color->id),
                    'routeEdit'   => route('colors.edit', $color->id),
                    'modal'   => '#color_'.$color->id,
                ])

                    <!-- Modal -->
                    @include('backend.shared._modal', [
                        'modal' => 'color_'.$color->id, 
                        'label' => 'colorLabel_'.$color->id,
                        'route' => route('colors.destroy', $color->id) 
                    ])
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
