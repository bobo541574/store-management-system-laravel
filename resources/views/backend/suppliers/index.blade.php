@extends('backend.templates.master')

@section('content')
<div class="col-md-12">
    <div class="card text-left shadow">
        <div class="card-header h3 text-primary font-weight-bold">
            Supplier List
        </div>
        <div class="card-body">
            @include('backend.shared._messages')
            @include('backend.suppliers._excerpt')
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#suppliers').DataTable();
    });

</script>
@endpush
