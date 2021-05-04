<?php
    session_start();
   
    $errors = [];

    if (empty($_POST['user_id'])) {
        $errors[] = "Utilisateur non reconnu";
    }

    if  (empty($_POST['nom'])) {
        $errors[] = "Veuillez renseigner le nom";
    }

    if  (empty($_POST['age'])) {
        $errors[] = "Veuillez renseigner l'age";
    }

    if  (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("Location: editing.php");
        exit;        
    }

    try{
        $bdd = new PDO('mysql:host=localhost;dbname=test1;charset=utf8', 'root', '');
        $req=$bdd->prepare('UPDATE  etudiant SET nom=:nom , age=:age WHERE id=:id');
        $req->execute(array('nom' =>$_POST['nom'] , 'age' =>$_POST['age'] ,'id' =>$_POST['user_id'] ));
        
    }
    catch(Exception $e){
        die('Erreur : ' . $e->getMessage()); 
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>edit</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                <a class="navbar-brand" href="index.php">ajouter une personne</a>
                <a class="navbar-brand" href="personne.php">la liste des personne</a>
            </nav>
        </header>
        <div class="message"><h1>The element has been changed</h1></div>
    </body>
    </html>