<?php

session_start();

$_SESSION["panier"] = "list" ;
 
if($_SESSION['url']=='index'){
    unset($_SESSION['errors']);
}
if($_SESSION['url']=='register'){
    $_SESSION['url']='index';
}
?>
<html>
    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>add</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php
        if(!empty($_SESSION['errors'] )) {
        foreach ($_SESSION['errors'] as $error) {
            ?> <div class="errors"><?php echo $error ?></div>  <?php
        }   
        }

        ?>
        <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
           <a class="navbar-brand" href="personne.php">la liste des personne</a>
        </nav>
        <div class="container">
            <form  method="post"  action="register.php">
                <label for="nom">Nom </label>
                <input class="input-group mb-2" type="text" name="nom" id="nom"  /> </br>
                <label for="age">Age </label>
                <input class="input-group mb-2" type="number" name="age" id="age"  /> </br>
                <input class="btn btn-success" type="submit"  value="save me!!!" />
            </form>

        </div>
    </body>

</html>