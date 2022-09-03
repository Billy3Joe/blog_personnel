<?php 
    function inTable($table){

        global $db;

        $query = $db->query("SELECT COUNT(id) FROM $table");
        
        return $nombre = $query->fetch();
    }

    function getColor($table, $colors){
       //Vérifions s'il y'a dans le tableau l'indes de la table
       //Si une couleur a été affectée à une tab
       if (isset($colors[$table])){

          return $colors[$table];

       }else{

        //Si une table à été rétiré dans le tableau $colors, la fonction  va retourner une couleur par défaut
        return "orange";
       }
    }

    

    function get_comments(){
    
        global $db;

        $req = $db->query("
        
            SELECT comments.id,
                   comments.name,
                   comments.email,
                   comments.date,
                   comments.post_id,
                   comments.comment,
                   posts.title

            FROM comments
            JOIN posts
            ON comments.post_id = posts.id
            WHERE comments.seen = '0'
            ORDER BY comments.date ASC
        
            ");

        //Stoquons les resultats dans un tableau
        $results = [];

        while ($rows = $req->fetchObject()) {
        
            $results[] = $rows;

        }

        return $results;

     }
    
?>