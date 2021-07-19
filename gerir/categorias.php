<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php include('css.php') ?>
  <?php include('../db/pdo.php') ?>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Rubik&display=swap");

    body,
    html {
      padding: 0;
      margin: 0;
      border: 0;
      font-family: 'Rubik';
    }

    .pri {
      background-color: #e92829;
      height: 100vh;
      min-width: 320px;
      max-width: 400px;
      display: flex;
      flex-direction: column;
      text-align: center;
    }

    .wrapper {
      display: flex;
    }

    .logo {
      width: 80%;
      margin-top: 20px;
      cursor: pointer;
    }

    a:hover>img {
      animation: pulse;
      animation-duration: 2s;
    }

    ul {
      list-style-type: none;
      padding: 0;
      margin-top: 20px;
      border: 0;
      width: 100%;
    }

    ul>li {
      width: 100%;
      height: 70px;
      color: white;
      background-color: #e92829;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    ul>li:hover {
      background-color: white;
      color: #e92829;
      -webkit-box-shadow: inset 0px 0px 0px 2px #e92829;
      -moz-box-shadow: inset 0px 0px 0px 2px #e92829;
      box-shadow: inset 0px 0px 0px 2px #e92829;
      cursor: pointer;
    }

    .categorias {
      background-color: white;
      color: #e92829;
      -webkit-box-shadow: inset 0px 0px 0px 2px #e92829;
      -moz-box-shadow: inset 0px 0px 0px 2px #e92829;
      box-shadow: inset 0px 0px 0px 2px #e92829;
      cursor: pointer;
    }

    .add-btn {
      color: white !important;
      background-color: #e92829;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 10px;
    }

    .add {
      display: flex;
      margin-top: 30px;
      margin-left: 30px;
    }

    .categorias-exist {
      margin-top: 30px;
      margin-left: 30px;
    }

    .link {
      color: white !important;
    }

    .link:hover {
      text-decoration: underline !important;
    }

    .ativo {
      display: none;
    }
  </style>
</head>
<?php include('nav.php'); ?>
<form method="post" action="adicionar.php?c=categorias" id="add-categoria">
  <div class="add" style="width:400px;"><input name="categoria" type='text' required><a onclick="$('#add-categoria').submit();" class="add-btn"><i class="fas fa-plus"></i>&nbsp;Adicionar Categoria</a></div>
