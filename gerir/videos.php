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

        .videos {
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

        td {
            align-items: center;
        }
    </style>
</head>
<?php include('nav.php'); ?>
<div class="categorias-exist">
    <table class="table table-borderless" style="min-width:388px; max-width:90%; background-color:#e92829;color:white">
        <thead>
            <tr style="font-weight:900 !important;">
                <th scope="col">Thumbnail</th>
                <th scope="col">Titulo</th>
                <th scope="col">Descrição</th>
                <th scope="col">Data/Hora de Publicação</th>
                <th scope="col">Link</th>
            </tr>
        </thead>
        <tbody style="border-top: white solid 2px;">
            <?php
            if (!isset($_GET['c'])) {
                $videos = $conn->query("SELECT * FROM videos")->fetchAll();
                if (!$videos) {
                    echo "<p>Sem videos publicados!</p>";
                } else {
                    foreach ($videos as $video) {
            ?>
                        <tr>
                            <td><img style="max-height:100px;" src="<?= $video['thumb'] ?>"></td>
                            <td><?= $video['titulo'] ?></td>
                            <td><?= $video['resumo'] ?></td>
                            <td><?= date("d/m/y", strtotime($video['data'])) ?><br><?= date("H:i", strtotime($video['hora'])) ?></td>
                            <td><a style="color:white" target="_blank" href="https://youtube.com/watch?v=<?= $video['videoid'] ?>">Ver Vídeo</a></td>
                            <td style="width:20px;">
                                <div style="display:flex;"><a href="edit.php?c=videos&id=<?= $video['id'] ?>" style="margin-right:20px;"><i style="font-size:15px;color:white;" class="fas fa-pen"></i></a><a href="apagar.php?c=videos&id=<?= $video['id'] ?>"><i style="font-size:20px;color:white;" class="fas fa-times"></i></a></div>
                            </td>
                        </tr>

            <?php }
                }
            } elseif (isset($_GET['c'])) {
            }
            ?>
        </tbody>
    </table>
</div>
<?php include("js.php") ?>
<script>
    var $hamburger = $(".hamburger");
    var $nav = $(".pri");
    $hamburger.on("click", function(e) {
        $hamburger.toggleClass("is-active");
        $nav.toggleClass("ativo");
    });
</script>
<?php include('footer.php'); ?>