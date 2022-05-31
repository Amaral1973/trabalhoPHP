<?php
    session_start();
    include 'conecta.php';
    $senha = $_POST['senha'];
    $logar = mysqli_query($conn, "SELECT usuarios.*, perfis.* from usuarios,perfis where usuarios.perfil = perfis.id and usuarios.senha = $senha");
    if(mysqli_num_rows($logar)>0){
        $dados = mysqli_fetch_assoc($logar);
        $_SESSION['user'] = $dados['senha'];
        $_SESSION['perfil'] = $dados['perfil'];
        header("location:techman.php");
    }
    else {
        echo "<script>alert('Login ou senha incorreto!');</script>";
        echo "<script>window.location.replace('index.php');</script>";
    }
    mysqli_close($conn);
?>