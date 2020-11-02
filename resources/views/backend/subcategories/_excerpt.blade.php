<div class="table-responsive">
    <table class="table table-striped table-inverse table-hover text-center" id="subcategory">
        <thead class="thead-inverse table-header">
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="text-primary small font-weight-bold">
            @foreach ($subcategories as $key => $subcategory)
            <tr>
                <td  class="align-middle">{{ ++$key }}</td>
                <td  class="align-middle">{{ $subcategory->name }}</td>
                <td  class="align-middle">{{ $subcategory->category->name }}</td>
                <td  class="align-middle">
                    {{-- table action --}}
                    @include('backend.shared._tableaction', [
                        'title' => 'subcategory',
                        'routeDetail'   => route('subcategories.show', $subcategory->id),
                        'routeEdit'   => route('subcategories.edit', $subcategory->id),
                        'modal'   => '#subcategory_'.$subcategory->id,
                    ])

                    <!-- Modal -->
                    @include('backend.shared._modal', [
                        'modal' => 'subcategory_'.$subcategory->id, 
                        'label' => 'subcategoryLabel_'.$subcategory->id,
                        'route' => route('subcategories.destroy', $subcategory->id) 
                    ])
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
