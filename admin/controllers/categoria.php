<?php

include_once '../../src/db/conn.php';
include_once '../../src/models/categorias.php';

if ($_POST['eliminar'] && $_POST['eliminar'] != '') {

  $conexion = Conexion::conectar();

  $categoriasModel = new Categorias($conexion);

  if ($categoriasModel->eliminarPorId($_POST['eliminar'])) {
    echo 1;
  }
  $conexion = null;
}

if ($_POST['restaurar'] && $_POST['restaurar'] != '') {
  $conexion = Conexion::conectar();

  $categoriasModel = new Categorias($conexion);

  if ($categoriasModel->restaurarPorId($_POST['restaurar'])) {
    echo 1;
  }

  $conexion = null;
}

if ($_POST['title']) {
  if ($_FILES['file']['name'] && !empty($_FILES['file']['name'])) {
    $filename = $_FILES['file']['name'];
    $location = "../../assets/img/" . $filename;
    if (!move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
      return false;
    }
  }
  if (empty($_FILES['file']['name'])) {
    $filename = null;
  }

  $conexion = Conexion::conectar();
  $categoriasModel = new Categorias($conexion);
  if ($_POST['categoryId']) {
    $categoriasModel->editar($_POST['categoryId'], $_POST['title'], $filename);
    echo 1;
    return;
  }

  $categoriasModel->crear($_POST['title'], $filename);
  echo 1;
  return;
}
