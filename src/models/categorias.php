<?php

class Categorias
{
  private $conexion;

  public function __construct($conexion)
  {
    $this->conexion = $conexion;
  }

  public function getCategorias()
  {
    $query = "SELECT id, titulo, descripcion, img FROM categorias WHERE deleted_at is null";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getCategoriaById($id)
  {
    $query = "SELECT * FROM categorias WHERE id = $id";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }
}
