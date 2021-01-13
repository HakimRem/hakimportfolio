<?php
require_once ('../inc/connexion.php');
if(!isset($_SESSION['pseudo'])){
  header('location:../authentification.php');
}

 $administrateur='';
 
 $resultat = $pdo->query("SELECT * FROM administrateur");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="loading-bar.css"/>
	<link rel="stylesheet" href="assets/CSS/style.css">
    <title>Document</title>
    <style>
    .miniature{
    width: 80px;
    height:80px;
    }   
</style>
</head>
<body>
  <nav class=" navbar navbar-expand-lg navbar-light bg-dark fixed-top" id="header-top">
  <div class="container-fluid">
    <a class="ml-4 navbar-brand text-success" href="portfoliohakim">Tableau de Bord</a>
    <hr class="ml-4">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="d-flex justify-content-end collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="../authentification.php?action=deconnexion"><i class="mr-3 fas fa-user-alt"></i>Déconnexion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
 
    <section class="container">
    <h2>Compétences <a class="btn btn-primary" href="form-competences.php">Ajouter compétences</a></h2>
    <table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Langage</th>
      <th scope="col">Niveau</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>

    <?php
    if(isset($_GET['id_competence'])) { 
        $id_competence = ($_GET['id_competence']);
        $req=$pdo->prepare('DELETE FROM competences where id_competence=?');
        $req->execute(array($id_competence));
    }
    $requete = $pdo->query('SELECT * FROM competences');
    while($resultat=$requete->fetch(PDO::FETCH_ASSOC)){
    ?>
      <th scope="row"><?=$resultat['id_competence']?></th>
      <td><?=$resultat['langage']?></td>
      <td><?=$resultat['niveau']?></td>
    
    <td><a href=""><i class="fas fa-pencil-alt"></i></a><a href="?id_competence=<?php echo $resultat['id_competence']?>"><i class="ml-3 fas fa-trash-alt"></i></a></td>
    <?php
    }
    ?>
    </tr>

  </tbody>
</table>
<div class="row">
<h2>Réalisations</h2><a class="btn btn-primary ml-3" href="form-realisation.php?action=creer">Ajouter réalisation</a>
</div>
<table class="table table-striped table-bordered ">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Titre</th>
      <th scope="col">Decription</th>
      <th scope="col">Photo</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  

    <?php
    if(isset($_GET['id_realisation'])) { 
        $id_realisation = ($_GET['id_realisation']);
        $req=$pdo->prepare('DELETE FROM realisations where id_realisation=?');
        $req->execute(array($id_realisation));
    }
    $requete = $pdo->query('SELECT * FROM realisations');
    while($resultat=$requete->fetch(PDO::FETCH_ASSOC)){
    ?>
      <tr>
      <th scope="row"><?=$resultat['id_realisation']?></th>
      <td><?=$resultat['titre']?></td>
      <td><?=$resultat['description']?></td>
      <td><img class="miniature" src="../<?=$resultat['photo']?>" alt=""></td>
    
    <td><a href="form-realisation.php?id_modif=<?=$resultat['id_realisation']?>&action=modifier"><i class="ml-4 fas fa-pencil-alt"></a><a href="?id_realisation=<?php echo $resultat['id_realisation']?>"><i class="fas fa-trash-alt"></i></a></td>
    </tr>
    <?php
    }
    ?>
    

  </tbody>
</table>
</section>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>              
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://kit.fontawesome.com/ce47a8ff0b.js" crossorigin="anonymous"></script>
    <script src="assets/js/aos.js"></script>
    <script src="assets/js/main.js"></script>
    <script type="text/javascript" src="loading-bar.js"></script>

</body>
</html>