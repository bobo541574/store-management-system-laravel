<div class="row justify-content-center">
    <form action="{{ $routeRestore }}" method="post">
        @csrf
        <button class="btn btn-sm btn-info mt-1 mx-1"
            title="{{ $title }} restore" data-toggle="tooltip"><i class="fas fa-sync-alt"></i></button>
    </form>
    <a href="javascript:void(0)" class="btn btn-sm btn-danger mt-1" title="{{ $title }} delete"
        data-toggle="modal" data-target="{{ $modal }}"><i class="fa fa-trash"></i>
        </a>
</div>