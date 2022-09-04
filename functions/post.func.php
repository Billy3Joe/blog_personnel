<?php 
    //Fonction pour réccupérer un post sélectionné par l'utilisateur de la bd
    function get_post(){

        global $db;

    //Requête de reccpération toutes les données du post en question ainsi que le nom de l'admin
        $req = $db->query("
         
            SELECT 
                posts.id,
                posts.title,
                posts.image,
                posts.content,
                posts.date,
                admins.name
            FROM posts
            JOIN admins
            ON posts.writer = admins.email
            WHERE posts.id ='{$_GET['id']}'
            AND posts.posted = '1'

        ");

            //Vu qu'ici on a un seul resultat, noue n'aurons pas besoin de parcourir le resultat dans un tableau et passer par la boucle while()
             // On va directement mettre notre resultat obtenu dans la variable $result puis appellé la fonction fetchObject();
            $result = $req->fetchObject();

            return $result;
    }


   
//Fonction pour commenter un post avec paramètres
function comment($name,$email,$comment){

    global $db;

    //Méttons tous nos informations dant un tableau
    $c = array(
        'name'      => $name,
        'email'     => $email,
        'comment'   => $comment,
        'post_id'   => $_GET["id"]

    );

    //Faisons une requête préparée
    //NOW() nous permet d'avoir la date actuelle
    $sql = "INSERT INTO comments(name,email,comment,post_id,date) 
            VALUES(:name, :email, :comment, :post_id, NOW())";
            
    $req = $db->prepare($sql);

     //Exécutons la requête en lui disant ce qu'elle utiliser pour exécuter $sql ie en faisant $req->execute($c);
    //On execute la requête en utilisant le tableau $c
    $req->execute($c);

}


    //Fonction pour réccupérer tous les commentaires d'un post de la bd
    function get_comments(){

        global $db;

    //Requête de reccpération de tous les posts
        $req = $db->query("
         
           SELECT * 
           FROM comments 
           WHERE post_id = '{$_GET['id']}' 
           ORDER BY date DESC
                
        ");

        //Stoquons les resultats dans un tableau
        // $results = array();
        $results = [];
        
        //Je parcourt les resultats de ma requête
        while ($rows = $req->fetchObject()){
            
            //Je ctock le contenu de la variable $row dans le tanleau $results
            $results[] = $rows;
        }

            return $results;
    }
?>