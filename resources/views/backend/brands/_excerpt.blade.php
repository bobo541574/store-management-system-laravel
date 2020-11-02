<div class="table-responsive">
    <table class="table table-striped table-inverse table-hover text-center" id="brands">
        <thead class="thead-inverse table-header">
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Sub Category</th>
                <th>Logo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="text-primary small font-weight-bold">
            @foreach ($brands as $key => $brand)
            <tr>
                <td class="align-middle">{{ ++$key }}</td>
                <td class="align-middle">{{ $brand->name }}</td>
                <td class="align-middle">{{ $brand->subcategory->name }}</td>
                <td class="align-middle"><img src="{{ $brand->photo }}" width="45px" alt="logo"></td>
                <td class="align-middle">
                    {{-- table action --}}
                    @include('backend.shared._tableaction', [
                        'title' => 'brand',
                        'routeDetail'   => route('brands.show', $brand->id),
                        'routeEdit'   => route('brands.edit', $brand->id),
                        'modal'   => '#brand_'.$brand->id,
                    ])

                    <!-- Modal -->
                    @include('backend.shared._modal', [
                        'modal' => 'brand_'.$brand->id, 
                        'label' => 'brandLabel_'.$brand->id,
                        'route' => route('brands.destroy', $brand->id) 
                    ])
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
