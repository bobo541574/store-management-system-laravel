<a href="{{ $routeDetail }}" class="btn btn-sm btn-info mt-1"
    title="{{ $title }} show" data-toggle="tooltip"><i class="fas fa-eye"></i></a>
<a href="{{ $routeEdit }}" class="btn btn-sm btn-warning mt-1 mx-1"
    title="{{ $title }} edit" data-toggle="tooltip"><i class="fas fa-pencil-alt"></i></a>
<a href="javascript:void(0)" class="btn btn-sm btn-danger mt-1" title="{{ $title }} delete"
    data-toggle="modal" data-target="{{ $modal }}"><i class="fa fa-trash"></i>
    </a>