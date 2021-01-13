<?php
require_once ('../inc/connexion.php');
 
 $competences='';

 if(isset($_POST['competences']) && ($_POST['niveau'])){ 
    $competences         = $_POST['competences'];
    $niveau    = $_POST['niveau'];
    

    $requete = $pdo -> prepare("INSERT INTO competences (langage, niveau) VALUES (?, ?)")
    or die (print_r($pdo->errorInfo() ) );
    $requete->execute(array($competences, $niveau));
    header('location:admin.php');

}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="loading-bar.css"/>
	<link rel="stylesheet" href="assets/CSS/style.css">
    <title>competences</title>
</head>
<body>
<header class="header">
  <nav class=" navbar navbar-expand-lg navbar-light bg-dark fixed-top" id="header-top">
  <div class="container-fluid">
    <a class="ml-4 navbar-brand text-success" href="portfoliohakim">Ajout de Compétences</a>
    <hr class="ml-4">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="d-flex justify-content-end collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="#">Tableau de Bord</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#form-realisation.php" >Ajout de Réalisations</a>
        </li>

      </ul>
    </div>
  </div>
</nav>
<form action="" method="post" enctype="multipart/form-data">
                
                <div><label for="competences">Compétences</label></div>
                <div><input type="text" name="competences" id="competences"></div>
                    
                <div><label for="niveau">Niveau</label></div>
                <div><input type="text" name="niveau" id="niveau"></div>
                

                <div><input type="submit" value="Enregistrer"></div>


                
            </form>
            
    
</body>
</html>