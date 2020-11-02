<div class="table-responsive">
    <table class="table table-striped table-inverse table-hover text-center" id="products">
        <thead class="thead-inverse table-header">
            <tr>
                <th>Supplier</th>
                <th style="width: 20%">Arrived Date</th>
                <th>Name</th>
                <th style="width: 20%">Cost</th>
                <th style="width: 10%">Quantity</th>
                <th>Extra Cost</th>
            </tr>
        </thead>
        <tbody class="text-primary font-weight-bold">
            @foreach ($productsArrived as $products)
                @foreach ($products as $key => $product)
                <tr>
                    <td class="align-middle">
                        <span class="badge badge-danger">
                            {{ $product->first()->supplier->name }}
                        </span>
                    </td>
                    <td class="align-middle font-weight-bolder">
                        <span class="badge badge-warning">
                            {{ $product->first()->arrived_date }}
                        </span>
                    </td>
                    <td class="align-middle">
                        @foreach ($product as $arrived)
                        <span class="badge badge-dark">{{ $arrived->name }}</span>
                        <br />
                        @endforeach
                    </td>
                    <td class="align-middle">
                        @foreach ($product as $arrived)
                            @foreach ($arrived->productAttrs as $attribute)
                            <span class="badge badge-info" style="cursor: pointer" title="{{$arrived->name}} , {{$attribute->colorAttr->name}}">{{ $attribute->totalCost }} </span>
                            @endforeach
                        @endforeach
                    </td>
                    <td class="align-middle">
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
                                <input type="number" name="extra" id="extra_{{ $key }}"
                                    class="col-md-4 form-control form-control-sm mr-2 my-1" {{ ($product->first()->productAttrs->first()->extra ?? "") ? "disabled" : '' }}>
                                <input type="hidden" name="arrived" id="arrived" value="{{$product->first()->arrived}}">
                                <button class="btn btn-sm btn-primary my-1 mr-1" title="Add Delivery Cost" data-toggle="tooltip">
                                    <i class="fas fa-dollar-sign"></i></button>
                                    <button class="btn btn-sm btn-warning my-1" title="Edit Delivery Cost" data-toggle="tooltip">
                                        <i class="fas fa-pen-nib"></i></button>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
