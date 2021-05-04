<?php
var_dump($_POST);
if (empty($_POST)) {
    // redirection
    header("Location: personne.php"); 
    exit;
}

session_start();

$errors = [];
if  (empty($_POST['nom'])) {
    $errors[] = "Veuillez renseigner le nom";
}

if  (empty($_POST['age'])) {
    $errors[] = "Veuillez renseigner l'age";
}

if  (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['url'] = "register";
    header("Location: index.php");
    
    //unset($_SESSION['errors']);
    exit;        
}

try
{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=test1;charset=utf8', 'root', ''); 
    echo "success" ;


    // insert into bdd table etudiant

    $req = $bdd->prepare('INSERT INTO etudiant(nom, age ) VALUES(:nom, :age )');

    $req->execute(array(
        'nom' => $_POST['nom'],
        'age' => $_POST['age']
    ));
    unset($_SESSION['errors']);
    $_SESSION['success'] = "Etudiant cree avec success";
    header("Location: personne.php"); 
    exit;

} catch  (Exception $e) {
    exit($e->getMessage());
}
?>
