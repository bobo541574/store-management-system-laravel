@extends('backend.templates.master')

@section('content')
<div class="col-md-12">
    <div class="card text-left shadow">
        <div class="card-header h3 text-primary font-weight-bold">
            Color List
        </div>
        <div class="card-body">
            @include('backend.shared._messages')
            @include('backend.colors._excerpt', ['colors' => $colors])
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#colors').DataTable();
    });

</script>
@endpush
