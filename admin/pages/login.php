
<?php
if (isset($_SESSION['admin'])) {
    header("Location:index.php?page=dashboard");
}
?>
<div class="row">
    <div class="col l4 m6 s12 offset-l4 offset-m3">
        <div class="card-panel">
            <div class="row">
                <div class="col s6 offset-s3">
                  <img src="../img/login/admin.png" alt="Administrateur" width="100%">
                </div>
            </div>

            <h4 class="center-align">
                Se connecter
            </h4>

            <?php 
              
              if (isset($_POST['submit'])){

                  $email = htmlspecialchars(trim($_POST['email']));
                  $password = htmlspecialchars(trim($_POST['password']));
                  $errors =[];

                  if(!empty($_POST['email']) AND !empty($_POST['password'])) {

                      $email_par_defaut ="billykamze3@gmail.com";
                      $password_par_defaut ="admin1234";
                      $email_saisi =htmlspecialchars($_POST['email']);
                      $password_saisi =htmlspecialchars(sha1($_POST['password']));

                   
                      if($email_saisi != $email_par_defaut && $password_saisi != $password_par_defaut) {
                        $errors = "Email et mot de pass incorrect !";
                          
                      }else{
                      
                       //Créons une session à l'utilisateur afin qu'il ne soit pas déconnecté par la suite.
                       $_SESSION['admin'] = $email;
    
                       //Rédirection vers la page dashboard
                       header("Location:index.php?page=dashboard");
                      }
                      
                     
                    
                  }else{
                    $errors = "Veillez remplir tous les champs !";
                  }
                    
                  // S'il y'a des érreurs ou si les erreurs existent
                  if (!empty($errors)) {

                      //Dans ce cas je les affichent
                    ?>
                      <div class="card red">
                          <div class="card-content white-text">

                          <!-- On parcour tous les erreus et les affichent -->
                          <?php 
                          
                              echo $errors."<br>";
                        
                          ?>

                          </div>
                      </div>
                    <?php

                  }
              }  
           
            ?>

            <form action="" method="POST">
               <div class="row">
                 <div class="input-field cold s12">
                   <input type="email" id="email" name="email">
                   <label for="eamil">Adresse email</label>
                 </div>
               </div>

               <div class="row">
                 <div class="input-field cold s12">
                   <input type="password" id="password" name="password">
                   <label for="password">Mot de passe</label>
                 </div>
               </div>

              <center>
                    <button type="submit" name="submit" class="waves-effect waves-light btn light-blue">
                        <i class="material-icons left">perm_identity</i>
                        Se connecter
                    </button>
               </center>
            </form>
        </div>
    </div>
</div>