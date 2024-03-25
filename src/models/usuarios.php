<?php

class Usuarios
{
  private $conexion;

  public function __construct($conexion)
  {
    $this->conexion = $conexion;
  }

  public function getUser($username, $password)
  {
    $query = "SELECT * FROM usuarios WHERE username = '{$username}' AND contraseña = '{$password}' AND deleted_at is null";

    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getAllUsers()
  {
    $query = "SELECT * FROM usuarios";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }


  public function getUserById($id)
  {
    $query = "SELECT * FROM usuarios WHERE id = $id";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function eliminarPorId($idUser)
  {
    $query = "UPDATE usuarios SET deleted_at = now() WHERE id = $idUser";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }

  public function restaurarPorId($idUser)
  {
    $query = "UPDATE usuarios SET deleted_at = null WHERE id = $idUser";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }

  public function crear($username, $pass)
  {
    $query = "INSERT INTO usuarios (username, contraseña) VALUES ('{$username}', '{$pass}')";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }

  public function editar($idUser, $username, $pass)
  {
    $query = "UPDATE usuarios SET username = '{$username}', contraseña = '{$pass}' WHERE id = $idUser";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }
}
