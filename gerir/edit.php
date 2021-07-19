<?php 
include('../db/pdo.php');
if ($_GET['c'] == 'categorias' and !isset($_GET['ativo'])) {
if ($_POST['nome'] != "") {
$selectcategoria = $conn->query("SELECT * FROM categorias WHERE nome ='" . $_POST['nome'] . "'")->fetchAll();
if(!$selectcategoria){
    $editarcategoria = "UPDATE categorias SET nome = ? WHERE id = ?";
    try
{
    $conn->prepare($editarcategoria)->execute([$_POST['nome'], $_GET['id']]);                            
}
catch (Exception $e) 
{
     header("location:categorias.php?erro=editar");
}
if (isset($e)){}else {
    header("location:categorias.php");
}
} else {
    header("location:categorias.php?erro=editduplicacao");
}
} else {
    header("location:categorias.php?erro=nulo");
}
}
elseif($_GET['c'] == 'novovideo') {
    $API_key    = "AIzaSyDRWKAPjDJL_LtBhMYoYrkwchXvwv4AIbA";
    $video = json_decode(file_get_contents("https://www.googleapis.com/youtube/v3/videos?key=$API_key&id=" . $_GET['id'] . "&part=snippet"));
foreach($video -> items as $item){?>

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
    .novosvideos {
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
.titulo {
 width: 100%;
}
.resumo {
 width: 100%;
 min-height: 30px !important;
 resize: none;
}
.seccao{
    margin-bottom: 13px;
    margin-top: 17px;
}
.fancybox-slide--iframe .fancybox-content {
    width  : 800px;
    height : 600px;
    max-width  : 80%;
    max-height : 80%;
    margin: 0;
}
</style>
</head>
<?php include('nav.php'); ?>
<form method="post" action="adicionar.php?c=novovideo&id=<?=$_GET['id']?>">
<div class="seccao col-12 d-flex">
        <div class="d-flex" style="flex-direction: column; width:100%">
        <div class="d-flex align-items-center" style="width:100%; height: 40px; background-color:#e92829; color:white;">&nbsp;Thumbnail</div>
        <div class="container-fluid" style="width:100%; border: solid black 1px;">
        <div class="row">
            <div class="col-md-6 col-12" id="thumbprev" style="margin-top:10px; margin-bottom:10px; text-align: center;"><img style="width:320px; height:180px; border:1px solid black" src="https://img.youtube.com/vi/<?=$_GET['id']?>/mqdefault.jpg"></div>
            <div class="col-md-6 col-12" style="margin-top:10px; margin-bottom:10px;"><div style="height:100%" class="d-flex align-items-center justify-content-center"><a href="../vendor/responsivefilemanager/filemanager/dialog.php?type=1&amp;field_id=thumb&amp;relative_url=0&amp;multiple=0" class="thumb-btn add-btn"><i class="fas fa-sync-alt"></i>&nbsp;Alterar Thumbnail</a><input name="thumb" id="thumb" type="text" value="https://img.youtube.com/vi/<?=$_GET['id']?>/mqdefault.jpg" hidden></div></div></div>
        </div>
    </div>
</div></div>
<div class="seccao col-12 d-flex">
        <div class="d-flex" style="flex-direction: column; width:100%">
        <div class="d-flex align-items-center" style="width:100%; height: 40px; background-color:#e92829; color:white;">&nbsp;Título</div>
        <div style="width:100%"><input name="titulo" class='titulo' type="text" value="<?=$item->snippet->title?>"></div>
    </div></div>
<?php $datahora = explode('T',$item->snippet->publishedAt); $data = date("d/m/Y", strtotime($datahora[0])); $hora = substr($datahora[1], 0, -1); ?>
    <div class="seccao col-12 d-flex">
        <div class="d-flex" style="flex-direction: column; width:100%">
        <div class="d-flex align-items-center" style="width:100%; height: 40px; background-color:#e92829; color:white;">&nbsp;Data/Hora de Publicação</div>
        <div class="container-fluid" style="width:100%; border: solid black 1px;">
        <div class="row">
            <div class="col-md-6 col-12" id="thumbprev" style="margin-top:10px; margin-bottom:10px; text-align: center;">Data:&nbsp;<input id="data" name="data" type="text" value="<?=$data?>"></div>
            <div class="col-md-6 col-12" style="margin-top:10px; margin-bottom:10px;"><div style="height:100%" class="d-flex align-items-center justify-content-center">Hora:&nbsp;<input id="hora" name="hora" type="text" value="<?=$hora?>"></div></div></div></div>
        </div>
    </div>
</div></div>
    <?php if($item->snippet->description == ""){echo "Sem descrição";} else { $str = $item->snippet->description; 
    if (strlen($str) > 103) {
   $str = substr($str, 0, 100) . '...';}?>
    <div class="seccao col-12 d-flex">
        <div class="d-flex" style="flex-direction: column;width:100%">
        <div class="d-flex align-items-center" style="width:100%; height: 40px; background-color:#e92829; color:white;">&nbsp;Resumo</div>
        <div style="width:100%"><textarea name="resumo" class="resumo" maxlength="103"><?=$str?></textarea></div>
    </div></div>
    <div class="col-12 d-flex">
        <div class="d-flex" style="flex-direction: column;width:100%">
        <div class="d-flex align-items-center" style="width:100%; min-height: 40px; background-color:#e92829; color:white;">&nbsp;Descrição</div>
        <div style="width:100%"><textarea name="descricao" id="descricao" class="descricao"><?=$item->snippet->description?></textarea></div>
   </div></div>
   <?php $tags = "";
   foreach ($item->snippet->tags as $tag) {
       $tags = $tags . $tag . ",";
   }
   $tags = substr($tags, 0, -1);?>
   <div class="seccao col-12 d-flex">
        <div class="d-flex" style="flex-direction: column;width:100%">
        <div class="d-flex align-items-center" style="width:100%; height: 40px; background-color:#e92829; color:white;">&nbsp;Tags</div>
        <div style="width:100%"><input name="tags" id="tags" type="text" value="<?=$tags?>"></div>
   </div></div>
   <?php $categorias = $conn->query("SELECT * FROM categorias")->fetchAll();?>
<div class="cathide">
   <div  class="seccao col-12 d-flex">
        <div class="d-flex" style="flex-direction: column;width:100%">
        <div class="d-flex align-items-center" style="width:100%; height: 40px; background-color:#e92829; color:white;">&nbsp;Categoria</div>
<?php if (!$categorias) {?>
    <div class="d-flex align-items-center categorias"  style="width:100%; min-height: 30px; color:black; border: 1px solid black !important;" ><span>&nbsp;Deve adicionar&nbsp;<a href="categorias.php">categorias</a>&nbsp;ou&nbsp;<a href="programas.php">programas</a>&nbsp;à base dados antes de adicionar videos à plataforma.</span></div>
    </div></div>
<?php } else {?>
<div style="width:100%"><select name="categoria" style="width:100%"><?php foreach ($categorias as $categoria) {?><option value="<?=$categoria['id']?>"><?=$categoria['nome']?></option><?php } ?></select></div>
   </div></div>
</div>
<?php }?>
<div class="seccao col-12 d-flex">
        <div class="d-flex" style="flex-direction: column; width:100%">
        <div class="d-flex align-items-center" style="width:100%; height: 40px; background-color:#e92829; color:white;">&nbsp;Programa</div>
        <div class="container-fluid" style="width:100% !important; border: 1px solid black; min-height:40px;"><div class="row"><div class="col-lg-4 col-md-12 d-flex align-items-center" style="margin-top:10px; margin-bottom:10px;">Programa:&nbsp;
            <select onchange="cathide()" name="programa" id="programa">
                <?php $programas = $conn->query("SELECT * FROM programas")->fetchAll(); 
                if (!$programas) {?>
                <option selected value=null>Nenhuma opção disponível</option>
                <?php } else { ?>
                <option selected value=null>Nenhum Selecionado...</option>
                <?php foreach ($programas as $programa){?>
                <option value="<?=$programa['id']?>"><?=$programa['nome']?></option>
               <?php }
             }?>
            </select>
        </div><div class="col-lg-4 col-md-12 d-flex align-items-center" style="margin-top:10px; margin-bottom:10px;">Temporada:&nbsp; <input name="temporada" style="width:42px;" min="1" type="number"></div><div class="col-lg-4 col-md-12 d-flex align-items-center" style="margin-top:10px; margin-bottom:10px;">Episodio:&nbsp; <input name="episodio" style="width:42px;" min="1" type="number"></div></div></div>
</div></div>

<div class="d-flex col-12 seccao" style="flex-direction:row-reverse"><button style="border: none; margin-left:10px;" onclick="window.history.back()" type="button" class="add-btn">Cancelar</button><button style="border: none;" type="submit" class="add-btn">Adicionar Video</button></div>
</form>

<?php include("js.php")?>
<script>
var $hamburger = $(".hamburger");
var $nav = $(".pri");
    $hamburger.on("click", function(e) {
      $hamburger.toggleClass("is-active");
      $nav.toggleClass("ativo");
    });

    function resizeInput() {
    $(this).attr('size', $(this).val().length);
}

$('.titulo')
    // event handler
    .keyup(resizeInput)
    // resize on page load
    .each(resizeInput);

CKEDITOR.replace('descricao', {
      width: '100%',
      language: 'pt'
    });

 $('#tags').tagsInput({
  placeholder:'Adicione aqui tags...'
 });
 function fancybox(){
	$('.thumb-btn').fancybox({
		'width'	: 880,
		'height'	: 570,
		'type'	: 'iframe',
		'autoSize' : false});
}
fancybox();
$(document).ready(function (){
setInterval(
  function() {
    prevthumb($('#thumb').val());
  }, 
  100);
$('#data').mask('00/00/0000');
$('#hora').mask('00:00:00');
});

function prevthumb(input) {
  var htmlthumb = "<img id='thumbprev' style='width:320px; height:180px;border:1px solid black;' src=" + input + "></img>";
  document.getElementById("thumbprev").innerHTML = htmlthumb;
}
function cathide() {
var e = document.getElementById("programa").value;
if (e == "null"){
    $(".cathide").show();
    } else {
    $(".cathide").hide();
    }
}
</script>
<?php
 include('footer.php');
?>
<?php
}}} elseif ($_GET['c'] == 'categorias' and isset($_GET['ativo'])) {
    $editarcategoria2 = "UPDATE categorias SET ativo = ? WHERE id = ?";
    $conn->prepare($editarcategoria2)->execute([$_GET['ativo'], $_GET['id']]);
    header("location:categorias.php");
} elseif($_GET['c'] == 'videos') {
include('css.php');
include('../db/pdo.php');
    $videos = $conn->query("SELECT * FROM videos WHERE id='" . $_GET['id'] . "'"); 
    ?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    .videos {
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
.titulo {
 width: 100%;
}
.resumo {
 width: 100%;
 min-height: 30px !important;
 resize: none;
}
.seccao{
    margin-bottom: 13px;
    margin-top: 17px;
}
.fancybox-slide--iframe .fancybox-content {
    width  : 800px;
    height : 600px;
    max-width  : 80%;
    max-height : 80%;
    margin: 0;
}
</style>
</head>
<?php include('nav.php'); 
foreach ($videos as $video) {
if($video){?>
<form method="post" action="adicionar.php?c=videos&id=<?=$_GET['id']?>">
<div class="seccao col-12 d-flex">
        <div class="d-flex" style="flex-direction: column; width:100%">
        <div class="d-flex align-items-center" style="width:100%; height: 40px; background-color:#e92829; color:white;">&nbsp;Thumbnail</div>
        <div class="container-fluid" style="width:100%; border: solid black 1px;">
        <div class="row">
            <div class="col-md-6 col-12" id="thumbprev" style="margin-top:10px; margin-bottom:10px; text-align: center;"><img style="width:320px; height:180px; border:1px solid black" src="<?=$video['thumb']?>"></div>
            <div class="col-md-6 col-12" style="margin-top:10px; margin-bottom:10px;"><div style="height:100%" class="d-flex align-items-center justify-content-center"><a href="../vendor/responsivefilemanager/filemanager/dialog.php?type=1&amp;field_id=thumb&amp;relative_url=0&amp;multiple=0" class="thumb-btn add-btn"><i class="fas fa-sync-alt"></i>&nbsp;Alterar Thumbnail</a><input name="thumb" id="thumb" type="text" value="<?=$video['thumb']?>" hidden></div></div></div>
        </div>
    </div>
</div></div>
<div class="seccao col-12 d-flex">
        <div class="d-flex" style="flex-direction: column; width:100%">
        <div class="d-flex align-items-center" style="width:100%; height: 40px; background-color:#e92829; color:white;">&nbsp;Título</div>
        <div style="width:100%"><input name="titulo" class='titulo' type="text" value="<?=$video['titulo']?>"></div>
    </div></div>
<?php $data = date("d/m/Y", strtotime($video['data'])); $hora = $video['hora']; ?>
    <div class="seccao col-12 d-flex">
        <div class="d-flex" style="flex-direction: column; width:100%">
        <div class="d-flex align-items-center" style="width:100%; height: 40px; background-color:#e92829; color:white;">&nbsp;Data/Hora de Publicação</div>
        <div class="container-fluid" style="width:100%; border: solid black 1px;">
        <div class="row">
            <div class="col-md-6 col-12" id="thumbprev" style="margin-top:10px; margin-bottom:10px; text-align: center;">Data:&nbsp;<input id="data" name="data" type="text" value="<?=$data?>"></div>
            <div class="col-md-6 col-12" style="margin-top:10px; margin-bottom:10px;"><div style="height:100%" class="d-flex align-items-center justify-content-center">Hora:&nbsp;<input id="hora" name="hora" type="text" value="<?=$hora?>"></div></div></div></div>
        </div>
    </div>
</div></div>
    <div class="seccao col-12 d-flex">
        <div class="d-flex" style="flex-direction: column;width:100%">
        <div class="d-flex align-items-center" style="width:100%; height: 40px; background-color:#e92829; color:white;">&nbsp;Resumo</div>
        <div style="width:100%"><textarea name="resumo" class="resumo" maxlength="103"><?=$video['resumo']?></textarea></div>
    </div></div>
    <div class="col-12 d-flex">
        <div class="d-flex" style="flex-direction: column;width:100%">
        <div class="d-flex align-items-center" style="width:100%; min-height: 40px; background-color:#e92829; color:white;">&nbsp;Descrição</div>
        <div style="width:100%"><textarea name="descricao" id="descricao" class="descricao"><?=$video['descricao']?></textarea></div>
   </div></div>
   <?php $tags = "";
   if(isset($video['tags'])){
   foreach (explode(",", $video['tags']) as $tag) {
       $tags = $tags . $tag . ",";
   }}
   $tags = substr($tags, 0, -1);?>
   <div class="seccao col-12 d-flex">
        <div class="d-flex" style="flex-direction: column;width:100%">
        <div class="d-flex align-items-center" style="width:100%; height: 40px; background-color:#e92829; color:white;">&nbsp;Tags</div>
        <div style="width:100%"><input name="tags" id="tags" type="text" value="<?=$tags?>"></div>
   </div></div>
   <?php $categorias = $conn->query("SELECT * FROM categorias")->fetchAll();?>
<div class="cathide">
   <div  class="seccao col-12 d-flex">
        <div class="d-flex" style="flex-direction: column;width:100%">
        <div class="d-flex align-items-center" style="width:100%; height: 40px; background-color:#e92829; color:white;">&nbsp;Categoria</div>
<?php if (!$categorias) {?>
    <div class="d-flex align-items-center categorias"  style="width:100%; min-height: 30px; color:black; border: 1px solid black !important;" ><span>&nbsp;Deve adicionar&nbsp;<a href="categorias.php">categorias</a>&nbsp;ou&nbsp;<a href="programas.php">programas</a>&nbsp;à base dados antes de adicionar videos à plataforma.</span></div>
    </div></div>
<?php } else {?>
<div style="width:100%"><select name="categoria" style="width:100%">
<?php foreach ($categorias as $categoria) { if ($categoria['id'] == $video['categoria']){?><option value="<?=$categoria['id']?>" selected><?=$categoria['nome']?></option><?php } else {?> <option value="<?=$categoria['id']?>" ><?=$categoria['nome']?></option> <?php } ?>
<?php } ?>
</select></div></div></div></div></div></div>
<?php } ?>
<div class="seccao col-12 d-flex">
        <div class="d-flex" style="flex-direction: column; width:100%">
        <div class="d-flex align-items-center" style="width:100%; height: 40px; background-color:#e92829; color:white;">&nbsp;Programa</div>
        <div class="container-fluid" style="width:100% !important; border: 1px solid black; min-height:40px;"><div class="row"><div class="col-lg-4 col-md-12 d-flex align-items-center" style="margin-top:10px; margin-bottom:10px;">Programa:&nbsp;
            <select onchange="cathide()" name="programa" id="programa">
                <?php $programas = $conn->query("SELECT * FROM programas")->fetchAll(); 
                if (!$programas){echo "<option selected value='null'>Nenhuma opção disponível</option>";} 
                else {
                    if($video['programa'] == NULL) {echo "<option selected value='null'>Nenhuma opção selecionada</option>";
                        foreach($programas as $programa){ echo "<option value='".$programa['id'] ."'>".$programa['nome'] ."</option>";}
                    }
                else {echo "<option value='null'>Nenhuma opção selecionada</option>";
                foreach($programas as $programa){
                    if ($programa['id'] == $video['programa']){echo "<option selected value='".$programa['id'] ."'>".$programa['nome'] ."</option>";} 
                    else { echo "<option value='".$programa['id'] ."'>".$programa['nome'] ."</option>";}
                    }
                    }
                    }?>
            </select>
        </div><div class="col-lg-4 col-md-12 d-flex align-items-center" style="margin-top:10px; margin-bottom:10px;">Temporada:&nbsp; <input name="temporada" style="width:42px;" min="1" type="number" value="<?php if(isset($video['temporada'])){ echo $video['temporada'];}?>"></div><div class="col-lg-4 col-md-12 d-flex align-items-center" style="margin-top:10px; margin-bottom:10px;">Episodio:&nbsp; <input style="width:42px;" name="episodio" min="1" type="number" value="<?php if(isset($video['episodio'])){echo $video['episodio'];}?>"></div></div></div>
</div></div>

<div class="d-flex col-12 seccao" style="flex-direction:row-reverse"><button style="border: none; margin-left:10px;" onclick="window.history.back()" type="button" class="add-btn">Cancelar</button><button style="border: none;" type="submit" class="add-btn">Concluir Alteração</button></div>
</form>

<?php include("js.php")?>
<script>
var $hamburger = $(".hamburger");
var $nav = $(".pri");
    $hamburger.on("click", function(e) {
      $hamburger.toggleClass("is-active");
      $nav.toggleClass("ativo");
    });

    function resizeInput() {
    $(this).attr('size', $(this).val().length);
}

$('.titulo')
    // event handler
    .keyup(resizeInput)
    // resize on page load
    .each(resizeInput);

CKEDITOR.replace('descricao', {
      width: '100%',
      language: 'pt'
    });

 $('#tags').tagsInput({
  placeholder:'Adicione aqui tags...'
 });
 function fancybox(){
	$('.thumb-btn').fancybox({
		'width'	: 880,
		'height'	: 570,
		'type'	: 'iframe',
		'autoSize' : false});
}
fancybox();
$(document).ready(function (){
setInterval(
  function() {
    prevthumb($('#thumb').val());
  }, 
  100);
$('#data').mask('00/00/0000');
$('#hora').mask('00:00:00');
});

function prevthumb(input) {
  var htmlthumb = "<img id='thumbprev' style='width:320px; height:180px;border:1px solid black;' src=" + input + "></img>";
  document.getElementById("thumbprev").innerHTML = htmlthumb;
}
function cathide() {
var e = document.getElementById("programa").value;
if (e == "null"){
    $(".cathide").show();
    } else {
    $(".cathide").hide();
    }
}
$(document).ready(function(){
    cathide();
})
</script>
<?php
}}} elseif ($_GET['c'] == "programa" && isset($_GET['n']) && $_GET['n'] == "novo"){
    include('css.php');?>
    <!DOCTYPE html>
    <html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
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
        .programas {
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
    .titulo {
     width: 100%;
    }
    .resumo {
     width: 100%;
     min-height: 30px !important;
     resize: none;
    }
    .seccao{
        margin-bottom: 13px;
        margin-top: 17px;
    }
    .fancybox-slide--iframe .fancybox-content {
        width  : 800px;
        height : 600px;
        max-width  : 80%;
        max-height : 80%;
        margin: 0;
    }
    </style>
    </head>
    <?php include('nav.php');?>
    <form method="post" action="adicionar.php?c=programa&n=novo">
    <div class="seccao col-12 d-flex">
            <div class="d-flex" style="flex-direction: column; width:100%">
            <div class="d-flex align-items-center" style="width:100%; height: 40px; background-color:#e92829; color:white;">&nbsp;Thumbnail</div>
            <div class="container-fluid" style="width:100%; border: solid black 1px;">
            <div class="row">
                <div class="col-md-6 col-12" id="thumbprev" style="margin-top:10px; margin-bottom:10px; text-align: center;"><img style="width:200px; height:300px; border:1px solid black" src="<?=((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http"). "://". @$_SERVER['HTTP_HOST'] . "/imagens/thumbnails/programas/default.png"?>" alt="Teste"></div>
                <div class="col-md-6 col-12" style="margin-top:10px; margin-bottom:10px;"><div style="height:100%" class="d-flex align-items-center justify-content-center"><a href="../vendor/responsivefilemanager/filemanager2/dialog.php?type=1&amp;field_id=thumb&amp;relative_url=0&amp;multiple=0" class="thumb-btn add-btn"><i class="fas fa-sync-alt"></i>&nbsp;Alterar Thumbnail</a><input name="thumb" id="thumb" type="text" value="<?=((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http"). "://". @$_SERVER['HTTP_HOST'] . "/imagens/thumbnails/programas/default.png"?>" hidden></div></div></div>
            </div>
        </div>
    </div></div>
    <div class="seccao col-12 d-flex">
            <div class="d-flex" style="flex-direction: column; width:100%">
            <div class="d-flex align-items-center" style="width:100%; height: 40px; background-color:#e92829; color:white;">&nbsp;Nome</div>
            <div style="width:100%"><input name="nome" class='titulo' type="text"></div>
        </div></div>
        <div class="col-12 d-flex">
            <div class="d-flex" style="flex-direction: column;width:100%">
            <div class="d-flex align-items-center" style="width:100%; min-height: 40px; background-color:#e92829; color:white;">&nbsp;Descrição</div>
            <div style="width:100%"><textarea name="descricao" id="descricao" class="descricao"></textarea></div>
       </div></div>
       <div class="seccao col-12 d-flex">
            <div class="d-flex" style="flex-direction: column;width:100%">
            <div class="d-flex align-items-center" style="width:100%; height: 40px; background-color:#e92829; color:white;">&nbsp;Tags</div>
            <div style="width:100%"><input name="tags" id="tags" type="text"></div>
       </div></div>
       <?php $categorias = $conn->query("SELECT * FROM categorias")->fetchAll();?>
    <div class="cathide">
       <div  class="seccao col-12 d-flex">
            <div class="d-flex" style="flex-direction: column;width:100%">
            <div class="d-flex align-items-center" style="width:100%; height: 40px; background-color:#e92829; color:white;">&nbsp;Categoria</div>
    <?php if (!$categorias) {?>
        <div class="d-flex align-items-center categorias"  style="width:100%; min-height: 30px; color:black; border: 1px solid black !important;" ><span>&nbsp;Deve adicionar&nbsp;<a href="categorias.php">categorias</a>&nbsp;ou&nbsp;<a href="programas.php">programas</a>&nbsp;à base dados antes de adicionar um programa à plataforma.</span></div>
        </div></div>
    <?php } else {?>
    <div style="width:100%"><select name="categoria" style="width:100%"><?php foreach ($categorias as $categoria) { echo "<option value='" . $categoria['id'] ."'>" . $categoria['nome'] . "</option>"; } ?></select></div>
       </div></div>
    </div>
    <?php }?>
    <div class="d-flex col-12 seccao" style="flex-direction:row-reverse"><button style="border: none; margin-left:10px;" onclick="window.history.back()" type="button" class="add-btn">Cancelar</button><button style="border: none;" type="submit" class="add-btn">Adicionar Programa</button></div>
    </form>
    
    <?php include("js.php")?>
    <script>
    var $hamburger = $(".hamburger");
    var $nav = $(".pri");
        $hamburger.on("click", function(e) {
          $hamburger.toggleClass("is-active");
          $nav.toggleClass("ativo");
        });
    
        function resizeInput() {
        $(this).attr('size', $(this).val().length);
    }
    
    $('.titulo')
        // event handler
        .keyup(resizeInput)
        // resize on page load
        .each(resizeInput);
    
    CKEDITOR.replace('descricao', {
          width: '100%',
          language: 'pt'
        });
    
     $('#tags').tagsInput({
      placeholder:'Adicione aqui tags...'
     });
     function fancybox(){
        $('.thumb-btn').fancybox({
            'width'	: 880,
            'height'	: 570,
            'type'	: 'iframe',
            'autoSize' : false});
    }
    fancybox();
    $(document).ready(function (){
    setInterval(
      function() {
        prevthumb($('#thumb').val());
      }, 
      100);
    $('#data').mask('00/00/0000');
    $('#hora').mask('00:00:00');
    });
    
    function prevthumb(input) {
      var htmlthumb = "<img id='thumbprev' style='width:200px; height:300px;border:1px solid black;' src=" + input + "></img>";
      document.getElementById("thumbprev").innerHTML = htmlthumb;
    }
    function cathide() {
    var e = document.getElementById("programa").value;
    if (e == "null"){
        $(".cathide").show();
        } else {
        $(".cathide").hide();
        }
    }
    </script>
<?php } elseif($_GET['c'] == "programa" && !isset($_GET['n'])){
include('css.php');
include('../db/pdo.php');
$programas = $conn->query("SELECT * FROM programas WHERE id ='" . $_GET['id'] . "'");
foreach ($programas as $programa) {
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    .programas {
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
.titulo {
 width: 100%;
}
.resumo {
 width: 100%;
 min-height: 30px !important;
 resize: none;
}
.seccao{
    margin-bottom: 13px;
    margin-top: 17px;
}
.fancybox-slide--iframe .fancybox-content {
    width  : 800px;
    height : 600px;
    max-width  : 80%;
    max-height : 80%;
    margin: 0;
}
</style>
</head>
<?php include('nav.php');?>
<form method="post" action="adicionar.php?c=programa&id=<?=$_GET['id']?>">
<div class="seccao col-12 d-flex">
        <div class="d-flex" style="flex-direction: column; width:100%">
        <div class="d-flex align-items-center" style="width:100%; height: 40px; background-color:#e92829; color:white;">&nbsp;Thumbnail</div>
        <div class="container-fluid" style="width:100%; border: solid black 1px;">
        <div class="row">
            <div class="col-md-6 col-12" id="thumbprev" style="margin-top:10px; margin-bottom:10px; text-align: center;"><img style="width:200px; height:300px; border:1px solid black" src="<?=$programa['thumb']?>" alt="Teste"></div>
            <div class="col-md-6 col-12" style="margin-top:10px; margin-bottom:10px;"><div style="height:100%" class="d-flex align-items-center justify-content-center"><a href="../vendor/responsivefilemanager/filemanager2/dialog.php?type=1&amp;field_id=thumb&amp;relative_url=0&amp;multiple=0" class="thumb-btn add-btn"><i class="fas fa-sync-alt"></i>&nbsp;Alterar Thumbnail</a><input name="thumb" id="thumb" type="text" value="<?=$programa['thumb']?>" hidden></div></div></div>
        </div>
    </div>
</div></div>
<div class="seccao col-12 d-flex">
        <div class="d-flex" style="flex-direction: column; width:100%">
        <div class="d-flex align-items-center" style="width:100%; height: 40px; background-color:#e92829; color:white;">&nbsp;Nome</div>
        <div style="width:100%"><input value="<?=$programa['nome']?>" name="nome" class='titulo' type="text"></div>
    </div></div>
    <div class="col-12 d-flex">
        <div class="d-flex" style="flex-direction: column;width:100%">
        <div class="d-flex align-items-center" style="width:100%; min-height: 40px; background-color:#e92829; color:white;">&nbsp;Descrição</div>
        <div style="width:100%"><textarea name="descricao" id="descricao" class="descricao"><?=$programa['descricao']?></textarea></div>
   </div></div>
   <div class="seccao col-12 d-flex">
        <div class="d-flex" style="flex-direction: column;width:100%">
        <div class="d-flex align-items-center" style="width:100%; height: 40px; background-color:#e92829; color:white;">&nbsp;Tags</div>
        <div style="width:100%"><input value="<?=$programa['tags']?>" name="tags" id="tags" type="text"></div>
   </div></div>
   <?php $categorias = $conn->query("SELECT * FROM categorias")->fetchAll();?>
<div class="cathide">
   <div  class="seccao col-12 d-flex">
        <div class="d-flex" style="flex-direction: column;width:100%">
        <div class="d-flex align-items-center" style="width:100%; height: 40px; background-color:#e92829; color:white;">&nbsp;Categoria</div>
<?php if (!$categorias) {?>
    <div class="d-flex align-items-center categorias"  style="width:100%; min-height: 30px; color:black; border: 1px solid black !important;" ><span>&nbsp;Deve adicionar&nbsp;<a href="categorias.php">categorias</a>&nbsp;ou&nbsp;<a href="programas.php">programas</a>&nbsp;à base dados antes de adicionar um programa à plataforma.</span></div>
    </div></div>
<?php } else {?>
<div style="width:100%"><select name="categoria" style="width:100%">
<?php foreach ($categorias as $categoria) { 
    if ($categoria['id'] == $programa['categoria']){?><option value="<?=$categoria['id']?>" selected><?=$categoria['nome']?></option>
    <?php } else { ?> <option value="<?=$categoria['id']?>" ><?=$categoria['nome']?></option><?php }} ?>
</select>
</div>
   </div></div>
</div>
<?php }?>
<div class="d-flex col-12 seccao" style="flex-direction:row-reverse"><button style="border: none; margin-left:10px;" onclick="window.history.back()" type="button" class="add-btn">Cancelar</button><button style="border: none;" type="submit" class="add-btn">Adicionar Programa</button></div>
</form>

<?php include("js.php")?>
<script>
var $hamburger = $(".hamburger");
var $nav = $(".pri");
    $hamburger.on("click", function(e) {
      $hamburger.toggleClass("is-active");
      $nav.toggleClass("ativo");
    });

    function resizeInput() {
    $(this).attr('size', $(this).val().length);
}

$('.titulo')
    // event handler
    .keyup(resizeInput)
    // resize on page load
    .each(resizeInput);

CKEDITOR.replace('descricao', {
      width: '100%',
      language: 'pt'
    });

 $('#tags').tagsInput({
  placeholder:'Adicione aqui tags...'
 });
 function fancybox(){
    $('.thumb-btn').fancybox({
        'width'	: 880,
        'height'	: 570,
        'type'	: 'iframe',
        'autoSize' : false});
}
fancybox();
$(document).ready(function (){
setInterval(
  function() {
    prevthumb($('#thumb').val());
  }, 
  100);
$('#data').mask('00/00/0000');
$('#hora').mask('00:00:00');
});

function prevthumb(input) {
  var htmlthumb = "<img id='thumbprev' style='width:200px; height:300px;border:1px solid black;' src=" + input + "></img>";
  document.getElementById("thumbprev").innerHTML = htmlthumb;
}
function cathide() {
var e = document.getElementById("programa").value;
if (e == "null"){
    $(".cathide").show();
    } else {
    $(".cathide").hide();
    }
}
</script>
<?php }} elseif($_GET['c'] == "disclaimers") {
    $editardisclaimers = "UPDATE disclaimers SET contactos=?, termos=?, ficha = ? WHERE id = 1";
    try
{
    $conn->prepare($editardisclaimers)->execute([$_POST['contactos'], $_POST['termos'], $_POST['ficha']]);                            
}
catch (Exception $e) 
{
     header("location:disclaimers.php?erro=editar");
} 
header("location:disclaimers.php?s=sucesso");
} elseif($_GET['c'] == "destaque") {
    $editardestaque = "UPDATE destaque SET titulo=?, descricao=?, link = ?, video = ? WHERE id = 1";
    try
{
    $conn->prepare($editardestaque)->execute([$_POST['titulo'], $_POST['descricao'], $_POST['link'], $_POST['video']]);                            
}
catch (Exception $e) 
{
     header("location:destaque.php?erro=editar");
} 
header("location:destaque.php?s=sucesso");
}
else{ echo "Erro: Nada Encontrado.";}
 include('footer.php');