<?php 
error_reporting(0);
include("navbar.php");
include("db/pdo.php");
?>
<style>
@media screen and (min-width: 2560px) {
  .cont {
    margin-top: 225px;
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
.linha{
    margin-top: 40px;
}
.descricao2 {
    color:#525252;
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
  .cont {
    margin-top: 115px;
    min-height: 820px;
  }
.linha{
    margin-top: 40px;
}
.titulovideo {
  position: relative;
  color: #525252;
  font-weight: 600;
  text-align: left;
  text-transform: uppercase;
  margin-bottom: 20px;
  font-size: 30px;
}
.descricao2 {
    color:#525252;
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
  .cont {
    margin-top: 125px;
    min-height: 640px;
  }
  .linha{
    margin-top: 40px;
}
.titulovideo {
  position: relative;
  color: #525252;
  font-weight: 600;
  text-align: left;
  text-transform: uppercase;
  margin-bottom: 20px;
  font-size: 20px;
}
.descricao2 {
    color:#525252;
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
  .cont {
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
  font-size: 30px;
}
.linha{
    margin-top: 40px;
}
.descricao2 {
    color:#525252;
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
  .cont {
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
  font-size:18px;
}
.linha{
    margin-top: 40px;
}
.descricao2 {
    color:#525252;
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
  .cont {
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
  font-size: 15px;
}
.descricao2 {
display:none;
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
.linha{
    margin-top: 40px;
}
.linha:hover > .col-4 > .play{
    display: flex;
    justify-content: center;
    align-items: center;
    width:100%;
    top:0;
    left: 0px;
    position: absolute;
    height: 100%;
}
.linha:hover > .col-4 > .play > i{
    font-size:30px;
    display:block !important;
}
.botao-play {
    display:none;
}
}
@media screen and (min-width: 375px) and (max-width:424px) {
  .cont {
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
  font-size: 12px;
}
.descricao2 {
display:none;
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
.linha{
    margin-top: 40px;
}
.linha:hover > .col-4 > .play{
    display: flex;
    justify-content: center;
    align-items: center;
    width:100%;
    top:0;
    left: 0px;
    position: absolute;
    height: 100%;
}
.linha:hover > .col-4 > .play > i{
    font-size:20px;
    display:block !important;
}
.botao-play {
    display:none;
}
}
@media screen and (min-width: 320px) and (max-width:374px) {
  .cont {
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
  font-size:9px;
}
.descricao2 {
display:none;
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
.linha{
    margin-top: 40px;
}
.linha:hover > .col-4 > .play{
    display: flex;
    justify-content: center;
    align-items: center;
    width:100%;
    top:0;
    left: 0px;
    position: absolute;
    height: 100%;
}
.linha:hover > .col-4 > .play > i{
    font-size:20px;
    display:block !important;
}
.botao-play {
    display:none;
}
}
@media screen and (max-width:319px) {
  .cont {
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
  font-size:9px;
}
.descricao2 {
display:none;
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
.linha{
    margin-top: 40px;
}
.linha:hover > .col-4 > .play{
    display: flex;
    justify-content: center;
    align-items: center;
    width:100%;
    top:0;
    left: 0px;
    position: absolute;
    height: 100%;
}
.linha:hover > .col-4 > .play > i{
    font-size:20px;
    display:block !important;
}
.botao-play {
    display:none;
}
}
@media screen and (min-width: 768px) and (max-width:991px) {
    .texto{
        height:118.13px;
        overflow:hidden;
    }
    .linha:hover > .col-4 > .play {
    position: absolute;
    width:210px;
    height:118.13px;
    background-color: rgba(200, 0, 0, 50%);
    z-index:1;
    top:0;
    left: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.linha:hover > .col-4 > .play > i{
    font-size:50px;
    display:block !important;
}
.botao-play {
    display:none;
}
}
@media screen and (min-width: 992px) and (max-width:1200px) {
    .texto{
        height:163.11px;
        overflow:hidden;
    }
    .linha:hover > .col-4 > .play {
    position: absolute;
    width:289.98px;
    height:163.11px;
    background-color: rgba(200, 0, 0, 50%);
    z-index:1;
    top:0;
    left: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.linha:hover > .col-4 > .play > i{
    font-size:50px;
    display:block !important;
}
.botao-play {
    display:none;
}
}
@media screen and (min-width: 1201px) {
    .texto{
        height:180px;
        overflow:hidden;
    }
    .linha:hover > .col-4 > .play {
    position: absolute;
    width:320px;
    height:180px;
    background-color: rgba(200, 0, 0, 50%);
    z-index:1;
    top:0;
    left: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.linha:hover > .col-4 > .play > i{
    font-size:50px;
    display:block !important;
}
.botao-play {
    display:none;
}
}
</style>
<div class="container cont">
<?php 
if($_GET['c'] == 'videos' and !isset($_POST['procura'])){
  $videos = $conn->query("SELECT * FROM videos ORDER BY data DESC, hora DESC");
} else if ($_GET['c'] != 'videos' and !isset($_POST['procura'])){
  $videos = $conn->query("SELECT videos.videoid, videos.thumb, videos.titulo, videos.descricao FROM (videos LEFT JOIN programas ON videos.programa = programas.id) WHERE videos.categoria ='" . $_GET['c'] . "' OR programas.categoria ='" . $_GET['c'] . "'  ORDER BY data DESC, hora DESC");
} else if (isset($_POST['procura'])) {
  if (substr($_POST['procura'], 0, 1) === "#"){
  $procura = substr($_POST['procura'], 1);
  $videos = $conn->query("SELECT * FROM videos  WHERE tags LIKE '%" . $procura . "%' ORDER BY data DESC, hora DESC");
} else  {
  $videos = $conn->query("SELECT * FROM videos  WHERE titulo LIKE '%" . $_POST['procura'] . "%' ORDER BY data DESC, hora DESC");
}
}
if(isset($videos)){
foreach($videos as $video){ ?>
<a href="video.php?id=<?=$video['videoid']?>">
<div class="row linha">
<div class="col-4" style="position:relative;"><img style="max-width:100%; height:auto;" src="<?=$video['thumb']?>"><div class="play"><i class="fas fa-play botao-play" style="color:white;"></i></div></div>
<div class="col-8"><div class="d-flex texto" style="flex-direction:column"><div class="titulovideo"><?=$video['titulo']?></div><div class="descricao2"><?=$video['descricao']?></div></div></div>
</div>
</a>
<?php }} ?>
</div>
<?php include("footer.php")?>
<?php include("script.php")?>