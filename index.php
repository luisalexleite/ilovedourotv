<?php 
error_reporting(0);
include("navbar.php");
include("db/pdo.php");
$destaques = $conn->query("SELECT * FROM destaque WHERE id = 1");
foreach ($destaques as $destaque) {
?>
<title>I Love Douro TV - Página Inicial</title>
<div class="invisivel"></div>
<a href ="<?=$destaque['link']?>">
<div id="destaque" class="destaquevideo">
  <video id="vid-destaque" style="width:100%" muted loop>
    <source src="<?=$destaque['video']?>" type="video/mp4">
  </video>
<span class="d-flex pricipal1" style="justify-content:flex-end;">
  <span id="titulo" class="principal2"><?=$destaque['titulo']?></span>
  <span id="titulo" class="principal3"><?=$destaque['descricao']?>
  </span>
</span>
</div>
<div id="titulo" class="principal4"><?=$destaque['descricao']?>
</div>
</a>
<a class="circulo"><i style="color:white" class="fas fa-chevron-down"></i></a>
<a class="scrolltop"><i style="color:white" class="fas fa-chevron-up"></i></a>
<?php }?>
<div id="ultimos" class="container-fluid padding-default">
<div class="d-flex justify-content-center" style="width:100%"><div id="categorias">Últimos Vídeos</div></div>
<div class="owl-carousel owl-theme padding-alt" id="ultimos-display">
<?php 
$maxResults = 4;

$videoList = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$channelID.'&maxResults='.$maxResults.'&key='.$API_key));

foreach($videoList->items as $item){
  if(isset($item->id->videoId)){
$checkvideo = $conn->query("SELECT * FROM videos WHERE videoid =" . "'" . $item->id->videoId . "'" )->fetchAll(); 
    if (!$checkvideo){?>
<a href="video.php?id=<?=$item->id->videoId?>&auto=true" class="item"><img src="https://img.youtube.com/vi/<?=$item->id->videoId?>/mqdefault.jpg" class="img-responsive">
    <span class="titulo titulo1"><span class="padding20"><?=$item->snippet->title?></span></span>
    <span class="descricao texto1"><span class="padding20"><?php if($item->snippet->description == ""){echo "Sem descrição";} else { $str = $item->snippet->description; if (strlen($str) > 103)
   $str = substr($str, 0, 100) . '...'; echo $str; }?></span></span></a>
    <?php } else { foreach($checkvideo as $video){?>
      <a href="video.php?id=<?=$video['videoid']?>" class="item"><img src="<?=$video['thumb']?>" class="img-responsive">
      <span class="titulo titulo1"><span class="padding20"><?=$video['titulo']?></span></span>
      <span class="descricao texto1"><span class="padding20"><?=$video['resumo']?></span></span></a>
    <?php }}?>
 <?php }}?>
</div>
</div>
</div>
<?php
$checkprog = $conn->query("SELECT * FROM programas")->fetchAll();
if(!$checkprog){}
else {?>  
<div class="container-fluid padding-default">
<div class="d-flex justify-content-center" style="width:100%"><div id="categorias" style="margin-bottom: 20px;">Programas</div></div>
  <div style="background-image: linear-gradient(to bottom right, #525252, white);">
  <div class="owl-carousel owl-theme padding-alt padding20" id="programas-carrosel">
<?php foreach($checkprog as $programa){?>
  <a href="programa.php?id=<?=$programa['id']?>" class="item2"><img src="<?=$programa['thumb']?>" class="img-responsive">
      <span class="titulo tituloprog"><span class="padding20"><?=$programa['nome']?></span></span></a>
<?php }echo "</div></div></div>";}?>
<?php $checkcat = $conn->query("SELECT * FROM categorias WHERE ativo = 1")->fetchAll();
if(!$checkcat){
} else {
  foreach ($checkcat as $cat){
    $i = $i + 1
?>
<div id="categoria" class="container-fluid padding-default">
<div class="d-flex justify-content-center" style="width:100%"><div id="categorias"><?=$cat['nome']?></div></div>
  <div class="owl-carousel owl-theme padding-alt categorias" id="categoria-carrosel<?=$i?>">
    <!--CORRIGIR SETAS-->
<?php $checkvideocat = $conn->query("SELECT videos.videoid, videos.thumb, videos.titulo, videos.resumo FROM (videos LEFT JOIN programas ON videos.programa = programas.id) WHERE videos.categoria ='" . $cat['id'] . "' OR programas.categoria ='" . $cat['id'] . "'  ORDER BY data DESC, hora DESC")->fetchAll();
if(!$checkvideocat) {echo "Oops! Sem videos nesta categoria.";} else { foreach($checkvideocat as $video) {?>
    <a href="video.php?id=<?=$video['videoid']?>" class="item"><img src="<?=$video['thumb']?>" class="img-responsive">
      <span class="titulo titulo1"><span class="padding20"><?=$video['titulo']?></span></span>
      <span class="descricao texto1"><span class="padding20"><?=$video['resumo']?></span></span></a>
<?php }}?>
</div>
</div>
<?php }} ?>
<?php include("footer.php")?>
<?php include("script.php")?>
</body>
</html>