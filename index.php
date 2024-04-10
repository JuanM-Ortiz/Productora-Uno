<?php
include_once 'src/db/conn.php';
include_once 'src/models/categorias.php';

$conexion = Conexion::conectar();
$categoryModel = new Categorias($conexion);
$categorias = $categoryModel->getCategorias();

$date = date('h-i-s');
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
  <link rel="stylesheet" href="assets/css/styles.css?ver=<?php echo $date; ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">

  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/icon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/icon/favicon-16x16.png">
  <link rel="manifest" href="assets/img/icon/site.webmanifest">
  <link rel="mask-icon" href="assets/img/icon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

</head>

<body>

  <!-- IMG NAV MAIN -->

  <main>
    <div class="vh-100 w-100 main-hero d-flex justify-content-center align-items-center">
      <img class="logo" src="assets/img/logo.png" alt="logo productora uno">
    </div>
  </main>

  <!-- ABOUT US, FORM -->
  <section id="servicios">
    <h2 class="text-white text-center fw-bold fs-1 titulo mt-5">Nuestros Servicios</h2>
    <div class="servicios-carousel owl-carousel owl-theme bg-dark py-5">
      <div class="item p-3">
        <div class="card bg-grayblue" style="min-height: 250px;">
          <div class="card-body text-center text-white d-flex flex-column justify-content-center">
            <i class="fa fa-brands fa-youtube fa-2x text-terciary"></i>
            <h5 class="card-title text-terciary">LiveStream</h5>
            <p class="card-text text-white">Transmitimos eventos en tiempo real a través de plataformas digitales para llegar a audiencias globales.</p>
          </div>
        </div>
      </div>
      <div class="item p-3">
        <div class="card bg-grayblue" style="min-height: 250px;">
          <div class="card-body text-center text-white d-flex flex-column justify-content-center">
            <i class="fa fa-video fa-2x text-terciary"></i>
            <h5 class="card-title text-terciary">Producción de video</h5>
            <p class="card-text text-white">Desde la idea hasta la entrega final, creamos videos impactantes para diversos fines, como publicitarios, institucionales y promocionales.</p>
          </div>
        </div>
      </div>
      <div class="item p-3">
        <div class="card bg-grayblue" style="min-height: 250px;">
          <div class="card-body text-center text-white d-flex flex-column justify-content-center">
            <i class="fa fa-clapperboard fa-2x text-terciary"></i>
            <h5 class="card-title text-terciary">Postproducción</h5>
            <p class="card-text text-white">Editamos, corregimos colores y añadimos efectos visuales y sonido para transformar el material bruto en contenido finalizado de alta calidad.</p>
          </div>
        </div>
      </div>
      <div class="item p-3">
        <div class="card bg-grayblue" style="min-height: 250px;">
          <div class="card-body text-center text-main d-flex flex-column justify-content-center">
            <i class="fa fa-camera fa-2x text-terciary"></i>
            <h5 class="card-title text-terciary">Fotografía</h5>
            <p class="card-text text-white">Capturamos momentos especiales y visualmente impresionantes con nuestra habilidad para contar historias a través de imágenes.</p>
          </div>
        </div>
      </div>
      <div class="item p-3">
        <div class="card bg-grayblue" style="min-height: 250px;">
          <div class="card-body text-center text-main d-flex flex-column justify-content-center">
            <i class="fa fa-champagne-glasses fa-2x text-terciary"></i>
            <h5 class="card-title text-terciary">Cobertura de eventos</h5>
            <p class="card-text text-white">Documentamos eventos de manera profesional, capturando cada detalle significativo para crear recuerdos duraderos.</p>
          </div>
        </div>
      </div>
      <div class="item p-3">
        <div class="card bg-grayblue" style="min-height: 250px;">
          <div class="card-body text-center text-main d-flex flex-column justify-content-center">
            <i class="fa fa-mobile-screen-button fa-2x text-terciary"></i>
            <h5 class="card-title text-terciary">Contenido para redes sociales</h5>
            <p class="card-text text-white">Creamos contenido atractivo y optimizado para diversas plataformas sociales para aumentar el compromiso y la interacción con la audiencia.</p>
          </div>
        </div>
      </div>
      <div class="item p-3">
        <div class="card bg-grayblue" style="min-height: 250px;">
          <div class="card-body text-center text-main d-flex flex-column justify-content-center">
            <img src="assets/img/drone.png" style="width: 50px!important;margin-right: auto;margin-left: auto;">
            <h5 class="card-title text-terciary">Drone</h5>
            <p class="card-text text-white">Realizamos perspectivas áereas únicas, filmaciones dinámicas, exploración de locaciones, grabaciones en lugares inaccesibles, producción de videos promocionales, eventos en vivo y producciones cinematográficas.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="nosotros">
    <div class="bg-dark w-100">
      <div class="row py-5 gx-0">
        <div class="col-md-8 offset-md-2 col-12">
          <h2 class="text-white text-center fw-bold fs-1 titulo">Acerca de nosotros</h2>
          <p class="text-white py-3 px-2 text-center" style="font-size: 1.5rem;">
            En Productora Uno, nos dedicamos apasionadamente a brindar soluciones audiovisuales de alta calidad para satisfacer las necesidades de nuestros clientes en cada etapa de su proyecto. Con una amplia gama de servicios, nos enorgullece ofrecer un enfoque integral y creativo para cada desafío.<br><br>
            Estamos comprometidos a superar las expectativas de nuestros clientes en cada proyecto, combinando creatividad, profesionalismo y tecnología de vanguardia para ofrecer resultados excepcionales. ¡Déjenos ser su socio audiovisual y juntos llevaremos su visión al siguiente nivel!
          </p>
        </div>
        <div class="col-md-8 offset-md-2 col-12 px-1">
          <form action="src/enviar.php" method="post">
            <div class="row">
              <div class="col-6 py-2">
                <input class="form-control form-control-lg" name="nombre" type="text" placeholder="Nombre" aria-label="Nombre" required>
              </div>
              <div class="col-6 py-2">
                <input class="form-control form-control-lg" name="telefono" type="text" placeholder="Teléfono" aria-label="Celular" required>
              </div>
              <div class="col-6 py-2">
                <input class="form-control form-control-lg" name="email" type="email" placeholder="Email" aria-label="Email" required>
              </div>
              <div class="col-6 py-2">
                <input class="form-control form-control-lg" name="asunto" type="text" placeholder="Asunto" aria-label="Link de referencia" required>
              </div>
              <div class="col-12 py-2">
                <textarea class="form-control form-control-lg" name="mensaje" placeholder="Escribe tu consulta..." rows=5></textarea>
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

  <h2 class="text-white m-5 text-center fw-bold fs-1 titulo">Nuestros Trabajos</h2>

  <div class="portfolio-carousel owl-carousel owl-theme">

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

  <!-- FOOTER -->

  <div class="container bg-dark footer">
    <footer class="row py-5 " id="footer">
      <div class="col-md-4 text-md-start col-12 text-center ">
        <h3 class="fw-bold">Contacto</h3>
        <p><i class="fas fa-phone pt-3"></i> +54 9 2664 544173</p>
        <p><i class="fas fa-envelope"></i> productoraunosl@gmail.com</p>
        <p><i class="fab fa-whatsapp"></i> +54 9 2664 344614</p>
      </div>
      <div class="col-md-4 text-center pt-3 pt-md-0 d-flex  justify-content-center align-items-center">
        <a href="https://www.instagram.com/productorauno/" target="_blank" class="mx-3"><i class="fab fa-instagram fa-4x footer-icon "></i></a>
        <a href="https://www.facebook.com/aleciorivera.ph" target="_blank" class="mx-3"><i class="fab fa-facebook fa-4x footer-icon"></i></a>
        <a href="https://wa.me/5492664344614" target="_blank" class="mx-3"><i class="fab fa-whatsapp fa-4x footer-icon"></i></a>
        <a href="https://www.youtube.com/@productoraunoSL" target="_blank" class="mx-3"><i class="fa-brands fa-youtube fa-4x footer-icon"></i></a>
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
  <script src="assets/js/main.js?ver=<?php echo $date; ?>"></script>

</body>


</html>