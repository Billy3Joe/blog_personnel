<?php 
    //Fonction pour réccupérer tous les post de la bd
    function get_post(){

        global $db;

    //Requête de reccpération de tous les posts
        $req = $db->query("
         
            SELECT 
                posts.id,
                posts.title,
                posts.image,
                posts.content,
                posts.date,
                admins.name
            FROM posts
            INNER JOIN admins
            ON posts.name=admins.name
            WHERE posts.id='{$_GET['id']}'
            AND posts.posted = '1'

        ");


            //Vu qu'ici on a un seul resultat, la variable $results ne sera donnc pas un tableau
            // On va directement mettre notre resultat obtenu dans fetchObject();
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
    $sql = "INSERT INTO comments(name,email,comment,post_id,date) VALUES(:name, :email, :comment, :post_id, NOW())";
    $req = $db->prepare($sql);

     //Exécutons la requête en lui disant ce qu'elle utiliser pour exécuter $sql ie en faisant $req->execute($c);
    //On execute la requête en utilisant le tableau $c
    $req->execute($c);

}

    
?>