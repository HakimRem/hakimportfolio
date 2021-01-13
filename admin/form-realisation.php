<?php
require_once ('../inc/connexion.php');
require_once('../inc/header-admin.php');
$titre1 = 'Ajouter';
$titre2 = 'Modifier';


if(isset($_POST['titre']) && isset($_POST['description']) && ($_GET['action']=='creer')){ 
    
    $titre         = $_POST['titre'];
    $description    = $_POST['description'];

    if(!empty($_FILES['photo']['name'])){
        $photo = 'assets/img/'.$_FILES['photo']['name'] ;
        copy($_FILES['photo']['tmp_name'], '../'.$photo);
       
     }
      
    $requete = $pdo -> prepare("INSERT INTO realisations (titre, description, photo) VALUES (?, ?, ?)")
    or die (print_r($pdo->errorInfo() ) );
    $requete->execute(array($titre, $description, $photo));
    header('location:admin.php');
}
if(!empty($_GET['id_modif']) && ($_GET['action']=='modifier')){
    $idSupp = htmlspecialchars($_GET['id_modif']);
    $queryUp = $pdo->prepare('SELECT * FROM realisations WHERE id_realisation = ?');
    $queryUp->execute(array($idSupp));
    $result = $queryUp->fetch(PDO::FETCH_ASSOC);
    // echo "<pre>";
    // var_dump($result);
    // echo "</pre>";

    if(!empty($_POST)){
        $titreUp = htmlspecialchars($_POST['titre']) ;
     
        
        $descriptifUp = htmlspecialchars($_POST['description']) ;
        $photo_bdd = "";

        if (isset($_POST['photo_actuelle'])) { 
            $photo_bdd = $_POST['photo_actuelle'];  
        }

        if (!empty($_FILES['photo']['name'])) {  
            $nom_fichier = $_FILES['photo']['name'] ; 
            $photo_bdd = 'assets/img/' . $nom_fichier;
            copy($_FILES['photo']['tmp_name'], '../'.$photo_bdd);  
        }

        $requete = $pdo->prepare('UPDATE realisations SET description =?, titre=? ,photo=? WHERE id_realisation = ?')
        or die (print_r($pdo->errorInfo()));
        $requete->execute(array($descriptifUp, $titreUp, $photo_bdd, $idSupp ));
        header('location:admin.php');
    }
    $divPhoto = '<div><img src="'. $result['photo'] . '" style="width: 90px"></div>';
}


?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS AnimateCSS AOScss-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="loading-bar.css"/>
	<link rel="stylesheet" href="assets/CSS/style.css">
    <title>Porfolio</title>
  </head>
  <body>
    
    <header class="header">
  <nav class=" navbar navbar-expand-lg navbar-light bg-dark fixed-top" id="header-top">
  <div class="container-fluid">
    <a class="ml-4 navbar-brand text-success" href="portfoliohakim">Ajout de Réalisation</a>
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
          <a class="nav-link text-white" href="#form-competence.php" >Ajout de Compétence</a>
        </li>

      </ul>
    </div>
  </div>
</nav>

<div class="container">
    <form action="" method="post" enctype="multipart/form-data">               
    <div>
        <label for="titre">Titre</label></div>
            <div><input type="text" name="titre" id="titre" value="<?= $result['titre'] ?? ''; ?>"></div>                
            <div><label for="description">Description</label></div>
            <div><input type="textarea" name="description" id="description" value="<?= $result['description'] ?? ''; ?>"></div>                
            <div>
                <label for="photo" class="mt-3">Photo</label>
                <input class="form-control" type="file" name="photo" id="photo" value="">
                    <?=($_GET['action']=='modifier') ?  $divPhoto : "" ;
                    
                    if (isset($result['photo'])) { 
                    echo '<input type="hidden" name="photo_actuelle" value="' . $result['photo'] . '">';
                }
                ?>

            </div> 
            <div><input type="submit" value="Enregistrer"></div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>              
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://kit.fontawesome.com/ce47a8ff0b.js" crossorigin="anonymous"></script>
    <script src="assets/js/aos.js"></script>
    <script src="assets/js/main.js"></script>
    <script type="text/javascript" src="loading-bar.js"></script>
</body>
</html>