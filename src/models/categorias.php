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
    $query = "SELECT titulo, link, descripcion FROM categorias WHERE deleted_at = null";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }
}
