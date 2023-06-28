<?php 
   require_once 'vendor/autoload.php';
    require_once('models/campers.php');
   
  //require_once('config/Database.php');
    // se hace el llamado de las clases
    use App\Database;
    use Models\Campers;
   
    $db = new Database();
    $conn = $db -> getConnection('mysql'); //conexion con mysql

    //asiganmos una conexion activa para todos los modelos que se crearon 
    Campers::setConn($conn);

?>