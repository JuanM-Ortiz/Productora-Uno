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

/*

if ($_POST['restaurar'] && $_POST['restaurar'] != '') {
  $conexion = Conexion::conectar();

  $usuariosModel = new Usuarios($conexion);

  if ($usuariosModel->restaurarPorId($_POST['restaurar'])) {
    echo 1;
  }

  $conexion = null;
}

*/

if ($_POST['username'] && $_POST['pass']) {
  $conexion = Conexion::conectar();

  $usuariosModel = new Usuarios($conexion);
  $hash = md5($_POST['pass']);

  if ($_POST['userId'] && !empty($_POST['userId'])) {
    $usuariosModel->editar($_POST['userId'], $_POST['username'], $hash);
    echo 1;
    return;
  }

  if ($usuariosModel->crear($_POST['username'], $hash)) {
    echo 1;
    return;
  }

  $conexion = null;
}
