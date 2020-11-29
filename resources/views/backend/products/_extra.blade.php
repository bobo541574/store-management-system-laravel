<div class="table-responsive">
    <table class="table table-striped table-inverse table-hover text-center" id="products">
        <thead class="thead-inverse table-header">
            <tr>
                <th style="width: 20%">Arrived Date</th>
                <th>Supplier</th>
                <th>Name</th>
                <th style="width: 20%">Cost</th>
                <th style="width: 10%">Quantity</th>
                <th>Extra Cost</th>
            </tr>
        </thead>
        {{-- <tbody class="text-primary small font-weight-bold">
            @foreach ($productsArrived as $products)
                @foreach ($products as $key => $product)
                <tr>
                    <td class="align-middle font-weight-bolder">
                        <span>
                            {{ $product->first()->arrived_date }}
                        </span>
                    </td>
                    <td class="align-middle">
                        <span>
                            {{ $product->first()->supplier->name }}
                        </span>
                    </td>
                    <td class="align-middle">
                        @foreach ($product as $arrived)
                        <span>{{ $arrived->name }}</span>
                        <br />
                        @endforeach
                    </td>
                    <td class="align-middle h6">
                        @foreach ($product as $arrived)
                            @foreach ($arrived->productAttrs as $attribute)
                            <span class="badge badge-info" style="cursor: pointer" title="{{$arrived->name}} , {{$attribute->colorAttr->name}}">{{ formatted_money($attribute->totalCost) }} </span>
                            @endforeach
                        @endforeach
                    </td>
                    <td class="align-middle h6">
                        @foreach ($product as $arrived)
                            @foreach ($arrived->productAttrs as $attribute)
                            <span class="badge badge-success" style="cursor: pointer" title="{{$arrived->name}} , {{$attribute->colorAttr->name}}">{{ $attribute->quantity }} </span>
                            @endforeach
                        @endforeach
                    </td>
                    <td class="align-middle">
                        <form action="{{ route('attributes.add.extra', $product->first()->supplier_id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row justify-content-center">
                                <input type="number" name="extra" value="{{ extra_cost($product) }}"
                                    class="col-md-4 form-control form-control-sm mr-2 my-1 extra_{{ $product->first()->id }}" 
                                        {{ (extra_cost($product) ?? "") ? "disabled" : '' }}>

                                <input type="hidden" name="arrived" value="{{$product->first()->arrived}}">
                                <button class="btn btn-sm btn-primary my-1 mr-1" title="Add Delivery Cost" data-toggle="tooltip">
                                    <i class="fas fa-dollar-sign"></i></button>
                                <a href="javasceipt:void()" onclick="editExtra({{ $product->first()->id }})" class="btn btn-sm btn-warning my-1" title="Edit Delivery Cost" data-toggle="tooltip">
                                    <i class="fas fa-pencil-alt"></i> </a>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            @endforeach
        </tbody> --}}
        <tbody class="text-primary small font-weight-bold">
            @foreach ($productAttrs as $attributes)
                {{-- @foreach ($attributes as $key => $product) --}}
                <tr>
                    <td class="align-middle font-weight-bolder">
                        <span>
                            {{ $attributes->first()->arrived }}
                        </span>
                    </td>
                    <td class="align-middle">
                        <span>
                            {{ $attributes->first()->product->supplier->name }}
                        </span>
                    </td>
                    <td class="align-middle">
                        {{ $attributes->first()->product->name }}
                    </td>
                    <td class="align-middle h6">
                        @foreach ($attributes as $attribute)
                            <span class="badge badge-info" style="cursor: pointer" title="{{$attribute->product->name}} , {{$attribute->colorAttr->name}}"> {{ formatted_money($attribute->total_cost) }} </span>
                        @endforeach
                    </td>
                    <td class="align-middle h6">
                        @foreach ($attributes as $attribute)
                            <span class="badge badge-info" style="cursor: pointer" title="{{$attribute->product->name}} , {{$attribute->colorAttr->name}}"> {{ $attribute->quantity }} </span>
                        @endforeach
                    </td>
                    <td class="align-middle">
                        <form action="{{ route('attributes.add.extra', $attributes->first()->product->supplier_id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row justify-content-center">
                                {{-- {{ dd(array_column($attributes->toArray(), 'id')) }} --}}
                                <input type="number" name="extra" value="{{ extra_cost($attributes) }}"
                                    class="col-md-4 form-control form-control-sm mr-2 my-1 extra_{{ $attributes->first()->arrived }}" 
                                        {{ (extra_cost($attributes->first()->id) ?? "") ? "disabled" : '' }}>
                                        
                                {{-- <input type="hidden" name="arrived" value="{{$product->first()->arrived}}">
                                <button class="btn btn-sm btn-primary my-1 mr-1" title="Add Delivery Cost" data-toggle="tooltip">
                                    <i class="fas fa-dollar-sign"></i></button>
                                <a href="javasceipt:void()" onclick="editExtra({{ $product->first()->id }})" class="btn btn-sm btn-warning my-1" title="Edit Delivery Cost" data-toggle="tooltip">
                                    <i class="fas fa-pencil-alt"></i> </a> --}}
                            </div>
                        </form>
                    </td>
                </tr>
                {{-- @endforeach --}}
            @endforeach
        </tbody>
    </table>
</div>
