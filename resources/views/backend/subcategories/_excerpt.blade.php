<table class="table table-responsive table-striped table-inverse table-hover text-center" id="subcategory">
    <thead class="thead-inverse table-header">
        <tr>
            <th style="width: 5%;">No.</th>
            <th style="width: 30%;">Name</th>
            <th style="width: 20%;">Category</th>
            <th style="width: 25%;">Status</th>
            <th style="width: 20%;">Action</th>
        </tr>
    </thead>
    <tbody class="text-primary small font-weight-bold">
        @foreach ($subcategories as $key => $subcategory)
        <tr>
            <td  class="align-middle">{{ ++$key }}</td>
            <td  class="align-middle">{{ $subcategory->name }}</td>
            <td  class="align-middle">{{ $subcategory->category->name }}</td>
            <td  class="align-middle">
                <select name="status" id="status_{{ $subcategory->id }}" onclick="statusUpdate({{ $subcategory->id }})" data-model="{{ get_class($subcategory) }}" {{ $subcategory->deleted_at ? "disabled" : "" }} class="custom-select custom-select-sm col-md-4">
                    <option value="On" {{ ($subcategory->status == "On") ? "selected" : "" }}>On</option>
                    <option value="Off" {{ ($subcategory->status == "Off") ? "selected" : "" }}>Off</option>
                </select>
            </td>
            @if (!$subcategories->pluck('deleted_at')[0])
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
            @else
                <td  class="align-middle">
                    {{-- table action --}}
                    @include('backend.shared._trash', [
                        'title' => 'subcategory',
                        'routeRestore'   => route('subcategories.restore', $subcategory->id),
                        'modal'   => '#subcategory_'.$subcategory->id,
                    ])

                    <!-- Modal -->
                    @include('backend.shared._modal', [
                        'modal' => 'subcategory_'.$subcategory->id, 
                        'label' => 'subcategoryLabel_'.$subcategory->id,
                        'route' => route('subcategories.destroy', $subcategory->id) 
                    ])
                </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
