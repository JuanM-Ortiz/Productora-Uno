<?php

include_once '../../src/db/conn.php';
include_once '../../src/models/contenidos.php';

if ($_POST['eliminar'] && $_POST['eliminar'] != '') {

  $conexion = Conexion::conectar();

  $contenidosModel = new Contenidos($conexion);

  if ($contenidosModel->eliminarPorId($_POST['eliminar'])) {
    echo 1;
  }
  $conexion = null;
}

if ($_POST['restaurar'] && $_POST['restaurar'] != '') {
  $conexion = Conexion::conectar();

  $contenidosModel = new Contenidos($conexion);

  if ($contenidosModel->restaurarPorId($_POST['restaurar'])) {
    echo 1;
  }

  $conexion = null;
}

if ($_POST['desc'] && $_POST['title']) {
  $conexion = Conexion::conectar();
  $contenidosModel = new Contenidos($conexion);
  $hora = date('his');

  if ($_FILES['file']['name'] && !empty($_FILES['file']['name'])) {
    $filename = $hora . $_FILES['file']['name'];
    $location = "../../assets/img/" . $filename;
    if (!move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
      return false;
    }
    $link = $filename;
  }

  if (empty($_FILES['file']['name'])) {
    $filename = null;
  }

  if (!empty($_POST['link'])) {
    $link = $_POST['link'];
  }

  $categorias = json_decode($_POST['categorias']);
  if ($_POST['contenidoId']) {
    $contenidosModel->editar($_POST['contenidoId'], $_POST['title'], $_POST['desc'], $link, $_POST['tipo'], $categorias);
    echo 1;
    return;
  }

  $contenidosModel->crear($_POST['title'], $_POST['desc'], $link, $_POST['tipo'], $categorias);
  echo 1;
  return;
}
