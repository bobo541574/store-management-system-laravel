<div class="table-responsive">
    <table class="table table-striped table-inverse table-hover text-center" id="brands">
        <thead class="thead-inverse table-header">
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Logo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="text-primary small font-weight-bold">
            @foreach ($brands as $key => $brand)
            <tr>
                <td class="align-middle">{{ ++$key }}</td>
                <td class="align-middle">{{ $brand->name }}</td>
                <td class="align-middle"><img src="{{ $brand->photo }}" width="45px" alt="logo"></td>
                <td class="align-middle">
                    {{-- table action --}}
                    @if (!$brands->pluck('deleted_at')[0])
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
                            'route' => route('brands.softDelete', $brand->id) 
                        ])
                    @else
                        @include('backend.shared._trash', [
                            'title' => 'brand',
                            'routeRestore'   => route('brands.restore', $brand->id),
                            'modal'   => '#brand_'.$brand->id,
                        ])

                            <!-- Modal -->
                            @include('backend.shared._modal', [
                                'modal' => 'brand_'.$brand->id, 
                                'label' => 'brandLabel_'.$brand->id,
                                'route' => route('brands.destroy', $brand->id) 
                            ])
                        </td>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
