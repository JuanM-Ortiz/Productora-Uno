<?php
include_once 'src/db/conn.php';
include_once 'src/models/categorias.php';
include_once 'src/models/videos.php';

$conexion = Conexion::conectar();
$categoryModel = new Categorias($conexion);
$categoria = $categoryModel->getCategoriaById($_GET['id']);

$videosModel = new Videos($conexion);
$videos = $videosModel->getVideosByCategoria($_GET['id']);

$date = date('h-i-s');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productora Uno - <?php echo $categoria[0]['titulo'] ?></title>
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/styles.css?ver=<?php echo $date; ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

</head>


<body>
  <section>
    <main class="position-relative">
      <div class="vh-100 w-100 main-hero category-main-container" style="background-image: url('assets/img/<?php echo $categoria[0]['img'] ?>');">
      </div>
      <h2 class="position-absolute text-white category-title"><?php echo $categoria[0]['titulo'] ?></h2>
    </main>
    <div class="py-3 bg-dark">
      <div class="row py-5 gx-0">
        <?php
        foreach ($videos as $video) :
          echo '
              <div class="col-12 col-md-4 py-2 py-md-0 px-4 text-center">
                <h4 class="text-white pb-3">' . $video['titulo'] . '</h4>
                <div class="ratio ratio-16x9 video-container">
                  ' . $video['link'] . '
                </div>
                <p class="pt-5">' . $video['descripcion'] . '</p>
              </div>
            ';
        endforeach;
        ?>
      </div>
    </div>
  </section>

  <hr>

  <!-- FOOTER -->

  <div class="container bg-dark footer">
    <footer class="row py-5 ">
      <div class="col-md-4 text-md-start col-12 text-center ">
        <h3 class="fw-bold">Contacto</h3>
        <p><i class="fas fa-phone pt-3"></i> +2656 478424</p>
        <p><i class="fas fa-envelope"></i> email@email.com</p>
        <p><i class="fab fa-whatsapp"></i> +2664 212121</p>
      </div>
      <div class="col-md-4 text-center pt-3 pt-md-0">
        <a href="https://www.instagram.com/productorauno/" target="_blank" class="mx-3"><i class="fab fa-instagram fa-4x footer-icon "></i></a>
        <a href="https://www.facebook.com/aleciorivera.ph" target="_blank" class="mx-3"><i class="fab fa-facebook fa-4x footer-icon"></i></a>
        <a href="https://wa.me/5492664344614" target="_blank" class="mx-3"><i class="fab fa-whatsapp fa-4x footer-icon"></i></a>
        <a href="https://www.youtube.com/@productoraunomerlo6460" target="_blank" class="mx-3"><i class="fa-brands fa-youtube fa-4x footer-icon"></i></a>
      </div>

      <div class="col-md-4 text-md-end text-center mt-md-2 mt-5">
        <p><i class="fas fa-map-marker-alt"></i> Merlo, San Luis, Argentina.</p>
      </div>

      <div class="text-center">
        <a href="index.php"><i class="fa-solid fa-house fa-3x"></i></a>
        <br>
        <a href="index.php" class="">Volver al Home</a>
      </div>
    </footer>
    <hr>
    <div class="footer-line">
      <p>© 2024 Productora Uno. Todos los derechos reservados.</p>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>