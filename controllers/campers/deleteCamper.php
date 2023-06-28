<?php 
    require_once ('../../app.php');
    use Models\Campers;
    $miCamper = new Campers();
    $miCamper->deleteData($_GET['idCamper']); 
    header('location:../../views/camper/listarCamper.php');
?>