<!-- Modal -->
<div class="modal fade" id="crearPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('admin.posts.store', '#create') }}" method="post">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Título del Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" id="post-title" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                               placeholder="Escribe el título del post" value="{{ old('title') }}"
                                required autofocus
                        >
                        {!! $errors->first('title','<span class="form-text text-danger">:message</span>') !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Crear Post</button>
                </div>
            </div>
        </div>
    </form>
</div>

@push('scripts')
    <script>
        if (window.location.hash === '#create') {
            $('#crearPost').modal('show');
        }
        $('#crearPost').on('hide.bs.modal', function () {
            window.location.hash = '#';
        });
        $('#crearPost').on('shown.bs.modal', function () {
            $('#post-title').focus();
            window.location.hash = '#create';
        });
    </script>
@endpush
