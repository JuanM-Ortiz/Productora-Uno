<?php

if ($_FILES['file']['name']) {
  $filename = 'main-bg-dark.jpg';
  $location = "../../assets/img/" . $filename;
  if (!move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
    return false;
  }
  echo 1;
  return;
}
