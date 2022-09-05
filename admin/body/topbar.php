<nav class="light-blue">
    <div class="container">
        <div class="nav-wrapper">

             <a href="index.php?page=home" class="brand-logo">Blog personnel</a>
             
              <?php 
                   //Seul la page login et new n'auront pas de navbar 
                    if ($page!="login" && $page!="new") {
                    ?>
                
                        <ul class="right hide-on-med-and-down">
                            <!-- Cest une condition ternaire en php permettant de rendre les liens des pages active lorsqu'on clique dessus -->
                            <li class="<?php echo ($page=="dashboard")?"active" : ""; ?>">
                                <a href="index.php?page=dashboard">
                                    <i class="material-icons">dashboard</i>
                                </a>
                            </li>

                            <!-- Cest une condition ternaire en php permettant de rendre les liens des pages active lorsqu'on clique dessus -->
                            <li class="<?php echo ($page=="write")?"active" : ""; ?>">
                                <a href="index.php?page=write">
                                    <i class="material-icons">edit</i>
                                </a>
                            </li>

                            <!-- Cest une condition ternaire en php permettant de rendre les liens des pages active lorsqu'on clique dessus -->
                            <li class="<?php echo ($page=="liste")?"active" : ""; ?>">
                                <a href="index.php?page=liste">
                                    <i class="material-icons">view_list</i>
                                </a>
                            </li>

                            <!-- Cest une condition ternaire en php permettant de rendre les liens des pages active lorsqu'on clique dessus -->
                            <li class="<?php echo ($page=="settings")?"active" : ""; ?>">
                                <a href="index.php?page=settings">
                                    <i class="material-icons">settings</i>
                                </a>
                            </li>

                            <li><a href="../index.php?page=home">Quitter</a></li>

                            <li><a href="index.php?page=logout">Déconnexion</a></li>

                    </ul>

                    <!-- <ul class="side-nav" id="mobile-menu">
                        <li>

                        </li> -->
               <?php
              }
              
              ?>
            </ul>
        </div>
    </div>
</nav>