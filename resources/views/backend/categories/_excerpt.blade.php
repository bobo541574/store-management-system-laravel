<div class="table-responsive">
    <table class="table table-striped table-inverse table-hover text-center" id="category">
        <thead class="thead-inverse table-header">
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="text-primary small font-weight-bold">
            @foreach ($categories as $key => $category)
            <tr>
                <td  class="align-middle">{{ ++$key }}</td>
                <td  class="align-middle">{{ $category->name }}</td>
                <td  class="align-middle">
                {{-- table action --}}
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
                        'route' => route('categories.destroy', $category->id) 
                    ])
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
