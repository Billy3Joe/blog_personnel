<?php 
    //Fonction pour réccupérer tous les post de la bd
    function get_posts(){

        global $db;

       //Requête de reccpération de tous les posts
        $req = $db->query("

        SELECT * 
        FROM posts 
        WHERE posted ='1' 
        ORDER BY date  DESC
        
        ");

            //Stoquons les resultats dans un tableau
            $results = array();

        //Je parcourt les resultats de ma requête
        while ($rows = $req->fetchObject()){
            
            //Je ctock le contenu de la variable $row dans le tanleau $results
            $results[] = $rows;
        }

        return $results;
    }
?>