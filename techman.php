<?php
session_start();
$user = $_SESSION['user'];
$perfil = $_SESSION['perfil'];
?>
<html>

<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col">
        <img src="img_sis/techman.png" width="270" height="80" />
      </div>
      <div class="col"></div>
      <div class="col">
        <?php
        include 'conecta.php';
        $admin = mysqli_query($conn, "SELECT * FROM usuarios WHERE senha = $user and perfil = 2");
        $row = mysqli_num_rows($admin);
        if ($row > 0) {
          echo '<a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Novo Equipamento</a>';
        } else {
          "";
        }
        ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="sair.php"><img src="img_sis/logout_sair.png" width="20" height="20"></a>
      </div>
    </div>
  </div>
  <br /><br />
  <table class="table table-hover">
    <?php
    $pesquisa = mysqli_query($conn, "SELECT * FROM equipamentos");
    $row = mysqli_num_rows($pesquisa);
    if ($row > 0) {
      while ($registro = $pesquisa->fetch_array()) {
        $id = $registro['id'];
        $imagem = $registro['imagem'];
        echo '<tr>';
        echo '<td><img src="imagens/' . $imagem . '"/></td>';
        echo '<td>' . $registro['equipamento'] . '</td>';
        echo '<td>' . $registro['descricao'];
        echo '<br/><a href="#?id='.$id.'" data-bs-toggle="modal" data-bs-target="#comentar'.$id.'"><img src="img_sis/comentario.png" width="30" height="30"></a>&nbsp;&nbsp;&nbsp;&nbsp;';
        ?>
        <div class="modal fade" id="comentar<?php echo $id; ?>" tabindex="-1" aria-labelledby="comentar" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Comentários</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
              <div class="modal-body">
                <?php 
                  $pesquisa3 = mysqli_query($conn, "SELECT comentarios.*, perfis.* from comentarios,perfis where comentarios.perfil = perfis.id and comentarios.equipamento = $id");
                  $row3 = mysqli_num_rows($pesquisa3);
                  if ($row3> 0) {
                    while ($registro3 = $pesquisa3->fetch_array()) {
                      $id = $registro3['id'];
                      $date = date_create($registro3['data']);
                      $data3 = date_format($date, 'd/m/Y');
                      echo '<table>';
                      echo '<tr>';
                      echo '<td><b>' . $registro3['perfil'] . '</b></td>';
                      echo '<td>' .$data3.'</td>';
                      echo '</tr>';
                      echo '<tr>';
                      echo '<td>'.$registro3['comentario'].'</td>';
                      echo '</tr>';
                      echo '</table>';
                    }
                  }
                  else {
                    echo "Não há registros de comentários!";
                  }
                ?>
              </div>
             <div class="modal-footer">
              <button type="button" class="btn btn-success" data-bs-target="#inserircomentario<?php echo $id; ?>" data-bs-toggle="modal" data-bs-dismiss="modal">Cadastrar Comentário</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="inserircomentario<?php echo $id; ?>" tabindex="-1" aria-labelledby="apagar" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Comentário</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
              <div class="modal-body">
                <?php
                  $id = $id;
                ?>
                <form action="cadastrocomentario.php?id=<?php echo $id; ?>" method="POST">
                <textarea class="form-control" rows="3" placeholder="Insira seu comentário" name="comentario"></textarea>
              </div>
             <div class="modal-footer">
              <button type="submit" class="btn btn-success">Cadastrar</button></a>
                </form>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
          </div>
        </div>
      </div>
      <?php
        $admin = mysqli_query($conn, "SELECT * FROM usuarios WHERE senha = $user and perfil = 2");
        $row = mysqli_num_rows($admin);
        if ($row > 0) {
          echo '<a href="#?id='.$id.'" data-bs-toggle="modal" data-bs-target="#apagar'.$id.'"><img src="img_sis/deletar.png" width="30" height="30"></a>'; ?>
          <div class="modal fade" id="apagar<?php echo $id; ?>" tabindex="-1" aria-labelledby="apagar" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Exclusão de Equipamento</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
              <div class="modal-body">
                Atenção! Deseja realmente excluir o equipamento.
              </div>
             <div class="modal-footer">
              <a href="delete.php?id=<?php echo $id; ?>"><button type="button" class="btn btn-danger">Excluir</button></a>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
          </div>
        </div>
      </div>
        <?php
        } else {
          "";
        }
        echo '</td>';
        echo '</tr>';
      }
      echo '</table>';
    } else {
      echo "Não há registros inseridos!!!";
      echo '</tbody>';
      echo '</table>';
    }
    ?>
  </table>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cadastro de Equipamento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="cadastro.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <input type="text" class="form-control" placeholder="Nome do Equipamento" name="equipamento" required>
            </div>
            <div class="mb-3">
              <input type="file" class="form-control" placeholder="Selecione a imagem" name="imagem" required>
            </div>
            <div class="mb-3">
              <textarea class="form-control" rows="3" placeholder="Insira seu comentário" name="comentario"></textarea>
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" name="ativo">
              <label class="form-check-label">Ativo</label>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>