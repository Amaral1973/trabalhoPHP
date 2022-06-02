<?php
    session_start();
    include 'conecta.php';
    $equipamento = $_POST['equipamento'];
    $imagem = $_FILES['imagem']['name'];
    $comentario = $_POST['comentario'];
    if(!isset($_POST['ativo'])){
        $ativo = "0";
    } else {
        $ativo = "1";
    }
    $target_dir = "imagens/";
    $target_file = $target_dir . basename($_FILES["imagem"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $extensions_arr = array("jpg","jpeg","png","gif");
    if( in_array($imageFileType,$extensions_arr) ){
     if(move_uploaded_file($_FILES['imagem']['tmp_name'],$target_dir.$imagem)){
        $query = "INSERT INTO equipamentos(equipamento,imagem,descricao,ativo,data) values('".$equipamento."','".$imagem."','".$comentario."','".$ativo."',NOW())";
        mysqli_query($conn,$query);
        header('Location: techman.php');
     }
    }
?>