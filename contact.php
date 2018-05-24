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
    <link rel="stylesheet" href="sidebar.css">
</head>
<body>

<div class="container-fluid">
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
                    <li><a href="get_API.html">Get API Key</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="contact.php">Contact</a></li>

                </ul>
            </div>
        </div>
    </nav>
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