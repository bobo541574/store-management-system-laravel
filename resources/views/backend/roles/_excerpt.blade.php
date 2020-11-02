<div class="table-responsive">
    <table class="table table-striped table-inverse table-hover text-center" id="subcategory">
        <thead class="thead-inverse table-header">
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="text-primary font-weight-bold">
            @foreach ($roles as $key => $role)
            <tr>
                <td  class="align-middle">{{ ++$key }}</td>
                <td  class="align-middle">
                    <span class="badge {{ ($role->name == 'admin') ? 'badge-danger' : 'badge-info' }}">
                        {{ $role->name }}
                    </span>
                </td>
                <td  class="align-middle">
                    {{-- table action --}}
                    @include('backend.shared._tableaction', [
                        'title' => 'role',
                        'routeDetail'   => route('roles.show', $role->id),
                        'routeEdit'   => route('roles.edit', $role->id),
                        'modal'   => '#role_'.$role->id,
                    ])

                    <!-- Modal -->
                    @include('backend.shared._modal', [
                        'modal' => 'role_'.$role->id, 
                        'label' => 'roleLabel_'.$role->id,
                        'route' => route('roles.destroy', $role->id) 
                    ])
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
