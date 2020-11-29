<table class="table table-responsive table-striped table-inverse table-hover text-center" id="category">
    <thead class="thead-inverse table-header">
        <tr>
            <th style="width: 5%;">No.</th>
            <th style="width: 45%;">Name</th>
            <th style="width: 50%;">Action</th>
        </tr>
    </thead>
    <tbody class="text-primary small font-weight-bold">
        @foreach ($categories as $key => $category)
        <tr>
            <td  class="align-middle">{{ ++$key }}</td>
            <td  class="align-middle">{{ $category->name }}</td>
            <td  class="align-middle">
            {{-- table action --}}
            @if (!$categories->pluck('deleted_at')[0])
                @include('backend.shared._tableaction', [
                    'title' => 'category',
                    'routeDetail'   => route('categories.show', $category->name),
                    'routeEdit'   => route('categories.edit', $category->id),
                    'modal'   => '#category_'.$category->id,
                ])

                    <!-- Modal -->
                    @include('backend.shared._modal', [
                        'modal' => 'category_'.$category->id, 
                        'label' => 'categoryLabel_'.$category->id,
                        'route' => route('categories.softDelete', $category->id) 
                    ])
                </td>
            @else
                @include('backend.shared._trash', [
                    'title' => 'category',
                    'routeRestore'   => route('categories.restore', $category->id),
                    'modal'   => '#category_'.$category->id,
                ])

                    <!-- Modal -->
                    @include('backend.shared._modal', [
                        'modal' => 'category_'.$category->id, 
                        'label' => 'categoryLabel_'.$category->id,
                        'route' => route('categories.destroy', $category->id) 
                    ])
                </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
