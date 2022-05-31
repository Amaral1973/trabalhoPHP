<?php
    session_start();
    $user = $_SESSION['user'];
    $perfil = $_SESSION['perfil']; 
?>
<html>
<head>
	<meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col">
      <img src="img_sis/techman.png" width="270" height="80"/>
    </div>
    <div class="col"></div>
    <div class="col">
        <?php
        include 'conecta.php';
        $admin = mysqli_query($conn, "SELECT * FROM usuarios WHERE senha = $user and perfil = 2");
        $row = mysqli_num_rows($admin);
        if($row > 0){
            echo "Novo Equipamento";
        } else {
            "";
        }
      ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="sair.php"><img src="img_sis/logout_sair.png" width="20" height="20"></a>
    </div>
  </div>
</div>
<br/><br/>
<table class="table table-hover">
<?php
            $pesquisa = mysqli_query($conn, "SELECT * FROM equipamentos");
            $row = mysqli_num_rows($pesquisa);
            if($row > 0){
                while($registro = $pesquisa-> fetch_array()){
                    $imagem = $registro['imagem'];
                    echo '<tr>';
                    echo '<td><img src="imagens/'.$imagem.'"/></td>';
                    echo '<td>'.$registro['equipamento'].'</td>';
                    echo '<td>'.$registro['descricao'].'</td>';
                    echo '</tr>';
                }
                echo '</table>';
            }
            else {
                echo "Não há registros inseridos!!!";
                echo '</tbody>';
                echo '</table>';
            }
            ?>
</table>
</body>
</html>