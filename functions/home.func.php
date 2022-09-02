<?php 
//Fonction pour réccupérer tous les post de la bd
function get_posts(){

    global $db;
   //Requête de reccpération de tous les posts
    $req = $db->query("
        SELECT * FROM posts;  
        SELECT 
            posts.id,
            posts.title,
            posts.image,
            posts.date,
            posts.content,
            admins.name
        FROM posts
        INNER JOIN admins
        ON posts.name=admins.name
        WHERE posted ='1'
        ORDER BY date DESC
        LIMIT 0,2; 

    ");

    //Stoquons les resultats dans un tableau
    $results = array();

    //Je parcourt les resultats de ma requête
    while ($rows = $req->fetchObject()){
        $results[] = $rows;
    }
    return $results;
}
?>