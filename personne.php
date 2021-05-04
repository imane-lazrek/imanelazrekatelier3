<?php

session_start();
// connection avec la bdd : lsi host : locahost / 127.0.01 : 3306

try  {
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=test1;charset=utf8', 'root', '');
// cursor
        $tab =  $bdd->query("select * from etudiant");
}
catch (Exception $e) {
        die('Erreur : ' . $e->getMessage()); 


}
 


?>


<html>
<head>        
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
 </head>


 <body>
<?php if(!empty($_SESSION['success'])) { ?>
        <div> <?php echo $_SESSION['success']?> </div>
<?php } ?>
<nav class="navbar navbar-light" style="background-color: #e3f2fd;"><a class="navbar-brand" href="index.php">ajouter personne</a></nav>
<table>
<th> id </th>
<th> nom </th>
<th> age </th>


<?php
 while ($donnees = $tab->fetch()){ // parcourir ligne par line
?>
        <tr>  

                <td><?php echo $donnees['id'] ; ?> </td> 
                <td> <?php echo $donnees['nom'] ; ?> </td>
                <td> <?php echo $donnees['age'] ; ?>  </td>
                <td>
                     <a href="editing.php?id=<?php echo $donnees['id']; ?>" class="btn btn-info">Edit</a> 
                     <a href="delete.php?id=<?php echo $donnees['id']; ?>" class="btn btn-danger">Delete</a> 
 
                </td>
        </tr>


<?php
}
?>
</table>
</body>
</html>