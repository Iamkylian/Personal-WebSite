<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Page d'accueil Serveur 174</title>
  <link rel="stylesheet" href="css\styleAccueil.css" />
  <?php include("connexion.php"); ?>
</head>

<body>
  <header>
    <h1>Page d'accueil du serveur 174</h1>
    <nav>
    </nav>
  </header>
  <main>

    <section id="resume" class="grey-section">

      <div class="row section-intro">
        <div class="col-twelve">

          <h1>Introduction</h1>
          <?php
		// Code PHP à inclure dans la page
		$date = date("d/m/Y");
		echo "<p>Aujourd'hui, nous sommes le $date</p>";
	?>

          <p class="lead">Bienvenue sur le site de l'équipe du serveur 174, nous sommes deux étudiant de l'IUT Toulouse
            Jean-Jaures - Blagnac, et dans le cadre de la SAE S1.03 nous avons
            mis en place un serveur web avec nos deux sites.</p>
          <div class="left">
          </div>

          <div class="right">

          </div>
        </div>
      </div> <!-- /section-intro-->




    </section> <!-- /resume -->

    <section class="section-container-three">
      <div class="div-container-left">
        <div class="image-container">
          <img src="ressources/images/photoIllanEntiere.jpg">
        </div>
      </div>
      <div class="div-container-center">
        <div class="div-container-header">
          <h2>Découvrez nos sites personnels en cliquant sur les boutons !</h2>
          <h3>Site English Test : Illan GABARRA</h3>
        </div>
        <div class="div-container-two">
          <div class="row button-section">
            <div class="col-twelve">
              <span class="pos-illan">
                <a href="illan.gab.html" class="button stroke smoothscroll">Illan GABARRA</a>
              </span>
            </div>
          </div>

          <div class="row button-section">
            <div class="col-twelve">
              <span class="pos-kylian">
                <a href="kylian.gac.html" class="button stroke smoothscroll">Kylian GACHET</a>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="div-conainer-right">
        <div class="image-container">
          <img src="ressources/images/profile-pic.webp">
        </div>
      </div>
    </section>
  </main>
</body>

</html>