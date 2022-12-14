    <?php 
        // Appelons la fonction post en la stoquant dans la variable $post crée dan la page post.func.php
        $post = get_post();

       //Vérifions si notre variable $post est bien définie
        if ($post == false) {
          //Au cas ou elle n'est pas définie
           header("Location:index.php?page=error");
           
        }else {
            //Au cas ou elle est définie
            ?>
            <div class="post">
        
                    <div>
                        <img class="image" src="../img/posts/<?=$post->image?>" alt="<?=$post->title?>" height="670px" width="1070px">
                    </div>

                    <div>
                       <?php
                            //CONCERNANT LA MODIFICATION DE L'ARTICLE
                            //Vérifions si l'utilisateur click sur le bouton submit
                            if(isset($_POST['submit'])){
                                //Réccupérons les données envoyées par l'utilisateur dans des différentes variables
                                $title = htmlspecialchars(trim($_POST['title']));
                                $content = htmlspecialchars(trim($_POST['content']));
                                $posted = isset($_POST['public']) ? "1" : "0";
                                $errors = [];

                                if(empty($title) || empty($content)){
                                    $errors['empty'] = "Veuillez remplir tous les champs";
                                }
                                
                                //Au cas ou les erreurs existent
                                if(!empty($errors)){
                                    ?>
                                    <!-- On affiche les erreurs existantes avec la boucle foreach -->
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

                            //Au cas ou il n'y a pas d'erreurs
                            }else{
                                //On modifie notre article en appellant la fonction edit() crée dans le dossier fonction
                                edit($title,$content,$posted,$_GET['id']);

                                ?>
                                    <!-- Rédirigeons l'utilisateur vers la page post de l'article en question -->
                                    <script>
                                        window.location.replace("index.php?page=post&id=<?= $_GET['id'] ?>");
                                    </script>
                                <?php
                            }


                        }

                    ?>


                <form action="" method="post">
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" name="title" id="title" value="<?=$post->title?>" />
                            <label for="title">Titre de l'article</label>
                        </div>

                        <!-- Lorsque nous voulons modifier le contenu d'un se trouvant dans un textarea en php, on ne met jamais la fonction nl2br() dans une balise textarea-->
                        <div class="input-field col s12">
                            <textarea name="content" id="content" class="materialize-textarea" style="text-align:justify;">
                                <?=htmlspecialchars($post->content)?>
                            </textarea>
                            <label for="content">Contenu de l'article</label>
                        </div>

                        <div class="col s6" style="padding: 30px;">
                            <p>Public</p>
                            <div class="switch">
                                <label>
                                    Non
                                    <!--Condition ternaire pour checker ie cocher automatiqument la checkbox en passant au vert de chaque article qui sont postés en privés -->
                                    <input type="checkbox" name="public"<?php echo ($post->posted == "1") ? "checked" : "" ?>/>
                                    <span class="lever"></span>
                                    Oui
                                </label>
                            </div>
                        </div>

                        <div class="col s6 right-align">
                            <br/><br/>
                            <button class="btn" type="submit" name="submit">Modifier</button>
                        </div>
                    </div>
                </form>
              </div>
            </div>
         <?php
        }
    ?>

    <style>
   
        .title{
            color: #ED9B01;
            }
        .image{
         
            /* From https://css.glass */
            background: rgba(255, 255, 255, 1);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .btn{
           background-color: #00C5FF;
         }

           
        @media (max-width: 700px){
            .post{
        
               flex-direction: column;
            }
            .image {
                width: 340px;
                height: 320px;
                background: rgba(255, 255, 255, 1);
                box-shadow: 0 4px 30px rgb(0 0 0 / 10%);
                backdrop-filter: blur(5px);
                -webkit-backdrop-filter: blur(5px);
                border: 1px solid rgba(255, 255, 255, 0.3);
            }

            h2 {
                font-size: 2.6rem;
                line-height: 110%;
                margin: 2.3733333333rem 0 1.424rem 0;
            }
    }

    </style>