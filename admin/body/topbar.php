<nav class="light-green">
    <div class="container">
        <div class="nav-wrapper">

            <a href="index.php?page=home" class="brand-logo">Blog 2.0</a>

            <!-- <a href="#"data-activates="mobile-menu" class="button-collapse">
                <i class="material icons">menu</i>
            </a> -->

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

                <li><a href="../index.php?page=home">Quitter</a></li>

                <li><a href="index.php?page=logout">Déconnexion</a></li>

            </ul>

            <!-- <ul class="side-nav" id="mobile-menu">
                <li>

                </li> -->
            </ul>
        </div>
    </div>
</nav>