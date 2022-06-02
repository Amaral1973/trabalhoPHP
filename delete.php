<?php
   include 'conecta.php';
   $id = $_GET['id'];
   $sql = "DELETE FROM equipamentos WHERE id = $id";
   if(mysqli_query($conn,$sql)){
    header("location:techman.php");
     }
?>