</form>
<div class="categorias-exist">

  <?php $categorias = $conn->query("SELECT * FROM categorias")->fetchAll();
  if (!$categorias) { ?>
    <p>Ainda não foram adicionadas categorias.</p>
  <?php } else { ?>
    <table class="table table-borderless" style="min-width:388px; max-width:90%; background-color:#e92829;color:white">
      <thead>
        <tr style="font-weight:900 !important;">
          <th scope="col">Categoria</th>
          <th scope="col">Nº de Vídeos / Programas</th>
          <th scope="col">Ativo</th>
        </tr>
      </thead>
      <tbody style="border-top: white solid 2px;">
        <?php foreach ($categorias as $categoria) { ?>
          <tr>
            <th scope="row">
              <div id='nome<?= $categoria['id'] ?>'><?= $categoria['nome'] ?></div>
            </th>
            <td><a class="link" href="videos.php?c=<?php echo $categoria['id']; ?>"><?php $numvideos = 0;
                                                                                    $catvideos = $conn->query("SELECT * FROM videos WHERE categoria =" . $categoria['id'])->fetchAll();
                                                                                    if (!$catvideos) {
                                                                                      $numvideos = 0;
                                                                                    } else {
                                                                                      foreach ($catvideos as $numvideo) {
                                                                                        $numvideos = $numvideos + 1;
                                                                                      }
                                                                                    }
                                                                                    echo $numvideos; ?> Vídeos</a> /<a class="link" href="programas.php?c=<?php echo $categoria['id']; ?>">
                <?php $numprogramas = 0;
                $catprogramas = $conn->query('SELECT * FROM programas WHERE categoria =' . $categoria['id'])->fetchAll();
                if (!$catprogramas) {
                  $numprogramas = 0;
                } else {
                  foreach ($catprogramas as $numprograma) {
                    $numprogramas = $numprogramas + 1;
                  }
                }
                echo $numprogramas; ?> Programas</a></td>
            <td><?php if ($categoria['ativo'] == false) {
                  echo "<a style='color:white' href='edit.php?c=categorias&id=" . $categoria['id'] . " &ativo=1'>Ativar</a>";
                } else {
                  echo "<a style='color:white' href='edit.php?c=categorias&id=" . $categoria['id'] . " &ativo=0'>Desativar</a>";
                } ?></td>
            <td style="width:20px;">
              <div style="display:flex;"><a onclick="editar(<?= $categoria['id'] ?>)" style="margin-right:20px;"><i style="font-size:15px;color:white;" class="fas fa-pen"></i></a><a href="apagar.php?c=categorias&id=<?= $categoria['id'] ?>"><i style="font-size:20px;color:white;" class="fas fa-times"></i></a></div>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  <?php } ?>
</div>
<div class="modal fade" id="delerro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ERRO</h5>
        <a type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <div class="modal-body">
        Você está a tentar eliminar uma categoria que tem vídeos ou programas associados.
      </div>
      <div class="modal-footer">
        <a href="categorias.php" type="button" class="btn btn-secondary" style="background-color:#e92829 !important" data-dismiss="modal">Fechar</a>
      </div>
    </div>
  </div>
</div>
<button hidden="hidden" id="erroapagar" type="button" data-toggle="modal" data-target="#delerro">
</button>
<div class="modal fade" id="editerror" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ERRO</h5>
        <a type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <div class="modal-body">
        Erro inesperado na edição do nome da categoria. Verifique se o nome da categoria digitada já está atribuído a outra categoria.
      </div>
      <div class="modal-footer">
        <a href="categorias.php" type="button" class="btn btn-secondary" style="background-color:#e92829 !important" data-dismiss="modal">Fechar</a>
      </div>
    </div>
  </div>
</div>
<button hidden="hidden" id="erroeditar" type="button" data-toggle="modal" data-target="#editerror">
</button>
<div class="modal fade" id="duplication" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ERRO</h5>
        <a type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <div class="modal-body">
        Já existe uma categoria com esse nome.
      </div>
      <div class="modal-footer">
        <a href="categorias.php" type="button" class="btn btn-secondary" style="background-color:#e92829 !important" data-dismiss="modal">Fechar</a>
      </div>
    </div>
  </div>
</div>
<button hidden="hidden" id="erroduplicacao" type="button" data-toggle="modal" data-target="#duplication">
</button>
<div class="modal fade" id="editduplication" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ERRO</h5>
        <a type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <div class="modal-body">
        Esse nome já está atribuido a uma categoria.
      </div>
      <div class="modal-footer">
        <a href="categorias.php" type="button" class="btn btn-secondary" style="background-color:#e92829 !important" data-dismiss="modal">Fechar</a>
      </div>
    </div>
  </div>
</div>
<button hidden="hidden" id="editduplicacao" type="button" data-toggle="modal" data-target="#editduplication">
</button>

<div class="modal fade" id="editnull" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ERRO</h5>
        <a type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <div class="modal-body">
        O campo que submeteu estava vazio.
      </div>
      <div class="modal-footer">
        <a href="categorias.php" type="button" class="btn btn-secondary" style="background-color:#e92829 !important" data-dismiss="modal">Fechar</a>
      </div>
    </div>
  </div>
</div>
<button hidden="hidden" id="editnulo" type="button" data-toggle="modal" data-target="#editnull">
</button>
<?php include("js.php") ?>
<script>
  function editar(id) {
    $('#nome' + id).html("<form id='editar' action='edit.php?c=categorias&id=" + id + "' method='post'><input name='nome' type='text' required><a onclick='$(\"#editar\").submit();' style='padding:5px;'><i class='fas fa-check'></i></a></form>");
  }
  var $hamburger = $(".hamburger");
  var $nav = $(".pri");
  $hamburger.on("click", function(e) {
    $hamburger.toggleClass("is-active");
    $nav.toggleClass("ativo");
  });
</script>
<?php
if (isset($_GET['erro'])) {
  if ($_GET['erro'] == 'apagar') {
    echo "<script>
        $('#erroapagar').click();
        $('#delerro').on('hidden.bs.modal', function (e) {
            window.location.href='categorias.php'
        })
        </script>";
  } else if ($_GET['erro'] == 'editar') {
    echo "<script>
        $('#erroeditar').click();
        $('#editerror').on('hidden.bs.modal', function (e) {
            window.location.href='categorias.php'
        })
        </script>";
  } else if ($_GET['erro'] == 'duplicacao') {
    echo "<script>
        $('#erroduplicacao').click();
        $('#duplication').on('hidden.bs.modal', function (e) {
            window.location.href='categorias.php'
        })
        </script>";
  } else if ($_GET['erro'] == 'editduplicacao') {
    echo "<script>
        $('#editduplicacao').click();
        $('#editduplication').on('hidden.bs.modal', function (e) {
            window.location.href='categorias.php'
        })
        </script>";
  } else if ($_GET['erro'] == 'nulo') {
    echo "<script>
        $('#editnulo').click();
        $('#editnull').on('hidden.bs.modal', function (e) {
            window.location.href='categorias.php';
        })
        </script>";
  }
}

include('footer.php');

?>