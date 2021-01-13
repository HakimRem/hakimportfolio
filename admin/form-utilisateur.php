<?php
require_once ('../inc/connexion.php');
 
 $competences='';

 if(isset($_POST['pseudo']) && ($_POST['mdp'])){ 
    $pseudo = $_POST['pseudo'];
    $mdp =sha1($_POST['mdp']);
    

    $requete = $pdo -> prepare("INSERT INTO administrateur (pseudo, mdp) VALUES (?, ?)")
    or die (print_r($pdo->errorInfo() ) );
    $requete->execute(array($pseudo, $mdp));
    header('location:admin.php');

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
                
                <div><label for="pseudo">Pseudo</label></div>
                <div><input type="text" name="pseudo" id="pseudo"></div>
                    
                <div><label for="mdp">Mot de Passe</label></div>
                <div><input type="password" name="mdp" id="mdp"></div>
                

                <div><input type="submit" value="Enregistrer"></div>


                
            </form>
    
</body>
</html>