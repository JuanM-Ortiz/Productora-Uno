<?php

include_once '../../src/db/conn.php';
include_once '../../src/models/categorias.php';

if ($_POST['eliminar'] && $_POST['eliminar'] != '') {

  $conexion = Conexion::conectar();

  $categoriasModel = new Categorias($conexion);

  if ($categoriasModel->eliminarPorId($_POST['eliminar'])) {
    echo 1;
  }
}

if ($_POST['restaurar'] && $_POST['restaurar'] != '') {
  $conexion = Conexion::conectar();

  $categoriasModel = new Categorias($conexion);

  if ($categoriasModel->restaurarPorId($_POST['restaurar'])) {
    echo 1;
  }
}
