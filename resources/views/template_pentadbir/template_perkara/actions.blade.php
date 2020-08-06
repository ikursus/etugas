<a href="{{ route('pentadbir.perkara.edit', $item->id) }}" class="btn btn-info btn-sm">
    EDIT
</a>

<!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{ $item->id }}">
    DELETE
</button>

<!-- Modal -->
<div class="modal fade" id="modal-delete-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <form method="POST" action="{{ route('pentadbir.perkara.destroy', $item->id) }}">
            @csrf
            @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        Adakah anda pasti ingin menghapuskan rekod {{ $item->butiran }}?
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">DELETE</button>
                    </div>
                </div>
        </form>
    </div>
</div>