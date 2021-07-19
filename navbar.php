<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="favicon.png">
    <script data-ad-client="ca-pub-4258285538113407" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <meta name="google-signin-client_id" content="465818687920-sa8rvm4jjcu372q89338gf19oajpj6ui.apps.googleusercontent.com">
    <?php include("css.php")?>    
    <?php include("db/pdo.php")?>  
</head>


<body>
<nav id="navbar" class="navbar fixed-top navbar-light bg-white d-flex justify-content-center navdir" >
    <div class="container navegacao">
        <a class="hamburger hamburger--emphatic" type="button" data-toggle="collapse" href="#pesquisa" role="button" aria-expanded="false" aria-controls="pesquisa">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
        </a>
    <a class="navbar-brand mx-auto" href="https://ilovedourotv.com/"><img src="logo-i-love-douro-tv.png" class="logo" alt=""></a>
    <div class="nav-item google" style="cursor:pointer;"><i class="fab fa-google"></i></div>
    </div>
    <div class="collapse w-100 justify-content-center" id="pesquisa">
            <form action="search.php" method="post" class="md-form">
                <div class="d-flex align-content-center justify-content-center"><input id="procura" name='procura' class="procura" type="text" placeholder="Procurar"
                  aria-label="Search">
                <i class="fas fa-search" aria-hidden="true"></i></div>
            </form>
            <div class="container justify-content-center">
            <div class="row menucat1">
              <a href="search.php?c=videos" class='col-12 justify-content-center menucat2' style='color: black !important;'>Vídeos</a>
              <?php $categorias = $conn->query("SELECT * FROM categorias")->fetchAll();
              if (!$categorias){
              } else {
                foreach ($categorias as $categoria){
                echo "<a href='search.php?c=". $categoria['id'] ."'" . "class='col-12 justify-content-center menucat2' style='color: black !important;'>". $categoria['nome'] . "</a>";
              }
              }
              ?>
          </div>
        </div>
   </div>
</nav>
