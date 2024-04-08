<?php

class Contenidos
{
  private $conexion;

  public function __construct($conexion)
  {
    $this->conexion = $conexion;
  }

  public function getVideosByCategoria($idCategoria)
  {
    $query = "SELECT c.* 
    FROM contenidos c
    JOIN contenidos_categorias cc ON c.id = cc.id_contenido
    WHERE cc.id_categoria = $idCategoria
    AND c.deleted_at is null
    AND c.tipo = 1";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getContenidos($all = false)
  {
    $query = "SELECT c.id, c.titulo as titulo,
    c.descripcion as descripcion,
    c.link as link, c.tipo as tipo, GROUP_CONCAT(ca.titulo SEPARATOR ', ') as categoria,
    c.deleted_at as deleted_at
    FROM contenidos c 
    JOIN contenidos_categorias cc ON c.id = cc.id_contenido
    JOIN categorias ca ON cc.id_categoria = ca.id
    GROUP BY c.id";

    if (!$all) {
      $query .= ' WHERE c.deleted_at is null';
    }

    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function crear($titulo, $desc, $link, $tipo, $categorias)
  {
    $query = "INSERT INTO contenidos (titulo, descripcion, link, tipo) VALUES ('{$titulo}', '{$desc}', '{$link}', $tipo)";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    $idContenido = $this->conexion->lastInsertId();

    foreach ($categorias as $categoria) {
      $query = "INSERT INTO contenidos_categorias (id_contenido, id_categoria) VALUES ($idContenido, $categoria)";
      $resultado = $this->conexion->prepare($query);
      $resultado->execute();
    }
    return true;
  }

  public function editar($idContenido, $titulo, $desc, $link, $tipo, $categorias)
  {
    $query = "UPDATE contenidos SET titulo= '{$titulo}', descripcion= '{$desc}', link='{$link}', tipo=$tipo WHERE id = $idContenido";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();

    $query = "DELETE FROM contenidos_categorias WHERE id_contenido = $idContenido";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();

    foreach ($categorias as $categoria) {
      $query = "INSERT INTO contenidos_categorias (id_contenido, id_categoria) VALUES ($idContenido, $categoria)";
      $resultado = $this->conexion->prepare($query);
      $resultado->execute();
    }
    return true;
  }

  public function eliminarPorId($idContenido)
  {
    $query = "UPDATE contenidos SET deleted_at = now() WHERE id = $idContenido";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }
  public function restaurarPorId($idContenido)
  {
    $query = "UPDATE contenidos SET deleted_at = null WHERE id = $idContenido";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return true;
  }
}
