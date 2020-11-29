@extends('backend.templates.master')

@section('content')
<div class="col-md-12">
    <div class="card text-left shadow">
        <div class="card-header h5 text-primary font-weight-bold">
            Township List
        </div>
        <div class="card-body">
            @include('backend.shared._messages')
            @include('backend.townships._excerpt', ['townships' => $townships])
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#townships').DataTable();
    });

</script>
@endpush
