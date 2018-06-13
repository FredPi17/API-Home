<?php
include_once ('weather.php');
include_once ('sante.php');
include_once ('calendrier.php');
include_once ('login.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>API Index</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" id="theme-style" href="css/about.css">

</head>
<body>
<div class="container-fluid">

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>API Frédéric Pinaud</h3>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="glyphicon glyphicon-home"></i>
                        Météo
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li><a href="#salon" data-toggle="collapse" aria-expanded="true">Salon</a></li>
                        <li><a href="#exterieur" data-toggle="collapse" aria-expanded="false">Extérieur</a></li>
                        <li><a href="#bureau" data-toggle="collapse" aria-expanded="false">Bureau</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#santeSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="glyphicon glyphicon-briefcase"></i>
                        Santé
                    </a>
                    <ul class="collapse list-unstyled" id="santeSubmenu">
                        <li><a href="#" data-toggle="collapse" aria-expanded="false">sante 1</a></li>
                        <li><a href="#" data-toggle="collapse" aria-expanded="false">sante 2</a></li>
                    </ul>
                    <a href="#calSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="glyphicon glyphicon-duplicate"></i>
                        Calendrier
                    </a>
                    <ul class="collapse list-unstyled" id="calSubmenu">
                        <li><a href="#showEvent" data-toggle="collapse" aria-expanded="true">Voir évènements</a></li>
                        <li><a href="#addEvent" data-toggle="collapse" aria-expanded="true">Ajouter évènement</a></li>
                    </ul>
                </li>

            </ul>

        </nav>

        <!-- Page Content Holder -->
        <div id="content">
            <nav class="navbar navbar-default">
                <div class="container-fluid">

                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                            <i class="glyphicon glyphicon-align-left"></i>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.php">Accueil</a></li>
                            <li><a href="about.html">About</a></li>
                            <?php
                            if(estConnecte()){
                                echo '<li><a href="profil.php">Mon profil</a></li>';
                            }
                            else{
                                echo '<li><a href="connexion.php">Connexion</a></li>';
                            }
                            ?>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="contact.php">Contact</a></li>

                        </ul>
                    </div>
                </div>
            </nav>

            <div class="list-unstyled" id="salon">
                <?php echo salon();?>
            </div>
            <div class="collapse list-unstyled" id="exterieur">
                <?php echo exterieur();?>
            </div>
            <div class="collapse list-unstyled" id="bureau">
                <?php echo bureau();?>
            </div>

            <div class="collapse list-unstyled" id="showEvent">
                <?php echo getEvents();?>
            </div>
            <div class="collapse list-unstyled" id="addEvent">
                <?php echo addEvent();?>
            </div>

           </div>
    </div>
</div>


<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- Bootstrap Js CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
</body>
</html>
