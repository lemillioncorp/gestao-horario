<!DOCTYPE html>
<html>
<head>
  
  <title>DIREÇÃO PEDAGÓGICA  - Timóteo Ulika</title>
  
  <?php

session_start();

           include_once ("../controller/dataset/data/dataset.php");
           global $pdo;

    include_once ("controller/control/menu/links-rel.php");
    ?>

  
</head>
<body>

    <?php
    include_once("controller/control/menu/menu-mn.php");
    ?>

<section class="engine"><a rel="external" href="#">#/</a></section><section class="mbr-section mbr-section-hero mbr-section-full mbr-parallax-background mbr-section-with-arrow" id="header1-1" style="background-image: url(assets/images/2-2000x1250.jpg);">

    

    <div class="mbr-table-cell">

        <div class="container">
            <div class="row">
                <div class="mbr-section col-md-10 col-md-offset-1 text-xs-center">

                    <h1 class="mbr-section-title display-1">DIREÇÃO PEDAGÓGICA<br><br></h1>
                    <p class="mbr-section-lead lead"></p>
                    <?php


 if (isset($_SESSION['idUser'])) {
               
                    
$sql = "SELECT nome_usuario, id_cargo, tipo_usuario  FROM usuario WHERE IDusuario = :identificacao";

$prepara = $pdo ->prepare($sql);
//Informe qual e' o dados
$cod = $_SESSION['idUser'];

$prepara  ->bindParam(':identificacao', $cod);
$prepara->execute();

$result = $prepara->fetchAll();

foreach ($result as  $value) {
    echo '<div class="dados-login">Nome do Usuário: '.$value['nome_usuario'].'<br> Cargo: ' .$value['tipo_usuario'].'<br><a class="sair" href="logaut.php">Sair</a></div><br>';
}
    
}
else{
    header("location: ../index.php");
}



?>
                   
                </div>
            </div>
        </div>
    </div>

    <section class="engine"><a rel="external" href="#"></a></section><script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/smooth-scroll.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/viewport-checker/jquery.viewportchecker.js"></script>
  <script src="assets/theme/js/script.js"></script>
  
  
  <input name="animation" type="hidden">

