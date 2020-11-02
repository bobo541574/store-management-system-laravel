@extends('backend.templates.master')

@section('content')
<div class="col-md-12">
    <div class="card text-left shadow">
        <div class="card-header h3 text-primary font-weight-bold">
            Product List
        </div>
        <div class="card-body">
            @include('backend.shared._messages')
            @include('backend.products._excerpt')
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#products').DataTable({
            order: ['7', 'desc']
        });
    });
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

</script>
@endpush
