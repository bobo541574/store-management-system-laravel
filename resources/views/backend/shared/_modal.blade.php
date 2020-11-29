<div class="modal fade" id="{{ $modal }}" tabindex="-1" aria-labelledby="{{ $label }}"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-info" id="{{ $label }}"><i class="fa fa-exclamation-circle"></i>
                    Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">Are you sure? You want to delete...!</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                <form action="{{ $route }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="quantity" value="{{ $quantity ?? '' }}">
                    <button type="submit" class="btn btn-sm btn-danger" title="delete"
                        data-toggle="tooltip"><i class="fa fa-check-circle"></i> Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>
