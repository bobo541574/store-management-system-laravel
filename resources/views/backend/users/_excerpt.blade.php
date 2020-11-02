<div class="table-responsive">
    <table class="table table-striped table-inverse table-hover text-center" id="users">
        <thead class="thead-inverse table-header">
            <tr>
                <th style="width: 10%">No.</th>
                <th style="width: 20%">Name</th>
                <th style="width: 20%">Role</th>
                <th style="width: 10%">Phone</th>
                <th style="width: 20%">Photo</th>
                <th style="width: 20%">Action</th>
            </tr>
        </thead>
        <tbody class="text-primary font-weight-bold">
            @foreach ($users as $key => $user)
            <tr>
                <td class="align-middle">{{ ++$key }}</td>
                <td class="align-middle">{{ $user->name }}</td>
                <td class="align-middle"> 
                    @foreach ($user->roles as $role)
                        <span class="badge badge-info">
                            {{ $role->name }} 
                        </span> 
                    @endforeach
                </td>
                <td class="align-middle"><span class="badge badge-primary"> {{ $user->contacts()->first()->phone ?? '' }} </span></td>
                <td class="align-middle"><img src="{{ $user->photo }}" width="45px" alt="logo"></td>
                <td class="align-middle">
                    {{-- table action --}}
                    <div class="row justify-content-center">
                        <form action="{{ route('users.role.create', $user->id) }}" method="post">
                            @csrf
                            <button class="btn btn-sm btn-secondary mt-1 mx-1"
                                title="user & role assign" data-toggle="tooltip"><i class="fas fa-sync-alt"></i>
                            </button>
                        </form>
                        @include('backend.shared._tableaction', [
                            'title' => 'user',
                            'routeDetail'   => route('users.show', $user->id),
                            'routeEdit'   => route('users.edit', $user->id),
                            'modal'   => '#user_'.$user->id,
                        ])

                        <!-- Modal -->
                        @include('backend.shared._modal', [
                            'modal' => 'user_'.$user->id, 
                            'label' => 'userLabel_'.$user->id,
                            'route' => route('users.destroy', $user->id) 
                        ])
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
