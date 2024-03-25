<!-- Modal -->
<div class="modal fade" id="videosModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Videos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formVideos" action="">
          <input id="videoId" value="" hidden>
          <div class="mb-3">
            <label for="title" class="form-label">Titulo</label>
            <input type="text" class="form-control" id="title" placeholder="">
          </div>
          <div class="mb-3">
            <label for="desc" class="form-label">Descripcion</label>
            <input type="text" class="form-control" id="desc" placeholder="">
          </div>
          <div class="mb-3">
            <label for="link" class="form-label">Link de youtube</label>
            <input type="text" class="form-control" id="link">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Categoria asociada</label>
            <?php
            foreach ($categorias as $categoria) : ?>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="<?php echo $categoria['id']; ?>" id="<?php echo $categoria['id']; ?>">
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
        <button type="button" id="guardarVideo" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>