   
<table class="table table-responsive table-striped table-hover text-center" id="products">
    <thead class="thead-inverse table-header">
        <tr>
            <th>#</th>
            <th style="width: 30%">Arrived</th>
            <th style="width: 15%">Supplier</th>
            <th style="width: 15%">Name</th>
            <th style="width: 15%">Photo</th>
            <th style="width: 15%">Color</th>
            <th style="width: 15%">Size</th>
            <th style="width: 10%">Quantity</th>
            <th style="width: 15%">Extra</th>
            <th style="width: 15%">Price</th>
            <th style="width: 15%">Status</th>
            <th style="width: 15%">Action</th>
        </tr>
    </thead>
    <tbody class="text-primary small font-weight-bold">
        @foreach ($products as $key => $attribute)
        <tr>
            <td class="align-middle">
                <span class="" style="cursor: pointer"> 
                    <div class="form-check">
                        <input type="checkbox" class="form-check" name="check[{{ $key }}]" 
                            id="check_{{ $key }}" value="{{ $attribute->id }}" onclick="checkBox({{ $key }})"
                            data-id="{{ $attribute->id }}">
                    </div>
                </span>
            </td>
            <td class="align-middle">
                <span class="" style="cursor: pointer"> 
                    {{ $attribute->arrived ?? '' }}
                </span>
            </td>
            <td class="align-middle text-primary">
                <span class="danger">
                    {{ $attribute->product->supplier->name ?? "" }}
                </span>
            </td>
            <td class="align-middle text-dark">
                <span class="dark">
                    {{ $attribute->product->name ?? "" }}    
                </span>
                </td>
            <td class="align-middle"><img src="{{ $attribute->image ?? "" }}" width="45px" alt="logo"></td>
            <td class="align-middle">
                <span class="info" data-toggle="title" title="{{$attribute->colorAttr->name}} Color." style="cursor: pointer"> 
                    {{ $attribute->colorAttr->name }}  
                </span>
            </td>
            <td class="align-middle">
                <span class="info" data-toggle="title" title="{{$attribute->sizeAttr->letter_number}} Color." style="cursor: pointer"> 
                    {{ $attribute->sizeAttr->letter_number }}  
                </span>
            </td>
            <td class="align-middle">
                <span class="primary">
                {{ $attribute->quantity ?? "" }}
                </span>
            </td>
            <td class="align-middle">
                <span>
                    @if ($attribute->extra)
                        <strong class="text-danger">Added</strong>
                    @else
                        <strong class="text-muted">Required</strong>
                    @endif
                {{-- {{ $attribute->extra ? "Added" : "Required" }} --}}
                </span>
            </td>
            <td class="align-middle">
                <span class="primary">
                {{ formatted_money($attribute->price ?? "") }}
                </span>
            </td>
            <td  class="align-middle">
                <select name="status" id="status_{{ $attribute->id }}" onclick="statusUpdate({{ $attribute->id }})" data-model="{{  get_class($attribute) }}" {{ $attribute->deleted_at ? "disabled" : "" }} class="custom-select custom-select-sm col-md-12">
                    <option value="On" {{ ($attribute->status == "On") ? "selected" : "" }}>On</option>
                    <option value="Off" {{ ($attribute->status == "Off") ? "selected" : "" }}>Off</option>
                </select>
            </td>
            <td class="align-middle">
                {{-- table action --}}
                <div class="row justify-content-center">
                    <form action="{{ route('orders.create') }}" method="get">
                        <input type="hidden" name="attribute_id" value="{{ $attribute->id }}">
                        <button class="btn btn-sm btn-secondary mt-1 mx-1"
                            title="order create" data-toggle="tooltip"><i class="fas fa-cart-plus"></i>
                        </button>
                    </form>
                    @include('backend.shared._tableaction', [
                        'title' => 'product',
                        'routeDetail'   => route('products.show', $attribute->id),
                        'routeEdit'   => route('products.edit', $attribute->product->id),
                        'modal'   => '#product_'.$attribute->id,
                    ])
                    <!-- Modal -->
                    @include('backend.shared._modal', [
                        'modal' => 'product_'.$attribute->id, 
                        'label' => 'productLabel_'.$attribute->id,
                        'route' => route('products.destroy', $attribute->id) 
                    ])
                </div>

            </td>
        </tr>
        @endforeach
        
    </tbody>
</table>

<form action="{{ route('attributes.add.extra') }}" id="extra_form" method="post">
    @csrf
    @method('PATCH')
    <div class="modal fade" id="extra_cost" tabindex="-1" aria-labelledby="extraCostLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-info" id="extraCostLabel"><i class="fa fa-exclamation-circle"></i>
                        Add Extra Cost</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <h6 class="font-weight-bold" id="extra_info">
                        </h6>
                    <label for="extra">Extra Cost</label>
                    <input type="number" name="extra" class="form-control">
                    <input type="hidden" name="check" id="extra">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="extra_form" class="btn btn-sm btn-danger" title="delete"
                        data-toggle="tooltip"><i class="fa fa-check-circle"></i> Confirm</button>
                </div>
            </div>
        </div>
    </div>
</form>
