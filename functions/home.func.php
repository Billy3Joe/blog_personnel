<?php 
    //Fonction pour réccupérer tous les post de la bd
    function get_posts(){

        global $db;

       //Requête de reccpération de tous les posts
        $req = $db->query("

        SELECT  posts.id,
                posts.title,
                posts.image,
                posts.date,
                posts.content,
                admins.name
        FROM posts
        JOIN admins
        ON posts.writer=admins.email
        WHERE posted='1'
        ORDER BY date DESC
        LIMIT 0,2
    ");


            //Stoquons les resultats dans un tableau
            $results = array();

        //Je parcourt les resultats de ma requête
        while ($rows = $req->fetchObject()){

            //Je ctock le contenu de la variable $row dans le tableau $results
            $results[] = $rows;
        }

            return $results;
    }
?>