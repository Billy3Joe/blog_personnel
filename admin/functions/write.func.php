<?php

function post($title, $content, $posted){

    global $db;

 //Nous allons stocker tous ces variables (données) dans le tableau $p
  $p = [

     'titre'    => $title,
     'content'  => $content,
     'writer'   => $_SESSION['admin'],
     'posted'   => $posted
    
];

//Requête d'insertion de l'article dans la  bd sans image mais avec le checkbox pour rendre public ou non représenter par $posted
//NB: La date est appellé automatiquement avec la fonction NOW()

$sql =" 
       INSERT INTO posts(title, content, writer, date, posted)
       VALUES(:title, :content, :writer, NOW(), :posted)
      ";

    //Préparons notre requête $sql
    $req = $db->prepare($sql);

    //Exécutons notre requête
    $req->execute();

    //Réccupérons le dernier id que nous avons mis en bd en utilisant la fonction lastInsertId();
    $id = $db->lastInsertId($sql);

    //Rédirigeons vers la page post du dernier post  qui a été inséré dans la bd
    header("Location: index.php?page=post&id=".$id);


}

?>