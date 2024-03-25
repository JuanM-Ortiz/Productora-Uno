<?php

class Categorias
{
  private $conexion;

  public function __construct($conexion)
  {
    $this->conexion = $conexion;
  }

  public function getCategorias($all = false)
  {
    $query = "SELECT * FROM categorias";
    if (!$all) {
      $query .= ' WHERE deleted_at is null';
    }
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

  public function eliminarPorId($idCategoria)
  {
    $query = "UPDATE categorias SET deleted_at = now() WHERE id = $idCategoria";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }
  public function restaurarPorId($idCategoria)
  {
    $query = "UPDATE categorias SET deleted_at = null WHERE id = $idCategoria";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }

  public function editar($idCategoria, $titulo, $descripcion, $img)
  {
    $query = "UPDATE categorias SET titulo = '{$titulo}', descripcion = '{$descripcion}', img = '{$img}' WHERE id = $idCategoria";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }

  public function crear($titulo, $descripcion, $img)
  {
    $query = "INSERT INTO categorias (titulo, descripcion, img) VALUES ('{$titulo}','{$descripcion}','{$img}')";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }
}
