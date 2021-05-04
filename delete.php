<?php   
 session_start();
try{
    $bdd = new PDO('mysql:host=localhost;dbname=test1;charset=utf8', 'root', '');
    $r=$bdd->prepare('DELETE  FROM etudiant  WHERE id=:id');
    $r->execute(array('id' =>$_GET['id']));
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
    <title>supprimer</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
     <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
        <a class="navbar-brand" href="personne.php">la liste des personnes</a>
        <a class="navbar-brand" href="index.php">ajouter une personne</a>
        </div>
    </nav>

</header>
    <div class="message">
        <h1>l'élement a été bien suprimé</h1>
    </div>
    <footer>
    </footer>
</body>
</html>