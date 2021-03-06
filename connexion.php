<?php
include_once ('login.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Connexion</title>
    <link href='https://fonts.googleapis.com/css?family=Merriweather+Sans:700,300italic,400italic,700italic,300,400' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Russo+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" id="theme-style" href="css/about.css">
    <link rel="stylesheet" href="css/fonts/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/connexion.css">
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
<?php
if (isset($_SESSION['id'])){
    echo '<section id="team" class="team section">
    <div class="container">
        <h2 class="title text-center">Connexion</h2>
        <p class="intro text-center">Vous êtes déjà connecté, que voulez-vous faire ? </p>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <div class="col-md-6">
                    <form method="post" action="login.php">
                        <button class="btn btn-cta-primary" name="logout">Se déconnecter</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-cta-secondary">
                        <a href="profil.php">Aller au profil</a>
                     </button>
                </div>
            </div>
        </div>
    </div>';
}
else{
    echo '<section id="team" class="team section">
    <div class="container">
        <h2 class="title text-center">Connexion</h2>
        <p class="intro text-center">Connectez-vous ou inscrivez-vous si je ne vous connais pas. </p>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="login-form-link">Login</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" id="register-form-link">Register</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form" action="login.php" method="get" role="form" style="display: block;">
                                    <div class="form-group">
                                        <input type="text" name="mail" id="username" tabindex="1" class="form-control" placeholder="eMail" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Se connecter">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form id="register-form" action="login.php" method="get" role="form" style="display: none;">
                                    <div class="form-group">
                                        <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="S\'enregistrer">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>';
}
?>

</body>
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

<script>
    $(function() {

        $('#login-form-link').click(function(e) {
            $("#login-form").delay(100).fadeIn(100);
            $("#register-form").fadeOut(100);
            $('#register-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });
        $('#register-form-link').click(function(e) {
            $("#register-form").delay(100).fadeIn(100);
            $("#login-form").fadeOut(100);
            $('#login-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });

    });
</script>
</html>