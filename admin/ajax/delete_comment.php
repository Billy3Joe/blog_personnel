<?php
    //Incluons la bd
    require "../../functions/main-function.php";
    
    //Faisons une requête pour update la db afin de mettre la colone seen à 1
    $db->exec("DELETE FROM comments WHERE id='{$_POST['id']}'");
    //NB: Cet id qui se trouve dans $_POST a été définit dépuis la page dashboard.func.js
    
?>