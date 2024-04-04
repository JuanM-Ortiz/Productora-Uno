<?php
session_start();

if (!$_SESSION['user']) {
  header("Location: index.php");
}

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
<?php include_once 'modules/navbar.html'; ?>
<style>
  input,
  textarea {
    color: black !important;
  }
</style>

<body class="bg-light">

  <div class="container vh-100 mt-5">
    <div class="d-flex mt-5 justify-content-between mb-3">
      <h5>Banner Principal</h5>
      <button class="btn btn-warning fw-bold" id="editarBanner"><i class="fa fa-pencil"></i> Modificar</button>
    </div>

    <div class="row">
      <div class="col-12 text-center">
        <img class="img-fluid" src="../assets/img/main-bg-dark.jpg" alt="Main banner">
      </div>
    </div>


  </div>

  <?php include 'modales/banner.html'; ?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../assets/js/jquery.min.js"></script>

<script>
  $(document).ready(function() {

    $(document).on("click", "#editarBanner", function() {
      $("#bannerModal").modal("show");
    })

    $(document).on("click", "#guardarBanner", function() {
      var fd = new FormData();
      var files = $('#img')[0].files[0];

      if (!files) {
        alert("Debe cargar una imagen...");
        return;
      }

      fd.append('file', files);

      $.ajax({
        url: 'controllers/banner.php',
        type: 'post',
        data: fd,
        contentType: false,
        processData: false,
        success: function(response) {
          if (!response) {
            window.alert('Ocurrio un error.');
            return;
          }
          if (response) {
            window.alert('Banner actualizado correctamente!');
            window.location.reload();
          }
        },
      });
    })
  })
</script>