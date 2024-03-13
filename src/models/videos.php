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
}
