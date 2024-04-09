<?php
session_start();

if (!$_SESSION['user']) {
  header("Location: index.php");
}

include_once '../src/db/conn.php';
include_once '../src/models/contenidos.php';
include_once '../src/models/categorias.php';

$conexion = Conexion::conectar();

$contenidosModel = new Contenidos($conexion);
$categoriasModel = new Categorias($conexion);

$contenidos = $contenidosModel->getContenidos(true);
$categorias = $categoriasModel->getCategorias();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productora Uno - Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<style>
  input,
  textarea {
    color: black !important;
  }
</style>
<?php include_once 'modules/navbar.html'; ?>

<body class="bg-light vh-100">

  <div class="container vh-100 mt-5">
    <div class="d-flex mt-5 justify-content-between mb-3">
      <h5>Videos</h5>
      <button class="btn btn-success fw-bold" id="agregarContenido"><i class="fa fa-plus"></i> Nuevo</button>
    </div>

    <table class="table table-primary">
      <thead class="table-dark">
        <tr>
          <th class="text-center">#</th>
          <th class="text-center">Titulo</th>
          <th class="text-center">Descripcion</th>
          <th class="text-center">Categoria</th>
          <th class="text-center">Video</th>
          <th class="text-center d-none"></th>
          <th class="text-center d-none"></th>
          <th class="text-center">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($contenidos as $contenido) :
          $link = explode('src=', $contenido['link']);
          $link = explode("title=", $link[1]);
          echo '<tr>
                  <td class="text-center">' . $contenido['id'] . '</th>
                  <td class="text-center">' . $contenido['titulo'] . '</th>
                  <td class="text-center">' . $contenido['descripcion'] . '</td>
                  <td class="text-center">' . $contenido['categoria'] . '</td>
                  <td class="text-center"><a href=' . $link[0] . ' target="_blank">Ver</a></td>
                  <td class="text-center d-none">' . $contenido['link'] . '</td>
                  <td class="text-center d-none">' . $contenido['tipo'] . '</td>';
          if ($contenido['deleted_at'] == null) {
            echo '
                  <td class="text-center">
                    <button class="btn btn-warning" title="Editar" type="button" id="editarContenido">
                      <i class="fa fa-pencil"></i>
                    </button>
                    <button class="btn btn-danger" title="Eliminar" type="button" onclick="borrarContenido(' . $contenido['id'] . ')">
                      <i class="fa fa-trash"></i>
                    </button>
                  </td>';
          } else {
            echo '<td class="text-center">
                    <button class="btn btn-success" title="Reactivar" type="button" onclick="restaurarContenido(' . $contenido['id'] . ')">
                      <i class="fa fa-undo"></i>
                    </button>
                  </td>';
          };
          echo '</tr>';
        endforeach;
        ?>
      </tbody>
    </table>
  </div>
  <?php include_once 'modales/abm-contenidos.php'; ?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../assets/js/jquery.min.js"></script>

<script>
  function borrarContenido(idContenido) {
    $.post("controllers/contenido.php", {
      eliminar: idContenido
    }, function(result) {
      if (!result) {
        window.alert('Ocurrio un error.');
        return;
      }
      if (result) {
        window.alert('Contenido eliminado correctamente!');
        window.location.reload();
      }
    });
  }

  function restaurarVideo(idContenido) {
    $.post("controllers/contenido.php", {
      restaurar: idContenido
    }, function(result) {
      if (!result) {
        window.alert('Ocurrio un error.');
        return;
      }
      if (result) {
        window.alert('Contenido restaurado correctamente!');
        window.location.reload();
      }
    });
  }

  $(document).ready(function() {

    $(document).on("click", "#agregarContenido", function() {
      $("#contenidoModal").modal("show");
      $("#imgLabel").html("Imagen")
      $("#formContenidos").trigger("reset");
      $("#tipo").trigger("change");
    })

    $("#tipo").change(function() {
      if ($(this).val() == 1) {
        $("#youtubeLink").removeClass("d-none");
        $("#imgForm").addClass("d-none");
      } else {
        $("#youtubeLink").addClass("d-none");
        $("#imgForm").removeClass("d-none");
      }
    });

    $(document).on("click", "#editarContenido", function() {
      $("#contenidoModal").modal("show");
      let row = $(this).closest("tr");
      let contenidoId = row.find("td:nth-child(1)").text();
      let title = row.find("td:nth-child(2)").text();
      let desc = row.find("td:nth-child(3)").text();
      let categorias = row.find("td:nth-child(4)").text();
      let link = row.find("td:nth-child(6)");
      let tipo = row.find("td:nth-child(7)").text();
      categorias = categorias.split(',');
      $("#contenidoId").val(contenidoId);
      $("#title").val(title);
      $("#desc").val(desc);
      $("#tipo").val(tipo);
      if (tipo == 2) {
        $("#imgLabel").html("Imagen (se reemplazará la actual)")
      }
      $("#tipo").trigger("change");
      categorias.forEach(element => {
        $(`#${element.trim().replace(' ', '_')}`).attr("checked", true)
      });
    })

    $(document).on("click", "#guardarContenido", function() {
      var fd = new FormData();
      let files = $('#img')[0].files[0];
      let contenidoId = $("#contenidoId").val() ?? null;
      let title = $("#title").val();
      let desc = $("#desc").val();
      let link = $("#link").val();
      let tipo = $("#tipo").val();
      let categorias = $('.form-check-input:checkbox:checked').map(function() {
        return this.value;
      }).get();

      if (!title || !desc || !categorias) {
        alert("Complete todos los campos...");
        return;
      }
      categorias = JSON.stringify(categorias);
      fd.append('file', files ?? null);
      fd.append('contenidoId', contenidoId);
      fd.append('title', title);
      fd.append('desc', desc);
      fd.append('link', link ?? null);
      fd.append('categorias', categorias);
      fd.append('tipo', tipo);
      $.ajax({
        url: 'controllers/contenido.php',
        type: 'post',
        data: fd,
        contentType: false,
        processData: false,
        success: function(result) {
          if (!result) {
            window.alert('Ocurrio un error.');
            return;
          }
          if (result) {
            window.alert('Contenido guardado correctamente!');
            window.location.reload();
          }
        },
      });
    })

    $(document).on("click", "#editarCategoria", function() {
      $("#categoriasModal").modal("show");
      let row = $(this).closest("tr");
      let categoryId = row.find("td:nth-child(1)").text();
      let title = row.find("td:nth-child(2)").text();
      let desc = row.find("td:nth-child(3)").text();
      $("#categoryId").val(categoryId);
      $("#title").val(title);
      $("#desc").val(desc);
    })
  })
</script>
</body>

</html>