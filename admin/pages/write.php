<h2>Poster un article</h2>

<?php 

 if (isset($_POST['post'])) {
  $title = htmlspecialchars(trim($_POST['title']));
  $content =htmlspecialchars(trim($_POST['content']));
  //$title =htmlspecialchars(trim($_POST['title']));
  //die(var_dump($_POST));

  //Concernant la checkbox
  $posted = isset($_POST['submit']) ? "1" : "0";

  $errors = [];

    if (empty($title) || empty($content)) {

        $errors['empty'] = "Veiller remplir tous les champs";
    }

    //Concernant les images
    //Voyons s'il est vide

    if (!empty($_FILES['image']['name'])) {

        $file = $_FILES['image']['name'];

        //Créons un tableau avec toutes les extentions possible acceptables
        $extensions = ['.png','.jpg','.jpeg','.gif','.PNG','.JPG','.JPEG','.GIF'];

        //Réccupérons l'extention du fichier
        $extension = strrchr($file,'.');
        //die($extension);

        //Vérifions si cette  extension ie $extension se trouve dans le tableau $extensions ci-dessus
        if(!in_array($extension,$extensions)){
            //Au cas ou cette image ne se trouve pas dans le tableau, on affiche l'erreur suivante
            $errors['image'] = "Cette image n'est pas valable";
        }
    }

    //Si les erreurs existent ie si les variables $errors existent bel et bien alors
    if(!empty($errors)){
        ?>
            <div class="card red">
                <div class="card-content white-text">
                    <?php
                        foreach($errors as $error){
                            echo $error."<br/>";
                        }
                    ?>
                </div>
            </div>
        <?php
 
    //Au cas ou il n'ya pas d'erreurs, ont envoit l'image dans la bd
    }else{
        //Appel de la fonction post() codée dans le fichier post.func.php 
        //Il s'agit du post sans image mais avec le checkbox pour rendre public ou non représenter par $posted
        post($title,$content,$posted);

       
    }
}

?>

<form method="post" enctype="multipart/form-data">
    <div class="row">

        <div class="input-field col s12">
            <input type="text" name="title" id="title"/>
            <label for="title">Titre de l'article</label>
        </div>

        <div class="input-field col s12">
            <textarea name="content" id="content" class="materialize-textarea"></textarea>
            <label for="content">Contenu de l'article</label>
        </div>
        <div class="col s12">
            <div class="input-field">
                <div class="btn col s2">
                    <span>Image de l'article</span>
                    <input type="file" name="image" class="col s12"/>
                </div>
                  <!-- readfile permet que l'utilisateur ne puisse pas modifier le nom du fichier qu'il a sélectionné -->
                <input type="text" class="file-path col s10" readonly/>
            </div>
        </div>

        <div class="col s6">
            <p>Public</p>
            <div class="switch">
                <label>
                    Non
                    <input type="checkbox" name="public"/>
                    <span class="lever"></span>
                    Oui
                </label>
            </div>
        </div>

        <div class="col s6 right-align">
            <br/><br/>
            <button class="btn" type="submit" name="post">Publier</button>
        </div>

    </div>

</form>