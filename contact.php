<?php
session_start();
include_once ('login.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>API Index</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Merriweather+Sans:700,300italic,400italic,700italic,300,400' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Russo+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" id="theme-style" href="css/about.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/contact.css">

</head>
<body>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
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
    <header class="header-wrapper header-wrapper-contact">
        <section class="promo section">
            <div class="container text-center">
                <h2 class="title">Contact me</h2>
                <p class="intro">Si vous avez une remarque à faire ou avez une question à me poser, vous êtes au bon endroit !</p>
            </div>
        </section>
    </header>

    </div>

    <div class="row">
        <div class='col-sm-10 col-sm-offset-1'>

        </div>
    </div>
    <div class='row'>
        <div class='col-sm-10 col-sm-offset-1'>
            <div class='well'>
                <form method="get" action="postForm.php">
                    <div class='row'>
                        <div class='col-sm-4'>
                            <div class='form-group'>
                                <label for='fname'>Prenom</label>
                                <input type='text' name='prenom' class='form-control' />
                            </div>
                            <div class='form-group'>
                                <label for='lname'>Nom</label>
                                <input type='text' name='nom' class='form-control' />
                            </div>
                            <div class='form-group'>
                                <label for='email'>Email</label>
                                <input type='text' name='email' class='form-control' />
                            </div>
                            <div class='form-group'>
                                <label for='subject'>Catégorie</label>
                                <select name='sujet_1' class='form-control'>
                                    <option>Questions me concernant</option>
                                    <option>Suggestion sur le site</option>
                                    <option>Autre question</option>
                                </select>
                            </div>
                        </div>
                        <div class='col-sm-8'>
                            <div class="form-group">
                                <label for="subject">Sujet</label>
                                <input type="text" name="sujet_2" class="form-control" />
                            </div>
                            <div class='form-group'>
                                <label for='message'>Message</label>
                                <textarea class='form-control' name='message' rows='10'></textarea>
                            </div>
                            <div class='text-right'>
                                <input type='submit' class='btn btn-primary' value='Envoyer' />
                            </div>
                        </div>
                        <?php
                        if(isset($_GET['success'])){
                            echo "<div class=\"alert alert-success\">
                                  <strong>Success!</strong> Votre email a bien été envoyé !
                                </div>";

                        }
                        else if(isset($_GET['error'])){
                            echo "<div class=\"alert alert-danger\">
                                      <strong>Error!</strong> Votre email n'a pas été envoyé !
                                    </div>";
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>