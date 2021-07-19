<footer>
  <div id="footer" class="d-flex align-items-center justify-content-center footer1">
<div class="container">
  <div class="row">
    <div class="col-lg-2 d-flex align-items-center justify-content-center margin"><a target="_blank" href="https://ilovedouro.pt/"><img src="logo-i-love-douro.png" class="logo" alt=""></a></div>
<?php $termos = $conn->query("SELECT * FROM disclaimers WHERE id=1")->fetchAll();
foreach ($termos as $termo){?>
    <div class="col-lg-8 d-flex align-items-center justify-content-center margin footer2" ><span><a target="_blank" style="color:white" href="<?=$termo['contactos']?>">CONTACTOS</a> | <a target="_blank" style="color:white" href="<?=$termo['termos']?>">TERMOS E CONDIÇÕES</a> | <a target="_blank" style="color:white" href="<?=$termo['ficha']?>">FICHA TÉCNICA</a></span><span>Copyright &copy; 2020. Todos os Direitos Reservados. I LOVE DOURO e I LOVE DOURO TV.</span></sp></div>
<?php }?>
    <div class="col-lg-2 d-flex align-items-center justify-content-center margin footer3"><a class="marginright10" target="_blank" href="https://www.youtube.com/user/theilovedouro"><i class="fab fa-youtube"></i></a><a class="marginright10" target="_blank" href="https://twitter.com/ilovedouro"><i class="fab fa-twitter"></i></a><a class="marginright10" target="_blank" href="https://www.facebook.com/ilovedouro"><i class="fab fa-facebook-f"></i></a><a class="marginright10" target="_blank" href="https://www.instagram.com/ilovedouro/?hl=pt"><i class="fab fa-instagram"></i></a></div>
  </div>
</div>
  </div>
</footer>