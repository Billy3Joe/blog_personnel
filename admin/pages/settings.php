
<h2>Paramètres</h2>

<div class="row">
    <div class="col m6 s12">
        <h4>Modérateurs</h4>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Validé</th>
                </tr>
            </thead>
            <tbody>
             <?php 
             
               $modos = get_modos();

               foreach ($modos as $modo) {
                ?>
                   
                   <tr>
                       <td><?= $modo->name ?></td>
                        <td><?= $modo->email ?></td>
                        <td><?= $modo->role ?></td>
                        <td><i class="material-icons"><?php echo (!empty($modo->password)) ? "verified_user" : "av_timer" ?></i></td>
                    </tr>

                <?php
               }
             
             ?>
            </tbody>
        </table>


    </div>
    <div class="col m6 s12">


       <h4>Ajouter un modérateur ou un administrateur</h4>

     <?php
        if(isset($_POST['submit'])){

            $name = htmlspecialchars(trim($_POST['name']));
            $email = htmlspecialchars(trim($_POST['email']));
            $email_again = htmlspecialchars(trim($_POST['email_again']));
            $role = htmlspecialchars(trim($_POST['role']));
            $errors = [];

            //Vérifions si tous les champs sont remplis
            if(empty($name) || empty($email) || empty($email_again)){

                //Au cas ou les champs ne sont pas remplis
                $errors['empty'] = "Veuillez remplier tous les champs";
            }
            
            //Comparons les deux adresses emails entrées par l'utilisateur
            if($email != $email_again){

                //Au cas ou elles sont différents
                $errors['different'] = "Les adresses email ne correspondent pas";
            }
            
            //Fonction permettant de voir si l'adresse email est déjà utilisée par une autre personne
            if(email_taken($email)){

                //Au cas ou l'email est déjà utilisée par une autre personne
                $errors['taken'] = "L'adresse email est déjà assignée à un modérateur";
            }

            //Au cas ou les erreurs existent ie si la variable $errors contient des erreurs
            if(!empty($errors)){
                ?>
                <!-- On affiche ces erreurs dans une boucle foreach -->
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
            //Au cas ou les erreurs n'existent pas ie la variable $errors ne contient pas des erreurs
            }else{

                //On ajout la personne soit comme modérateur ou administrateur le modétateur
                //Mais avant, on aura besoin du token de la bd que nous avons crée sous forme de fonction token(30) dans le fichier settings.func.php avec une longueur de 30 caractères qui a été stocker dans la variable $token 
                //$token c'est le code qui sera généré afin que la personne puisse confirmer via son mail afin d'avoir la possibilité d'être soit modérateur ou administrateur
                //Le $token est un code généré aléatoirement 
                $token = token(30);

                //NB: Le password par défaut dans la base de donnée est vide afin d'éviter une erreur lors de notre requête d'insertion étant donnée que je n'ai pas mentionné le password dans le tableau $m et la requête
                add_modo($name,$email,$role,$token);
            }
        }


        ?>


        <form method="post">
            <div class="row">

                <div class="input-field col s12">
                    <input type="text" name="name" id="name"/>
                    <label for="name">Nom</label>
                </div>

                <div class="input-field col s12">
                    <input type="email" name="email" id="email"/>
                    <label for="email">Adresse email</label>
                </div>

                <div class="input-field col s12">
                    <input type="email" name="email_again" id="email_again"/>
                    <label for="email_again">Répéter l'adresse email</label>
                </div>

                <!-- Afin d'afficher les options Modérateur et Administrateur selon le framework Materialize.css que j'utilise, on a créé un petit script dans la page settingsShowOptionsModoOrAdmin.func.js se trouvant dans le dossier js -->
                <div class="input-field col s12">
                    <select name="role" id="role">
                        <option value="modo">Modérateur</option>
                        <option value="admin">Administrateur</option>
                    </select>
                    <label for="role">Rôle</label>
                </div>

                <div class="col s12">
                    <button type="submit" name="submit" class="btn">Ajouter</button>
                </div>

            </div>
        </form>

    </div>

        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="js/settingsShowOptionsModoOrAdmin.func.js"></script>
    </div>
         


