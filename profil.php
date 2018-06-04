<?php
/**
 * Created by PhpStorm.
 * User: Fred
 * Date: 01/06/2018
 * Time: 07:52
 */
include_once ('login.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Profil</title>
    <link href='https://fonts.googleapis.com/css?family=Merriweather+Sans:700,300italic,400italic,700italic,300,400' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Russo+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" id="theme-style" href="css/profil.css">
    <link rel="stylesheet" href="css/fonts/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/sidebar.css">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                <a  href="index.php" class="glyphicon glyphicon-chevron-left"><span>Documentation</span></a>

            </button>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="about.html">About me</a></li>
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
<div class="container">
	<section id="profil-container">
        <div class="row">
            <div class="col-md-4">
                <img src="img/me.jpg" class="img-rounded img-responsive"/>
                <br />
                <br />
                <form method="post" action="profil-update.php">
                <label>Nom utilisateur</label>
                <input type="text" class="form-control" placeholder="">
                <label>Nom</label>
                <input type="text" class="form-control" placeholder="">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="">
                <br>
                <button class="btn btn-cta-primary" type="submit" name="modify">Modifier</button>
                </form>
            </div>
            <div class="col-md-8">
                <div class="alert alert-info">
                    <h2>Bio de l'utilisateur: </h2>
                    <h4>Détail de votre profil</h4>
                    <p></p>
                </div>
                <div class="col-md-6">
                    <h4>Votre clé d'API</h4>
                    <div class="form-group">
                        <input type="text" value="<?php echo $_SESSION['userKey'];?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <h4>Votre secteur</h4>
                    <p><?php echo $_SESSION['secteur'];?></p>
                </div>
            </div>
            <div class="col-md-8">
                <form action="profil-update.php" method="post">
                    <div class="form-group col-md-8">
                        <h3>Changer votre mot de passe</h3>
                        <br />
                        <label>Entrer l'ancien mot de passe</label>
                        <input type="password" class="form-control">
                        <label>Entrer le nouveau </label>
                        <input type="password" class="form-control">
                        <label>Confirmer le nouveau</label>
                        <input type="password" class="form-control" />
                        <br>
                        <button class="btn btn-warning" name="change-password">Changer mot de passe</button>
                    </div>
                </form>
            </div>
        <div class="col-md-12 text-center">
            <form method="post" action="login.php">
                <button class="btn btn-cta-secondary" name="logout">Se déconnecter</button>
            </form>
        </div>
        </div>
    </section>
</div>