<?php include("navbar.php");
include("db/pdo.php");
ini_set('display_errors', 0);
?>
<style>
@media screen and (min-width: 2560px) {
  .wrap {
    margin-top: 225px;
    max-width: 1800px;
    min-height: 1800px;
  }
.titulovideo {
  position: relative;
  color: #525252;
  font-weight: 600;
  text-align: left;
  text-transform: uppercase;
  margin-bottom: 20px;
  font-size: 90px;
}
.descricao {
  margin-top: 20px;
  margin-bottom: 20px;
  font-size: 25px;
}
.tag {
  padding: 5px 10px 5px 10px;
  background-color: #525252;
  border-radius: 20px;
  color: white;
  font-size: 17px;
  margin-top: 20px !important;
  font-weight: 200;
  display: inline-block;
  margin-right: 5px;
}
}
@media screen and (min-width: 1920px) and (max-width:2559px) {
  .wrap {
    margin-top: 115px;
    min-height: 820px;
  }
.titulovideo {
  position: relative;
  color: #525252;
  font-weight: 600;
  text-align: left;
  text-transform: uppercase;
  margin-bottom: 20px;
  font-size: 60px;
}
.descricao {
  margin-top: 20px;
  margin-bottom: 20px;
  font-size: 15px;
}
.tag {
  padding: 5px 10px 5px 10px;
  background-color: #525252;
  border-radius: 20px;
  color: white;
  font-size: 10px;
  margin-top: 20px !important;
  font-weight: 200;
  display: inline-block;
  margin-right: 5px;
}
}
@media screen and (min-width: 1440px) and (max-width:1919px) {
  .wrap {
    margin-top: 125px;
    min-height: 640px;
  }
.titulovideo {
  position: relative;
  color: #525252;
  font-weight: 600;
  text-align: left;
  text-transform: uppercase;
  margin-bottom: 20px;
  font-size: 40px;
}
.descricao {
  margin-top: 20px;
  margin-bottom: 20px;
  font-size: 15px;
}
.tag {
  padding: 5px 10px 5px 10px;
  background-color: #525252;
  border-radius: 20px;
  color: white;
  font-size: 10px;
  margin-top: 20px !important;
  font-weight: 200;
  display: inline-block;
  margin-right: 5px;
}
}
@media screen and (min-width: 1024px) and (max-width:1439px) {
  .wrap {
    margin-top: 125px;
    min-height: 500px;
  }
.titulovideo {
  position: relative;
  color: #525252;
  font-weight: 600;
  text-align: left;
  text-transform: uppercase;
  margin-bottom: 20px;
  font-size: 35px;
}
.descricao {
  margin-top: 20px;
  margin-bottom: 20px;
  font-size: 15px;
}
.tag {
  padding: 5px 10px 5px 10px;
  background-color: #525252;
  border-radius: 20px;
  color: white;
  font-size: 10px;
  margin-top: 20px !important;
  font-weight: 200;
  display: inline-block;
  margin-right: 5px;
}
}
@media screen and (min-width: 768px) and (max-width:1023px) {
  .wrap {
    margin-top: 125px;
    min-height: 685px;
  }
.titulovideo {
  position: relative;
  color: #525252;
  font-weight: 600;
  text-align: left;
  text-transform: uppercase;
  margin-bottom: 20px;
  font-size:27px;
}
.descricao {
  margin-top: 20px;
  margin-bottom: 20px;
  font-size: 12px;
}
.tag {
  padding: 5px 10px 5px 10px;
  background-color: #525252;
  border-radius: 20px;
  color: white;
  font-size: 10px;
  margin-top: 20px !important;
  font-weight: 200;
  display: inline-block;
  margin-right: 5px;
}
}
@media screen and (min-width: 425px) and (max-width:767px) {
  .wrap {
    margin-top: 95px;
    min-height: 565px;
  }
.titulovideo {
  position: relative;
  color: #525252;
  font-weight: 600;
  text-align: left;
  text-transform: uppercase;
  margin-bottom: 20px;
}
.descricao {
  margin-top: 20px;
  margin-bottom: 20px;
  font-size: 12px;
}
.tag {
  padding: 5px 10px 5px 10px;
  background-color: #525252;
  border-radius: 20px;
  color: white;
  font-size: 8px;
  margin-top: 20px !important;
  font-weight: 200;
  display: inline-block;
  margin-right: 5px;
}
}
@media screen and (min-width: 375px) and (max-width:424px) {
  .wrap {
    margin-top: 95px;
    min-height: 460px;
  }
.titulovideo {
  position: relative;
  color: #525252;
  font-weight: 600;
  text-align: left;
  text-transform: uppercase;
  margin-bottom: 20px;
}
.descricao {
  margin-top: 20px;
  margin-bottom: 20px;
  font-size: 12px;
}
.tag {
  padding: 5px 10px 5px 10px;
  background-color: #525252;
  border-radius: 20px;
  color: white;
  font-size: 8px;
  margin-top: 20px !important;
  font-weight: 200;
  display: inline-block;
  margin-right: 5px;
}
}
@media screen and (min-width: 320px) and (max-width:374px) {
  .wrap {
    margin-top: 90px;
    min-height: 400px;
  }
.titulovideo {
  position: relative;
  color: #525252;
  font-weight: 600;
  text-align: left;
  text-transform: uppercase;
  margin-bottom: 20px;
}
.descricao {
  margin-top: 20px;
  margin-bottom: 20px;
  font-size: 12px;
}
.tag {
  padding: 5px 10px 5px 10px;
  background-color: #525252;
  border-radius: 20px;
  color: white;
  font-size: 8px;
  margin-top: 20px !important;
  font-weight: 200;
  display: inline-block;
  margin-right: 5px;
}
}
@media screen and (max-width:319px) {
  .wrap {
    margin-top: 85px;
    min-height: 400px;
  }
.titulovideo {
  position: relative;
  color: #525252;
  font-weight: 600;
  text-align: left;
  text-transform: uppercase;
  margin-bottom: 20px;
}
.descricao {
  margin-top: 20px;
  margin-bottom: 20px;
  font-size: 10px;
}
.tag {
  padding: 5px 10px 5px 10px;
  background-color: #525252;
  border-radius: 20px;
  color: white;
  font-size: 8px;
  margin-top: 20px !important;
  font-weight: 200;
  display: inline-block;
  margin-right: 5px;
}
}
</style>
<?php if (isset($_GET['id']) && $_GET['auto'] == true){
  $API_key    = "AIzaSyDRWKAPjDJL_LtBhMYoYrkwchXvwv4AIbA";
  $video = json_decode(file_get_contents("https://www.googleapis.com/youtube/v3/videos?key=$API_key&id=" . $_GET['id'] . "&part=snippet"));
  foreach($video->items as $item){
?>
<title><?=$item->snippet->title?></title>
<div class="container wrap" style="position:relative;">
    <div id="titulo" class="titulovideo" style="position:relative;"><?=$item->snippet->title?></div>
    <div style="position:relative;">
    <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?=$item->id?>?&enablejsapi=1&color=red&modestbranding=1&rel=0" allowfullscreen ></iframe>
</div>

<div class="descricao" style="position:relative;"><?=$item->snippet->description?></div>

<div style="margin-top:20px;font-size:10px;" style="position:relative;"><?php if(isset($item->snippet->tags)){foreach($item->snippet->tags as $tag)
{echo "<div class='tag'>" . $tag . "</div>";}}?></div>

</div>
  </div>
  <?php }} else if (isset($_GET['id']) && !isset($_GET['auto'])){
$checkvideo = $conn->query("SELECT * FROM videos WHERE videoid =" . "'" . $_GET['id'] . "'" )->fetchAll();
foreach($checkvideo as $video) {
?> 
<title><?=$video['titulo']?></title>
<div class="container wrap" style="position:relative;">
    <div id="titulo" class="titulovideo" style="position:relative;"><?=$video['titulo']?></div>
    <div style="position:relative;">
    <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?=$video['videoid']?>?&enablejsapi=1&color=red&modestbranding=1&rel=0" allowfullscreen ></iframe>
</div>

<div class="descricao" style="position:relative;"><?=$video['descricao']?></div>

<div style="margin-top:20px;font-size:10px !important" style="position:relative;"><?php if ($video['tags'] != "") {$tags = explode(",", $video['tags']); foreach($tags as $tag){
  echo "<div class='tag' style='cursor:pointer' onclick='tag(" . '"' . $tag . '"' .")'>" . $tag . "</div>";
}} ?></div>
</div>
  </div>
  <?php }} ?>
<?php include("script.php")?>
<script>
function tag(tag) {
var newForm = $('<form action="search.php" method="post"><input name="procura" type="text" value="#' + tag + '"></input></form>')
$(document.body).append(newForm);
    newForm.submit();
}
</script>
<?php include("footer.php")?>

