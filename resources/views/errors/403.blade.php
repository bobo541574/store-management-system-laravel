@extends('backend.templates.master')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="alert alert-warning text-center shadow-lg" role="alert">
            <h4 class="alert-heading font-weight-bold">403 <small><i class="fa fa-exclamation" aria-hidden="true"></i></small></h4>
            <hr>
            <h5>
                Hey!, this is <strong>Admin</strong> section. You have no permission for this section. 
            </h5>
        </div>
    </div>
</div>
@endsection
