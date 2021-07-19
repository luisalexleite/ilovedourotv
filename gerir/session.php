<?php 
session_start();
include('../db/pdo.php');
$login = $conn->query('SELECT * FROM login WHERE id=1')->fetchAll();
if(isset($_POST['user']) && isset($_POST['password'])) {
foreach ($login as $session){
    echo $_POST['user'] . " " .  sha1($_POST['password']);
    if ($_POST['user'] == $session['utilizador'] and sha1($_POST['password']) == $session['passe']){
        $_SESSION['success'] = 'yes';
        header('Location: categorias.php');
    } else {
        session_destroy();
        header('Location: index.php?e=errado');
    }
}
} else {
    if($_SESSION['success'] != 'yes'){
        header('Location: index.php');
    }
}
