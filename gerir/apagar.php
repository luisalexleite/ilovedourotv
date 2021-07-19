<?php 
include('../db/pdo.php');
if ($_GET['c'] == 'categorias') {
    $delcategoria = "DELETE FROM categorias WHERE id = ?";
    try
{
    $conn->prepare($delcategoria)->execute([$_GET['id']]);                            
}
catch (Exception $e) 
{
     header("location:categorias.php?erro=apagar");
}
if (isset($e)){}else {
    header("location:categorias.php");
}
} elseif ($_GET['c'] == 'videos'){
    $delvideo = "DELETE FROM videos WHERE id = ?";
    try
{
    $conn->prepare($delvideo)->execute([$_GET['id']]);                            
}
catch (Exception $e) 
{
     header("location:videos.php?erro=apagar");
}
if (!isset($e)){
    header("location:videos.php");
}
} elseif ($_GET['c'] == 'programa'){
    $delprograma = "DELETE FROM programas WHERE id = ?";
    try
{
    $conn->prepare($delprograma)->execute([$_GET['id']]);                            
}
catch (Exception $e) 
{
     header("location:programas.php?erro=apagar");
}
if (!isset($e)){
    header("location:programas.php");
}
}
?>