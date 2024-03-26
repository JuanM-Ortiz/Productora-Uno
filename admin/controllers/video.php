<?php

include_once '../../src/db/conn.php';
include_once '../../src/models/videos.php';

if ($_POST['eliminar'] && $_POST['eliminar'] != '') {

  $conexion = Conexion::conectar();

  $videosModel = new Videos($conexion);

  if ($videosModel->eliminarPorId($_POST['eliminar'])) {
    echo 1;
  }
  $conexion = null;
}

if ($_POST['restaurar'] && $_POST['restaurar'] != '') {
  $conexion = Conexion::conectar();

  $videosModel = new Videos($conexion);

  if ($videosModel->restaurarPorId($_POST['restaurar'])) {
    echo 1;
  }

  $conexion = null;
}

if ($_POST['desc'] && $_POST['title'] && $_POST['link']) {
  $conexion = Conexion::conectar();
  $videosModel = new Videos($conexion);
  $categorias = json_decode($_POST['categorias']);
  if ($_POST['videoId']) {
    $videosModel->editar($_POST['videoId'], $_POST['title'], $_POST['desc'], $_POST['link'], $categorias);
    echo 1;
    return;
  }

  $videosModel->crear($_POST['title'], $_POST['desc'], $_POST['link'], $categorias);
  echo 1;
  return;
}
