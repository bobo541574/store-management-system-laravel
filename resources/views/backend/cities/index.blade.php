@extends('backend.templates.master')

@section('content')
<div class="col-md-12">
    <div class="card text-left shadow">
        <div class="card-header h5 text-primary font-weight-bold">
            City List
        </div>
        <div class="card-body">
            @include('backend.shared._messages')
            @include('backend.cities._excerpt', ['cities' => $cities])
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#cities').DataTable();
    });

</script>
@endpush
