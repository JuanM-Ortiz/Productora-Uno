<?php

include_once '../../src/db/conn.php';
include_once '../../src/models/usuarios.php';

if ($_POST['eliminar'] && $_POST['eliminar'] != '') {

  $conexion = Conexion::conectar();

  $usuariosModel = new Usuarios($conexion);

  if ($usuariosModel->eliminarPorId($_POST['eliminar'])) {
    echo 1;
  }
  
  $conexion = null;
}

if ($_POST['restaurar'] && $_POST['restaurar'] != '') {
  $conexion = Conexion::conectar();

  $usuariosModel = new Usuarios($conexion);

  if ($usuariosModel->restaurarPorId($_POST['restaurar'])) {
    echo 1;
  }

  $conexion = null;
}