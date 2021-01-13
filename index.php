<?php
require_once ('inc/connexion.php');
if ( isset ($_POST['nom']) && ($_POST['prenom']) && ($_POST['email']) &&  ($_POST['message']) ){
    $to='hakimr180386@gmail.com';
    $sujet=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $message=$_POST['message'];
    mail (  $to ,  $sujet ,  $message );
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
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="header-top">
  <div class="container-fluid">
    <a class="ml-4 navbar-brand text-success" href="portfoliohakim/admin">Hakim Remichi</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="d-flex justify-content-end collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="mr-4 nav-link active text-white" aria-current="page" href="#">A propos</a>
        </li>
        <li class="nav-item">
          <a class="mr-4 nav-link text-white" href="#" >Compétences</a>
        </li>
        <li class="nav-item">
          <a class="mr-4 nav-link text-white" href="#" >Réalisations</a>
        </li>
        <li class="nav-item">
          <a class="mr-4 nav-link text-white" href="#" >Contact</a>
        </li>

      </ul>
    </div>
  </div>
</nav>
<div class="container">
    <div class="row">
    </div>
            <div class="header__content">
				<p class="bold animate__animated animate__backInLeft">PORTFOLIO</p>
				
                <p class="animate__animated animate__backInRight">Développeur Web Junior <span class="bold"></span></p>
                <a class="btn scroll" download href="assets/img/CVhakim.pdf">Télécharger mon CV</a>
             </div>
            
    </div>                 

    </header>

 
          
    <section id="about">
        <div class="container">
            <h2 data-aos="flip-left" >Qui suis-je ?</h2>
			<hr>
			<div class="img-profil">
			<img src="assets/img/photo.png" alt="Photo Hakim">
			</div>
            <p class="lead"></p>
			<p>
            <p>Je suis un jeune développeur issu de la formation la passerelle numérique de l'association Le PoleS de Villeneuve-la-garenne, je maîtrise les technologies
				 front-end, notamment Html, Css, et JavaScript avec les frameworks Bootstrap et Angular je fait aussi du back-end, et particulièrement Symfony et Phpo. Pour les CMS, je me suis familiarisé avec le WordPress
			Pour la partie gestion de projets. j’ai des connaissances en méthode agile ainsi que l’outil Git pour la gestion de version de projet
			Je suis à l'écoute d'opportunités en développement de site et application web.
			Je suis particulièrement intéressé par le développement en langage JavaScript et ses frameworks</p>
            
            
        </div>
    </section>
    
    <section id="competences">
        <div class="container">
            <h2 data-aos="flip-left">Compétences</h2>
            <hr>
            <div class="row">
            <?php
            $requete = $pdo->query('SELECT * FROM competences');
            while($resultat=$requete->fetch(PDO::FETCH_ASSOC)){
            ?>
                <div class="skill col-12 col-lg-6">
                    <div class="competences__pourcent"><?=$resultat['niveau']?>%</div>
                    <div class="progression-container">
                        <strong><?=$resultat['langage']?></strong>
                        <div class="progression">
                            <div class="progression-bar" id="dynamic"  role="progressionbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: <?=$resultat['niveau']?>%"></div>
                        </div>
                    </div>
                </div>
                
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    
    <section id="realisation">
        <h2 data-aos="flip-left"> Mes Réalisations</h2>
        <hr>
        <div class="container">
            <div class="portfolio__projects">
                <div class="row">
                    <?php
                    $requete = $pdo->query('SELECT * FROM realisations');
                    while($resultat=$requete->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <div class="col-lg-4 col-md-6"data-aos="zoom-out-right">
                        <figure>
                            <figcaption>
                                <h3><?=$resultat['titre']?></h3>
                                <p><?=$resultat['description']?></p>
                                <a href="#"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                            </figcaption>
                            <img src="<?=$resultat['photo']?>">
                        </figure>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    
    <section id="contact">
        <div class="container">
            <p class="lead">Mon profil vous à plus ?</p>
			<p><span class="text-animate">Vous cherchez un développeur Web ?</span></p>
			<div class="container">
  <h1>Contactez-moi</h1>
    <div class="phone d-flex justify-content-center">
      <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-telephone-fill" fill="currentColor"             xmlns="http://www. w3.org/2000/svg">
      <path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z"/>
      </svg><h3 class="ml-3">07.69.43.23.88</h3>
    </div>  
    <div class="mail d-flex justify-content-center">
    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-envelope-fill" fill="currentColor"         xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/></svg><h3 class="ml-3 mb-5">hakim.remichi@gmail.com</h3>
    </div> 
    
    
  <form method="post" action="">
  <div class="form-row">
    <div class="col">
      <input type="text" class="form-control" name="prenom" placeholder="votre Prénom">
    </div>
    <div class="col">
      <input type="text" class="form-control" name="nom" placeholder="votre Nom">
	</div>
   </div>
  
	<label for="inputPassword5"></label>
	<input type="email" id="inputPassword5" name="email" class="form-control" aria-describedby="passwordHelpBlock" placeholder="votre Email">
	<small id="passwordHelpBlock" class="form-text text-muted">
	</small>
	<form class="was-validated">
  	<div class="mb-3">
    <label for="validationTextarea"></label>
    <textarea class="form-control is-invalid" name="message" id="validationTextarea" placeholder="Message" required></textarea>
    <div class="invalid-feedback">
    
    </div>
  	</div>

	<button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
	


            
            <div class="contact__social">
                <a href="https://www.linkedin.com/in/hakim-remichi-69363aa3/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                <a href="https://github.com/HakimRem" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a>
            </div>
        </div>
        
	</section>
	<a id="back-to-top" href="#top"><i class="fas fa-angle-double-up"></i></a>
    <footer>
    <section id="footer">
        <p>Mentions Légales<i class="fa fa-heart" aria-hidden="true"></i> <a href="" target="_blank"></a> <i class="fa fa-copyright" aria-hidden="true"></i>2020</p>
    </section>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>              
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://kit.fontawesome.com/ce47a8ff0b.js" crossorigin="anonymous"></script>
    <script src="assets/js/aos.js"></script>
    <script src="assets/js/main.js"></script>
    <script type="text/javascript" src="loading-bar.js"></script>
  </body>
</html>


