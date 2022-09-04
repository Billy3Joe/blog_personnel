<!-- Créons d'abord une fonction qui va permettre d'afficher le post -->
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
                posts.posted,
                admins.name
            FROM posts
            JOIN admins
            ON posts.writer = admins.email
            WHERE posts.id ='{$_GET['id']}'

        ");

             //Vu qu'ici on a un seul resultat, noue n'aurons pas besoin de parcourir le resultat dans un tableau et passer par la boucle while()
             // On va directement mettre notre resultat obtenu dans la variable $result puis appellé la fonction fetchObject();
            $result = $req->fetchObject();

            return $result;
    }

?>



<?php
    function edit($title,$content,$posted,$id){

        global $db;

        $e = [
            'title'     => $title,
            'content'   => $content,
            'posted'    => $posted,
            'id'        => $id
        ];

        //Requête de modification d'un article
        $sql = "UPDATE posts SET title=:title, content=:content, date=NOW(), posted=:posted WHERE id=:id";

        //On prépare notre requête
        $req = $db->prepare($sql);

        //On exécute notre requête en fonction du tableau $e (les données qui se trouvent dans le tableau $e)
        $req->execute($e);

    }