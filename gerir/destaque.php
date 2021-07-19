<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <?php include('css.php')?> 
   <?php include('../db/pdo.php') ?>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Rubik&display=swap");
    body, html{
        padding:0;
        margin: 0;
        border: 0;
        font-family: 'Rubik';
    }
    .pri{
        background-color: #e92829;
        height: 100vh;
        min-width:320px;
        max-width:400px;
        display: flex;
        flex-direction: column;
        text-align:center;
    }
    .wrapper{
        display:flex;
    }
    .logo{
        width:80%;
        margin-top: 20px;
        cursor:pointer;
    }
    a:hover > img{
        animation: pulse; /* referring directly to the animation's @keyframe declaration */
        animation-duration: 2s;
    }
    ul{
        list-style-type:none; 
        padding:0;
        margin-top:20px;
        border:0;
        width:100%;
    }
    ul > li {
        width: 100%;
        height: 70px;
        color: white;
        background-color: #e92829;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    ul > li:hover {
        background-color: white;
        color: #e92829;
        -webkit-box-shadow:inset 0px 0px 0px 2px #e92829;
        -moz-box-shadow:inset 0px 0px 0px 2px #e92829;
        box-shadow:inset 0px 0px 0px 2px #e92829;
        cursor:pointer;
    }
    .destaque {
        background-color: white;
        color: #e92829;
        -webkit-box-shadow:inset 0px 0px 0px 2px #e92829;
        -moz-box-shadow:inset 0px 0px 0px 2px #e92829;
        box-shadow:inset 0px 0px 0px 2px #e92829;
        cursor:pointer;
    }
    .add-btn{
        color:white !important;
        background-color:#e92829;
        display:flex;
        align-items: center;
        justify-content: center;
        padding:10px;
    }
.add{
    display:flex;
    margin-top: 30px;
    margin-left:30px;
}
.categorias-exist {
    margin-top: 30px;
    margin-left:30px;
}
.link{
    color:white !important;
}
.link:hover{
    text-decoration: underline !important;
}
.ativo{
  display: none;
}
.fancybox-slide--iframe .fancybox-content {
    width  : 800px;
    height : 600px;
    max-width  : 80%;
    max-height : 80%;
    margin: 0;
}
.titulo {
 width: 100%;
}
.seccao{
    margin-bottom: 13px;
    margin-top: 17px;
}
.descricao {
 width: 100%;
 min-height: 200px !important;
 resize: none;
}
</style>
</head>
<?php include('nav.php'); 
$selectdestaques = $conn->query("SELECT * FROM destaque WHERE id = 1");
foreach ($selectdestaques as $destaque){
?>
<form id="destaque" action="edit.php?c=destaque" method="post">
<div class="container" style="margin-top: 50px;">
<div class="seccao col-12 d-flex">
        <div class="d-flex" style="flex-direction: column; width:100%">
        <div class="d-flex align-items-center" style="width:100%; height: 40px; background-color:#e92829; color:white;">&nbsp;Vídeo</div>
        <div class="container-fluid" style="width:100%; border: solid black 1px;">
        <div class="row">
            <div class="col-md-6 col-12" id="thumbprev" style="margin-top:10px; margin-bottom:10px; text-align: center;"> <video id="vid-destaque" style="width:320px; height:180px;" muted loop><source id="srcvideo" src="<?=$destaque['video']?>" type="video/mp4"></video></div>
            <div class="col-md-6 col-12" style="margin-top:10px; margin-bottom:10px;"><div style="height:100%" class="d-flex align-items-center justify-content-center"><a href="../vendor/responsivefilemanager/filemanager4/dialog.php?field_id=video&amp;relative_url=0&amp;multiple=0" class="thumb-btn add-btn vid-btn"><i class="fas fa-sync-alt"></i>&nbsp;Alterar Vídeo</a><input name="video" id="video" type="text" value="<?=$destaque['video']?>" hidden></div></div></div>
        </div>
    </div>
</div>
<div class="seccao col-12 d-flex">
        <div class="d-flex" style="flex-direction: column; width:100%">
        <div class="d-flex align-items-center" style="width:100%; height: 40px; background-color:#e92829; color:white;">&nbsp;Título</div>
        <div style="width:100%"><input name="titulo" class='titulo' type="text" value="<?=$destaque['titulo']?>"></div>
    </div></div>
    <div class="col-12 d-flex">
        <div class="d-flex" style="flex-direction: column;width:100%">
        <div class="d-flex align-items-center" style="width:100%; min-height: 40px; background-color:#e92829; color:white;">&nbsp;Descrição</div>
        <div style="width:100%"><textarea name="descricao" id="descricao" class="descricao" maxlength="300"><?=$destaque['descricao']?></textarea></div>
   </div></div>
   <div class="seccao col-12 d-flex">
        <div class="d-flex" style="flex-direction: column; width:100%">
        <div class="d-flex align-items-center" style="width:100%; height: 40px; background-color:#e92829; color:white;">&nbsp;Link</div>
        <div style="width:100%"><input name="link" class='titulo' type="text" value="<?=$destaque['link']?>"></div>
    </div></div>
    <button style="border: none;float:right" type="submit" class="add-btn seccao">Confirmar Alterações</button>
</div>
</div>
</form>
<?php }?>
<?php include("js.php")?>
<script>
var $hamburger = $(".hamburger");
var $nav = $(".pri");
    $hamburger.on("click", function(e) {
      $hamburger.toggleClass("is-active");
      $nav.toggleClass("ativo");
    });
    function fancybox(){
	$('.vid-btn').fancybox({
		'width'	: 880,
		'height'	: 570,
		'type'	: 'iframe',
		'autoSize' : false});
}
fancybox();
document.getElementById('vid-destaque').play();
$(document).ready(function (){
    setInterval(
  function() {
    prevthumb($('#video').val());}, 
  100);
});
function prevthumb(input) {
    if($('#srcvideo').attr('src') != input){
  var htmlthumb = "<video id='vid-destaque' style='width:320px; height:180px;' muted loop><source id='srcvideo' src='" + input + "' type='video/mp4'></video>";
  document.getElementById("thumbprev").innerHTML = htmlthumb;
  document.getElementById('vid-destaque').play();
  }
}
</script>
<?php include('footer.php'); ?>