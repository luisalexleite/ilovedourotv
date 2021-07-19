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

    .programas {
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
<div class="container">
  <div class="add" style="width:400px;"><a href="edit.php?c=programa&n=novo" class="add-btn"><i class="fas fa-plus"></i>&nbsp;Adicionar Programa</a></div>
  <div class="categorias-exist">

    <?php $programas = $conn->query("SELECT * FROM programas")->fetchAll();
    if (!$programas) { ?>
      <p>Ainda não foram adicionados programas.</p>
    <?php } else { ?>

      <div class="row">
        <?php foreach ($programas as $programa) { ?>
          <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12 d-flex align-items-center justify-content-center" style="position:relative; margin-top:10px; margin-bottom: 10px;"><img class="img-responsive" style="width:202px; height: 300px; border:1px solid black" src="<?= $programa['thumb'] ?>">
            <div style="text-align:center;background-color: rgba(90,90,90, 40%); position:absolute; width:202px; height: 300px; z-index:1; overflow:hidden; color:white;">
              <p style="margin-top: 10px; height:90px;overflow:hidden;"><?= $programa['nome'] ?></p><a href="videos.php?p=<?= $programa['id'] ?>" style="color:white;overflow:hidden;"><?php $videos = $conn->query("SELECT * FROM videos WHERE programa ='" . $programa['id'] . "'");
                                                                                                                                                                                        $videonum = 0;
                                                                                                                                                                                        if (!$videos) {
                                                                                                                                                                                          $videonum = 0;
                                                                                                                                                                                        } else {
                                                                                                                                                                                          foreach ($videos as $videos) {
                                                                                                                                                                                            $videonum = $videonum + 1;
                                                                                                                                                                                          }
                                                                                                                                                                                        } ?><?= $videonum ?> Vídeos</a>
              <div class="d-flex align-items-center justify-content-center" style="color:white;height:20px;margin-top: 120px;"><a href="edit.php?c=programa&id=<?= $programa['id'] ?>" style="margin-right:20px;"><i style="font-size:15px;color:white;" class="fas fa-pen"></i></a><a href="apagar.php?c=programa&id=<?= $programa['id'] ?>"><i style="font-size:20px;color:white;" class="fas fa-times"></i></a></div>
            </div>
            <div></div>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
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