<?php
include_once 'src/db/conn.php';
include_once 'src/models/categorias.php';

$conexion = Conexion::conectar();
$categoryModel = new Categorias($conexion);
$categorias = $categoryModel->getCategorias();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productora Uno</title>
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>

  <!-- IMG NAV MAIN -->

  <main>
    <div class="vh-100 w-100 main-hero d-flex justify-content-center align-items-center">
      <img class="logo" src="assets/img/logo.png" alt="logo productora uno">
    </div>
  </main>

  <!-- ABOUT US, FORM -->

  <section>
    <div class="bg-primary w-100">
      <div class="row py-5 gx-0">
        <div class="col-md-8 offset-md-2 col-12">
          <h2 class="text-white text-center fw-bold fs-1">SOBRE NOSOTROS</h2>
          <p class="text-white py-3 px-2" style="font-size: 1.5rem;">
            Donde la calidad y la creatividad se encuentran. Somos expertos en llevar la producción audiovisual a otro
            nivel. Nos especializamos en LiveStream de eventos, producción de falso vivo, creación de videos,
            fotografía, edición y circuito cerrado. Nuestra misión es clara: priorizamos la calidad de nuestros
            productos para asegurar que cada proyecto no solo cumpla, sino que exceda las expectativas de nuestros
            clientes. Ya sea capturando momentos únicos o creando experiencias visuales inolvidables, Productora Uno es
            tu aliado para innovar en el mundo audiovisual.
          </p>
        </div>
        <div class="col-md-8 offset-md-2 col-12 px-1">
          <form action="src/enviar.php" method="post">
            <div class="row">
              <div class="col-6 py-2">
                <input class="form-control form-control-lg bg-secondary" name="nombre" type="text" placeholder="Nombre" aria-label="Nombre" required>
              </div>
              <div class="col-6 py-2">
                <input class="form-control form-control-lg bg-secondary" name="celular" type="text" placeholder="Celular" aria-label="Celular" required>
              </div>
              <div class="col-6 py-2">
                <input class="form-control form-control-lg bg-secondary" name="email" type="email" placeholder="Email" aria-label="Email" required>
              </div>
              <div class="col-6 py-2">
                <input class="form-control form-control-lg bg-secondary" name="link" type="text" placeholder="Link de referencia" aria-label="Link de referencia" required>
              </div>
              <div class="col-12 py-2">
                <textarea class="form-control form-control-lg bg-secondary" name="mensaje" placeholder="Escribe tu consulta..." rows=5></textarea>
              </div>
              <div class="col-md-4 offset-md-4 col-12 text-center py-3">
                <button type="submit" class="btn btn-primary btn-lg text-white px-5 border-0">ENVIAR</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- CAROUSEL -->


  <div class="owl-container">
    <div class="owl-carousel owl-theme">
      <?php
      foreach ($categorias as $categoria) :
        echo '<div class="item" data-content="' . $categoria['titulo'] . '">
                  <a href="categorias.php?id=' . $categoria['id'] . '">
                    <img src="assets/img/' . $categoria['img'] . '" alt="' . $categoria['img'] . '">
                  </a>
                </div>';
      endforeach;
      ?>
    </div>
  </div>

  <!-- FOOTER -->

  <div class="container bg-dark footer">
    <footer class="row py-5 ">
      <div class="col-md-4 text-md-start col-12 text-center ">
        <h3 class="fw-bold">Contacto</h3>
        <p><i class="fas fa-phone pt-3"></i> +54 2656 478424</p>
        <p><i class="fas fa-envelope"></i> info@productora-uno.com.ar</p>
        <p><i class="fab fa-whatsapp"></i> +54 9 2664 344614</p>
      </div>
      <div class="col-md-4 text-center pt-3 pt-md-0 d-flex  justify-content-center align-items-center">
        <a href="https://www.instagram.com/productorauno/" target="_blank" class="mx-3"><i class="fab fa-instagram fa-4x footer-icon "></i></a>
        <!-- <a href="#" target="_blank" class="mx-3"><i class="fab fa-facebook fa-4x footer-icon"></i></a> -->
        <a href="https://wa.me/5492664344614" target="_blank" class="mx-3"><i class="fab fa-whatsapp fa-4x footer-icon"></i></a>
      </div>
      <div class="col-md-4 d-flex justify-content-center align-items-center">
        <p class="mb-0"><i class="fas fa-map-marker-alt"></i> Merlo, San Luis, Argentina.</p>
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


</html>