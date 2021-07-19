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

        .disclaimers {
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

        .fancybox-slide--iframe .fancybox-content {
            width: 800px;
            height: 600px;
            max-width: 80%;
            max-height: 80%;
            margin: 0;
        }
    </style>
</head>
<?php include('nav.php');
$selectdisclaimers = $conn->query("SELECT * FROM disclaimers WHERE id = 1");
foreach ($selectdisclaimers as $disclaimer) {
?>
    <form id="disclaimers" action="edit.php?c=disclaimers" method="post">
        <div class="container" style="margin-top: 50px;">
            <div class="d-flex align-items-center" style="width:100%; height: 100px; border:1px solid black;margin-bottom:10px;justify-content:space-between;">
                <div style="margin:10px;">Contactos:</div>
                <div style="margin:10px;"><?php if ($disclaimer['contactos'] != "") {
                                                echo "<i style='font-size:15px; color:lightgreen' class='fas fa-check'></i>&nbsp;Ficheiro Submetido";
                                            } else {
                                                echo "<i style='font-size:15px; color:firebrick' class='fas fa-times'></i>&nbsp;Nenhum ficheiro submetido";
                                            } ?></div>
                <div style="margin:10px;"><input id="contactos" name="contactos" type='text' value="<?= $disclaimer['contactos'] ?>" hidden><a href="../vendor/responsivefilemanager/filemanager3/dialog.php?field_id=contactos&amp;relative_url=0&amp;multiple=0" class="add-btn dis-btn"><i class="fas fa-sync"></i>&nbsp;Alterar Disclaimer</a></div>
            </div>
            <div class="d-flex align-items-center" style="width:100%; height: 100px; border:1px solid black;margin-bottom:10px;justify-content:space-between;">
                <div style="margin:10px;">Termos e Condições:</div>
                <div style="margin:10px;"><?php if ($disclaimer['termos'] != "") {
                                                echo "<i style='font-size:15px; color:lightgreen' class='fas fa-check'></i>&nbsp;Ficheiro Submetido";
                                            } else {
                                                echo "<i style='font-size:15px; color:firebrick' class='fas fa-times'></i>&nbsp;Nenhum ficheiro submetido";
                                            } ?></div>
                <div style="margin:10px;"><input id="termos" name="termos" type='text' value="<?= $disclaimer['termos'] ?>" hidden><a href="../vendor/responsivefilemanager/filemanager3/dialog.php?field_id=termos&amp;relative_url=0&amp;multiple=0" class="add-btn dis-btn"><i class="fas fa-sync"></i>&nbsp;Alterar Disclaimer</a></div>
            </div>
            <div class="d-flex align-items-center" style="width:100%; height: 100px; border:1px solid black;margin-bottom:10px;justify-content:space-between;">
                <div style="margin:10px;">Ficha Técnica:</div>
                <div style="margin:10px;"><?php if ($disclaimer['ficha'] != "") {
                                                echo "<i style='font-size:15px; color:lightgreen' class='fas fa-check'></i>&nbsp;Ficheiro Submetido";
                                            } else {
                                                echo "<i style='font-size:15px; color:firebrick' class='fas fa-times'></i>&nbsp;Nenhum ficheiro submetido";
                                            } ?></div>
                <div style="margin:10px;"><input id="ficha" name="ficha" type='text' value="<?= $disclaimer['ficha'] ?>" hidden><a href="../vendor/responsivefilemanager/filemanager3/dialog.php?field_id=ficha&amp;relative_url=0&amp;multiple=0" class="add-btn dis-btn"><i class="fas fa-sync"></i>&nbsp;Alterar Disclaimer</a></div>
            </div>
        </div>
    </form>
<?php } ?>
<?php include("js.php") ?>
<script>
    var $hamburger = $(".hamburger");
    var $nav = $(".pri");
    $hamburger.on("click", function(e) {
        $hamburger.toggleClass("is-active");
        $nav.toggleClass("ativo");
    });

    function fancybox() {
        $('.dis-btn').fancybox({
            'width': 880,
            'height': 570,
            'type': 'iframe',
            'autoSize': false
        });
    }
    fancybox();
    const contactos = document.getElementById("contactos").value;
    const termos = document.getElementById("termos").value;
    const ficha = document.getElementById("ficha").value;
    $(document).ready(function() {
        setInterval(
            function() {
                submit();
            },
            100);
    });

    function submit() {
        if (document.getElementById("contactos").value != contactos || document.getElementById("termos").value != termos || document.getElementById("ficha").value != ficha) {
            $('#disclaimers').submit();
        }
    };
</script>
<?php include('footer.php'); ?>