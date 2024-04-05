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
            <i class="fa fa-video fa-2x text-terciary"></i>
            <h5 class="card-title text-terciary">Transmisión de Eventos</h5>
            <p class="card-text text-white">Ofrecemos soluciones completas para la transmisión de una amplia variedad de eventos, desde conferencias y festivales hasta recitales, eventos deportivos, culturales, religiosos y políticos.</p>
          </div>
        </div>
      </div>
      <div class="item p-3">
        <div class="card bg-grayblue" style="min-height: 250px;">
          <div class="card-body text-center text-white d-flex flex-column justify-content-center">
            <i class="fa fa-brands fa-youtube fa-2x text-terciary"></i>
            <h5 class="card-title text-terciary">LiveStream</h5>
            <p class="card-text text-white">Transmitimos en vivo en plataformas populares como Facebook, Youtube e Instagram, y te brindamos la posibilidad de transmitir directamente en tu propia página web.</p>
          </div>
        </div>
      </div>
      <div class="item p-3">
        <div class="card bg-grayblue" style="min-height: 250px;">
          <div class="card-body text-center text-white d-flex flex-column justify-content-center">
            <i class="fa fa-camera fa-2x text-terciary"></i>
            <h5 class="card-title text-terciary">Fotografía</h5>
            <p class="card-text text-white">Llevamos adelante producciones fotográficas institucionales, de prensa y publicitarias con un equipo con años de experiencia.</p>
          </div>
        </div>
      </div>
      <div class="item p-3">
        <div class="card bg-grayblue" style="min-height: 250px;">
          <div class="card-body text-center text-main d-flex flex-column justify-content-center">
            <i class="fa fa-clapperboard fa-2x text-terciary"></i>
            <h5 class="card-title text-terciary">Publicidad y Videoclips</h5>
            <p class="card-text text-white">Ayudamos a marcas y artistas a comunicar visualmente atributos, valores, conceptos e historias.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="nosotros">
    <div class="bg-dark w-100">
      <div class="row py-5 gx-0">
        <div class="col-md-8 offset-md-2 col-12">
          <!-- <p class="text-white py-3 px-2" style="font-size: 1.5rem;">
            Donde la calidad y la creatividad se encuentran. Somos expertos en llevar la producción audiovisual a otro
            nivel. Nos especializamos en LiveStream de eventos, producción de falso vivo, creación de videos,
            fotografía, edición y circuito cerrado. Nuestra misión es clara: priorizamos la calidad de nuestros
            productos para asegurar que cada proyecto no solo cumpla, sino que exceda las expectativas de nuestros
            clientes. Ya sea capturando momentos únicos o creando experiencias visuales inolvidables, Productora Uno es
            tu aliado para innovar en el mundo audiovisual.
            </p>
          -->
          <h2 class="text-white text-center fw-bold fs-1 titulo">Acerca de nosotros</h2>
          <p class="text-white py-3 px-2 text-center" style="font-size: 1.5rem;">
            En Productora Uno nos enorgullece ofrecer un servicio integral de transmisiones en vivo, circuito cerrado y falso vivo de eventos. Nos dedicamos a proporcionar a nuestros clientes todas las herramientas necesarias para maximizar la interacción y el alcance desde un único lugar.
          </p>

          <p class="text-white py-3 px-2 text-center" style="font-size: 1.5rem;">
            Contamos con un equipo profesional altamente capacitado y equipado con la última tecnología para llevar a cabo streamings de calidad excepcional. Nuestro equipo incluye expertos en la producción, camarógrafos, directores de cámaras, operadores de streaming y sonidistas.
          </p>
          <p class="text-white py-3 px-2 text-center" style="font-size: 1.5rem;">
            Priorizamos la calidad en cada aspecto de nuestro servicio para asegurarnos de que tu evento sea accesible y atractivo en cualquier dispositivo, ya sea un teléfono celular, una tablet, una computadora o un televisor.
          </p>
          <!--  <h2 class="text-white text-center fw-bold fs-1 titulo">QUIENES SOMOS</h2> -->
          <!--    <h2 class="text-white text-center fw-bold fs-1 titulo">NUESTROS SERVICIOS</h2>
          <p class="text-white py-3 px-2 text-center" style="font-size: 1.5rem;">
            Ofrecemos soluciones completas para la transmisión de una amplia variedad de eventos, desde conferencias y festivales hasta recitales, eventos deportivos, culturales, religiosos y políticos. Transmitimos en vivo en plataformas populares como Facebook, Youtube e Instagram, y te brindamos la posibilidad de transmitir directamente en tu propia página web.
          </p> -->

          <!-- <h2 class="text-white text-center fw-bold fs-1 titulo">COMPROMISO CON LA CALIDAD</h2> -->
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
        <a href="https://www.youtube.com/@productoraunomerlo6460" target="_blank" class="mx-3"><i class="fa-brands fa-youtube fa-4x footer-icon"></i></a>
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