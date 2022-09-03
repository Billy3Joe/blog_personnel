
<?php 
    session_start();
    
    $dbhost = "localhost";
    $dbname = "blog";
    $dbuser = 'root';
    $dbpswd = "";

  try {
      $db = new PDO("mysql:host=$dbhost;dbname=$dbname", 
      $dbuser, $dbpswd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  }catch(PDOException $e){

    echo "Une erreur est survenue lors de la connexion à la base de données : ". $e->getMessage();
  }

?>