<?php 
include('../db/pdo.php');
if ($_GET['c'] == 'categorias') {
    $selectcategoria = $conn->query("SELECT * FROM categorias WHERE nome ='" . $_POST['categoria'] . "'")->fetchAll();
    if(!$selectcategoria){
        $inserircategoria = "INSERT INTO categorias (nome) VALUES (?)";
        if($_POST['categoria'] != ""){
        $conn->prepare($inserircategoria)->execute([$_POST['categoria']]);
        header("location:categorias.php");
    } else {
        header("location:categorias.php?erro=nulo");
    }
}
    else {
        header("location:categorias.php?erro=duplicacao");
    }
    
} elseif($_GET['c'] == 'novovideo'){
    $selectvideo = $conn->query("SELECT * FROM videos WHERE videoid ='" . $_GET['id'] . "'")->fetchAll();
    if(!$selectvideo){
        $id = $_GET['id'];
        $data = date("Y-m-d",strtotime(str_replace('/', '-', $_POST['data'])));
        $hora = $_POST['hora'];

        function validateDate($date, $format)
        {
            $d = DateTime::createFromFormat($format, $date);
            return $d && $d->format($format) == $date;
        }
        if(validateDate($_POST['data'], 'd/m/Y') == false){
            header("location:edit.php?c=novovideo&id=" . $_GET['id']. "&erro=datainvalida");
        } elseif (validateDate($hora, 'H:i:s') == false){
            header("location:edit.php?c=novovideo&id=" . $_GET['id']. "&erro=horainvalida");
        }
        $titulo = $_POST['titulo'];
        $thumb = $_POST['thumb'];
        $resumo = $_POST['resumo'];
        $descricao = $_POST['descricao'];
        $tags = $_POST['tags'];
        if($titulo == "" || $resumo == "" ||$descricao == ""){
            header("location:edit.php?c=novovideo&id=" . $_GET['id']. "&erro=camposvazios");
        }
if((!isset($_POST['categoria'])) && $_POST['programa'] == "null") {
    header("location:edit.php?c=novovideo&id=" . $_GET['id']. "&erro=nocategoria");
} 
if($_POST['programa'] != "null") {
        $programa = $_POST['programa'];
        if(isset($_POST['episodio']) && $_POST['temporada']) {
        $episodio = $_POST['episodio'];
        $temporada = $_POST['temporada'];
        $inserirvideo = "INSERT INTO videos (videoid, data, hora, titulo, thumb, resumo, descricao, tags, programa, episodio, temporada) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $conn->prepare($inserirvideo)->execute([$id, $data, $hora, $titulo, $thumb, $resumo, $descricao, $tags, $programa, $episodio, $temporada]);
        header("location:videos.php?s=sucesso");
    } else {
        header("location:edit.php?c=novovideo&id=" . $_GET['id']. "&erro=epinaodefinida");
    }
} else {
    if(isset($_POST['categoria'])) {
        $categoria = $_POST['categoria'];
        $inserirvideo = "INSERT INTO videos (videoid, data, hora, titulo, thumb, resumo, descricao, tags, categoria) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $conn->prepare($inserirvideo)->execute([$id, $data, $hora, $titulo, $thumb, $resumo, $descricao, $tags, $categoria]);
        header("location:videos.php?s=sucesso");
    }
}
}
    else {
        header("location:edit.php?c=novovideo&id=" . $_GET['id']. "&erro=duplicacao");
    }
} elseif($_GET['c'] == 'videos'){
        $data = date("Y-m-d",strtotime(str_replace('/', '-', $_POST['data'])));
        $hora = $_POST['hora'];

        function validateDate($date, $format)
        {
            $d = DateTime::createFromFormat($format, $date);
            return $d && $d->format($format) == $date;
        }
        if(validateDate($_POST['data'], 'd/m/Y') == false){
            header("location:edit.php?c=videos&id=" . $_GET['id']. "&erro=datainvalida");
        } elseif (validateDate($hora, 'H:i:s') == false){
            header("location:edit.php?c=videos&id=" . $_GET['id']. "&erro=horainvalida");
        }
        $titulo = $_POST['titulo'];
        $thumb = $_POST['thumb'];
        $resumo = $_POST['resumo'];
        $descricao = $_POST['descricao'];
        $tags = $_POST['tags'];
        if($titulo == "" || $resumo == "" ||$descricao == ""){
            header("location:edit.php?c=videos&id=" . $_GET['id']. "&erro=camposvazios");
        }
if((!isset($_POST['categoria'])) && $_POST['programa'] == "null") {
    header("location:edit.php?c=videos&id=" . $_GET['id']. "&erro=nocategoria");
}
if($_POST['programa'] != "null") {
    $programa = $_POST['programa'];
    if(isset($_POST['episodio']) && $_POST['temporada']) {
    $episodio = $_POST['episodio'];
    $temporada = $_POST['temporada'];
    $editarvideo = "UPDATE videos SET data =?, hora=?, titulo = ?, thumb = ?, resumo = ?, descricao = ?, tags = ?, programa = ?, episodio = ?, temporada = ? WHERE id = ?";
    try
{
$conn->prepare($editarvideo)->execute([$data, $hora, $titulo, $thumb, $resumo, $descricao, $tags, $programa, $episodio, $temporada, $_GET['id']]);                            
}
catch (Exception $e) 
{
 header("location:videos.php?erro=editar");
} 
if (!isset($e)){
header("location:videos.php?s=altsucesso");
}
} else {
    header("location:edit.php?c=videos&id=" . $_GET['id']. "&erro=epinaodefinida");
}
} else {
    if(isset($_POST['categoria'])) {
        $categoria = $_POST['categoria'];
        $editarvideo = "UPDATE videos SET data =?, hora=?, titulo = ?, thumb = ?, resumo = ?, descricao = ?, tags = ?, categoria = ?, programa = NULL, episodio = NULL, temporada = NULL WHERE id = ?";
        try
{
    $conn->prepare($editarvideo)->execute([$data, $hora, $titulo, $thumb, $resumo, $descricao, $tags, $categoria, $_GET['id']]);                            
}
catch (Exception $e) 
{
     header("location:videos.php?erro=editar");
} 
if (!isset($e)){
    header("location:videos.php?s=altsucesso");
}
    }}
} elseif ($_GET['c'] == "programa" && isset($_GET['n']) && $_GET['n'] == 'novo'){
    $selectprograma = $conn->query("SELECT * FROM programas WHERE nome ='" . $_POST['nome'] . "'")->fetchAll();
    if(!$selectprograma){
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $thumb = $_POST['thumb'];
        $tags = $_POST['tags'];
        if($nome == "" ||$descricao == ""){
            header("location:edit.php?c=programa&n=novo&erro=camposvazios");
        } else {
if((!isset($_POST['categoria']))) {
    header("location:edit.php?c=programa&n=novo&erro=nocategoria");
} else{
        $categoria = $_POST['categoria'];
        $inserirprograma = "INSERT INTO programas (nome, thumb, tags, descricao, categoria) VALUES (?, ?, ?, ?, ?)";
        $conn->prepare($inserirprograma)->execute([$nome, $thumb, $tags, $descricao, $categoria]);
        header("location:programas.php?s=sucesso");
    }}
} else {
        header("location:edit.php?c=programa&n=novo&erro=duplicacao");
    }
} elseif ($_GET['c'] == "programa" && !isset($_GET['n'])) {
    $selectprograma = $conn->query("SELECT * FROM programas WHERE id != " . $_GET['id'] . " AND nome =" . "'" . $_POST['nome'] . "'")->fetchAll();
    if(!$selectprograma){
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $thumb = $_POST['thumb'];
        $tags = $_POST['tags'];
        if($nome == "" ||$descricao == ""){
            header("location:edit.php?c=programa&id=" . $_GET['id']. "&erro=camposvazios");
        } else {
if((!isset($_POST['categoria']))) {
    header("location:edit.php?c=programa&id=" . $_GET['id']. "&erro=nocategoria");
} else{
        $categoria = $_POST['categoria'];
        $editarprograma = "UPDATE programas SET nome=?, thumb=?, tags=?, descricao=?, categoria=? WHERE id =?";
        try
{
    $conn->prepare($editarprograma)->execute([$nome, $thumb, $tags, $descricao, $categoria, $_GET['id']]);                            
}
catch (Exception $e) 
{
     header("location:edit.php?c=programa&id=" . $_GET['id']. "&erro=editar");
} 
if (!isset($e)){
    header("location:programas.php?s=altsucesso");
}
    }}
} else {
        header("location:edit.php?c=programa&id=" . $_GET['id']. "&erro=duplicacao");
    }
}

?>