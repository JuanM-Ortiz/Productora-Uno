<!-- Modal -->
<div class="modal fade" id="contenidoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Contenidos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formContenidos" action="">
          <input id="contenidoId" value="" hidden>
          <div class="mb-3">
            <label for="title" class="form-label">Titulo</label>
            <input type="text" class="form-control" id="title" placeholder="">
          </div>
          <div class="mb-3">
            <label for="desc" class="form-label">Descripcion</label>
            <input type="text" class="form-control" id="desc" placeholder="">
          </div>
          <div class="mb-3">
            <label for="desc" class="form-label">Tipo de contenido</label>
            <select class="form-select" aria-label="Tipo contenido" name="tipo" id="tipo">
              <option value="1">Video</option>
              <option value="2">Imagen</option>
            </select>
          </div>
          <div class="mb-3" id="youtubeLink">
            <label for="link" class="form-label">Link de youtube</label>
            <input type="text" class="form-control" id="link">
          </div>
          <div class="mb-3" id="imgForm">
            <label for="img" class="form-label" id="imgLabel">Imagen</label>
            <input type="file" class="form-control" id="img">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Categoria asociada</label>
            <?php
            foreach ($categorias as $categoria) : ?>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="<?php echo $categoria['id']; ?>" id="<?php echo str_replace(' ', '_', $categoria['titulo']); ?>">
                <label class="form-check-label" for="<?php echo $categoria['id']; ?>">
                  <?php echo $categoria['titulo'] ?>
                </label>
              </div>
            <?php
            endforeach;
            ?>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" id="guardarContenido" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>