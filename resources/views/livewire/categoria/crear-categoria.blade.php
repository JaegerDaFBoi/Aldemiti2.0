<div>
    <div class="row">
        <div class="col-md-6">
            <button type="button" class="btn btn-round btn-md btn-warning" wire:click='mostrarFormulario'>
                Añadir Categoría
            </button>
        </div>
    </div>
    @if ($mostrarFormulario)
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card">
                <form wire:submit.prevent='guardarCategoria' method="post">
                    <div class="row mt-2 mx-4">
                        <div class="form-group col-sm-12">
                            <label for="nombreCategoria">Nombre de Categoria</label>
                            <input type="text" class="form-control" name="nombreCategoria" wire:model='nombre'>
                        </div>
                    </div>
                    <div class="row mx-4 my-2">
                        <div class="col-sm-4 align-self-center">
                            <button type="submit" class="btn btn-block btn-warning">
                                Guardar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>