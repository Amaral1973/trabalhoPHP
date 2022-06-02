<?php
    session_start();
    $id = $_GET['id'];
    $comentario = $_POST['comentario'];
    $user = $_SESSION['user'];
    include 'conecta.php';
    $perfil = mysqli_query($conn,"SELECT * FROM usuarios WHERE senha = '$user'");
    $row = mysqli_num_rows($perfil);
    if ($row > 0) {
      while ($registro = $perfil->fetch_array()) {
          $per = $registro['perfil'];
      }
    }
    $query = "INSERT INTO comentarios(comentario,equipamento,perfil,data) values('".$comentario."','".$id."','".$per."',NOW())";
    mysqli_query($conn,$query);
    header('Location: techman.php');
?>