
<?php

    function post($title,$content,$posted){

        global $db;

    //Nous allons stocker tous ces variables (données) dans le tableau $p
        $p = [
            'title'     =>  $title,
            'content'   =>  $content,
            'writer'    =>  $_SESSION['admin'],
            'posted'    =>  $posted

        ];

        //Requête d'insertion de l'article dans la  bd sans image mais avec le checkbox pour rendre public ou non représenter par $posted
    //NB: La date est appellé automatiquement avec la fonction NOW()
        $sql = "
        INSERT INTO posts(title,content,writer,date,posted)
        VALUES(:title,:content,:writer,NOW(),:posted)
        ";

        //Préparons notre requête $sql
        $req = $db->prepare($sql);

        //Exécutons notre requête
        $req->execute($p);
    

    }

    function post_img($tmp_name, $extension){

        global $db;

        //Réccupérons le dernier id que nous avons inséré en bd en utilisant la fonction lastInsertId();
        $id = $db->lastInsertId();

        //Nous allons stocker tous ces variables (données) dans le tableau $p
        $i = [
            'id'    =>  $id,
            'image' =>  $id.$extension      //$id = 25 , $extension = .jpg      $id.$extension = "25".".jpg" = 25.jpg
        ];

        
        //La ou l'id correspond à l'article, nous allons changer la colone image qui sera par défaut post.png par image
        //Pour le faire, nous allons faire une requête de modification UPDATE
        $sql = "UPDATE posts SET image = :image WHERE id = :id";

        //Préparons notre requête sql en utilisant le tableau $i
        $req = $db->prepare($sql);

        //Exécutons notre requête sql en utilisant le tableau $i
        $req->execute($i);

        //Uploadons notre image dans le dossier posts qui se trouve dans img en utilisant la fonction move_uploaded_file()
        move_uploaded_file($tmp_name,"../img/posts/".$id.$extension);

        //On redirige l'utilisateur vers la page du post en question  qui a été inséré dans la bd
        header("Location:index.php?page=post&id=".$id);
    }