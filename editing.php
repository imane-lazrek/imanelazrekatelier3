<?php session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editing</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>




    <header>
        <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                <a class="navbar-brand" href="index.php">ajouter une personne</a>
                <a class="navbar-brand" href="personne.php">la liste des personne</a>
        </nav>
        <div class=container>
        <?php if(!empty($_SESSION['errors'])) {
            foreach ($_SESSION['errors'] as $error) {
            ?> <div class="errors"><?php echo $error ?></div>  <?php
            }   
        }?>
       
        
        <form action="edit.php" method="post">
            <label for="nom">Le nouveau nom</label>
            <input class="input-group mb-2" type="text" name="nom" id="nom">
            <label for="age">le nouveau age</label>
            <input class="input-group mb-2" type="number" name="age" id="age">
            <input type="hidden" name="user_id" value="<?php echo $_GET['id'] ?>">
            <input class="btn btn-success" type="submit">

        </form>
        
        </div>

    </header>
</body>
</html>