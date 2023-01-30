<div class="modal" tabindex="-1" id="deleteModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header position-relative border-0">
                <h5 class="modal-title mx-auto"><i class="text-warning fs-1 fa-solid fa-circle-exclamation"></i></h5>
                <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h3>Sei sicuro?</h3>
                <span class="text-secondary">Una volta cancellati, non sarà possibile recuperare i dati persi</span>
            </div>
            <div class="modal-footer border-0 d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, torna indietro</button>
                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                    @csrf
                    @method('DELETE')
                <button type="submit" class="btn btn-danger border-none fw-bold">Sì, cancella</i></button>
                </form>
            </div>
        </div>
    </div>
</div>