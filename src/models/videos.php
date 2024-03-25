<?php

class Videos
{
  private $conexion;

  public function __construct($conexion)
  {
    $this->conexion = $conexion;
  }

  public function getVideosByCategoria($idCategoria)
  {
    $query = "SELECT v.* 
    FROM videos v
    JOIN categorias_videos cv ON v.id = cv.id_video
    WHERE cv.id_categoria = $idCategoria
    AND v.deleted_at is null";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getVideos($all = false)
  {
    $query = "SELECT v.id, v.titulo as titulo, v.descripcion as descripcion, v.link as link, c.titulo as categoria
    FROM videos v 
    JOIN categorias_videos cv ON v.id = cv.id_video
    JOIN categorias c ON cv.id_categoria = c.id";

    if (!$all) {
      $query .= ' WHERE v.deleted_at is null';
    }

    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
  }

  public function crear($titulo, $desc, $link, $categorias)
  {
    $query = "INSERT INTO videos (titulo, descripcion, link) VALUES ('{$titulo}', '{$desc}', '{$link}')";
    $resultado = $this->conexion->prepare($query);
    $resultado->execute();
    $idVideo = $this->conexion->lastInsertId();

    foreach ($categorias as $categoria) {
      $query = "INSERT INTO categorias_videos (id_video, id_categoria) VALUES ($idVideo, $categoria)";
      $resultado = $this->conexion->prepare($query);
      $resultado->execute();
    }
    return true;
  }
}
