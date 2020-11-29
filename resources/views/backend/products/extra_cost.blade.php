@extends('backend.templates.master')

@section('content')
<div class="col-md-12">
    <div class="card text-left shadow">
        <div class="card-header h5 text-primary font-weight-bold">
            Product List of Supplier
        </div>
        <div class="card-body">
            @include('backend.shared._messages')
            @include('backend.products._extra', ['productAttrs' => $productArrivedBySupplier])
            
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#products').DataTable({
            // "order": [ 0, 'desc' ],
        });

        
    });

    function editExtra(id) {
        let extra = document.querySelector(`.extra_${id}`);
        extra.removeAttribute("disabled");
    }

</script>
@endpush
