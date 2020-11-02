<div class="table-responsive">
    <table class="table table-striped table-inverse table-hover text-center" id="products">
        <thead class="thead-inverse table-header">
            <tr>
                <th style="">Supplier</th>
                <th style="">Name</th>
                <th style="">Photo</th>
                <th style="">Color</th>
                <th style="">Size</th>
                <th style="">Quantity</th>
                <th style="">Price</th>
                <th style="width: 15%">Arrived Date</th>
                <th style="width: 10%">Action</th>
            </tr>
        </thead>
        <tbody text-primary small font-weight-bold>
            @foreach ($products as $key => $attribute)
            <tr>
                <td class="align-middle text-primary">
                    <span class="badge badge-danger">
                        {{ $attribute->product->supplier->name ?? "" }}
                    </span>
                </td>
                <td class="align-middle text-dark">
                    <span class="badge badge-dark">
                        {{ $attribute->product->name ?? "" }}    
                    </span>
                    </td>
                <td class="align-middle"><img src="{{ $attribute->image ?? "" }}" width="45px" alt="logo"></td>
                <td class="align-middle">
                    <span class="badge badge-info" data-toggle="title" title="{{$attribute->colorAttr->name}} Color." style="cursor: pointer"> 
                        {{ $attribute->colorAttr->name }}  
                    </span>
                </td>
                <td class="align-middle">
                    <span class="badge badge-info" data-toggle="title" title="{{$attribute->sizeAttr->letter_number}} Color." style="cursor: pointer"> 
                        {{ $attribute->sizeAttr->letter_number }}  
                    </span>
                </td>
                <td class="align-middle">
                    <span class="badge badge-primary">
                    {{ $attribute->quantity ?? "" }}
                    </span>
                </td>
                <td class="align-middle">
                    <span class="badge badge-primary">
                    {{ $attribute->price ?? "" }}
                    </span>
                </td>
                <td class="align-middle">
                    <span class="badge badge-warning" style="cursor: pointer"> 
                        {{ $attribute->product->arrived_date ?? '' }}
                    </span>
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
</div>
