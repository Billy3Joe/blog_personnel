
    <?php 
        // Créeons une variable post qui va être égale à notre fuction crée dan la page hom.func.php
        $post = get_post();

        if ($post == false) {
           header("Location:index.php?page=error");
        }else {
            ?>
                <div class="post">
    
                   <div>
                     <img src="img/posts/<?=$post->image?>" alt="<?=$post->title?>" height="350px" width="550px">
                   </div>

                   <div>
                       <h2><?= $post->title?></h2>
                       <h6>Par <?= $post->name ?> le <?= date("d/m/y à H:i", strtotime($post->date)); ?></h6>
                       <p><?= nl2br($post->content)?></p>
                   </div>

                </div>
                <style>
                    .post{
                        display: flex;
                        gap: 20px;
                        text-align: justify;
                    }
                </style>
         <?php
        }
    ?>
    <hr>

    <h4>Commentaires</h4>

        <?php
       
         // Créeons une variable post qui va être égale à notre fuction crée dan la page hom.func.php
         $responses = get_comments();

         //Je parcour les différents résultats
         //NB: null est pareil que false ie null = false et false = null
        if ($responses != null) {
            foreach ($responses as $response) {
                ?>
    
                <blockquote>
                        <strong>
                            <?= $response->name ?> 
                        </strong>
                        <?= date("d/m/y", strtotime($response->date));?>
                        <p><?= nl2br($response->comment) ?></p>
                </blockquote>  
    
                <?php
             }

        }else {

            echo "Aucun commentaire n'a été publié...Soyez le premier!";
        }

        ?>
        
    <h4>Commenter</h4>

<?php
if (isset($_POST['submit'])) {
//La fonction trim() permet de suprimer les espace
   $name = htmlspecialchars(trim($_POST['name']));
   $email = htmlspecialchars(trim($_POST['email']));
   $comment = htmlspecialchars(trim($_POST['comment']));
   //Stocquons tous les erreurs dans ce tableau vide $error[]
   $errors =[];

   if (empty($name) || empty($email) || empty($comment)) {

    $errors['empty'] = "Tous les champts n'ont pas été remplis";

   }else {

        //Nous utilisons la fonction filter_var() afin de férifier la validité de l'email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $errors['empty'] = "L'adresse email n'est pas valide";
        }

   }

   //Au cas ou la variable $error existe ie que c'est remplit
   if (!empty($errors)) {
       ?>
         <div class="card red">
           <div class="card-content white-text">

             <!-- Affichonstous les erreurs -->
             <?php 
               foreach ($errors as $error) {

                echo $error."<br>";

               }
             ?>
           </div>
         </div>
      <?php
   }else {
    //Au cas ou la variable $error n'existe pas ie que c'est vide
    //Insérons le commentaire dans la bd
    // die('ok');
    //J'appel la function comment($nom, $email, $comment);
    comment($name, $email, $comment);

    //Rédirigeons l'utilisateur vers la page post afin qu'il puisse voir son commentaire
    //Afin que l'utilisateur puisse voir son commentaire, faisons une rédirection en javascript
    ?>
        <script>
            window.location.replace("index.php?page=post&id= <?= $_GET['id']?>");
        </script>
    <?php
   }
}
?>
<form action="" method="POST">
   <div class="row">
    
        <div class="input-field col s12 m6">
            <input type="text" name="name" id="name">
            <label for="name">Nom</label>
        </div>

        <div class="input-field col s12 m6">
            <input type="email" name="email" id="email">
            <label for="email">Adresse email</label>
        </div>

        <div class="input-field col s12">
            <textarea name="comment" id="comment" class="materialize-textarea"></textarea>
            <label for="comment">Commentaire</label>
        </div>
        
        <div class="col s12">
            <button type="submit" name="submit" class="btn waves-effect">
                Commenter ce post
            </button>
        </div>
    </div>
</form>