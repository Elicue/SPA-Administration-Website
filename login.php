<!doctype html>
<html lang="en">
<head>
  <?php ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" type="image/png" href="images/logo.png" />
  <title>Homepage</title>
</head>
<body class="login">

  <?php
    require 'utils/header.php';
    require 'utils/infos.php';
    session_start();
  ?>

  <main>
    <div class="content">
      <h1>DONNONS LEUR AUTANT QU'ILS NOUS APPORTENT</h1>
      <p>En donnant tous les mois, des animaux traumatisés reçoivent des soins et l’espoir d’un nouveau départ.</p>
    </div>
  </main>

  <div class="formulaire">

    <div class="haut">

      <div class="left">
        <img src="images/paw.png" alt="paw">

        <div class="content">
          <h2>Le certificat d'engagement et de connaissance des besoins spécifiques de l’espèce</h2>
          <p>Dans le cadre de la loi du 30 novembre 2021 visant à lutter contre la maltraitance animale et conforter le lien entre les animaux et les hommes, de nouvelles règles encadrent l’acquisition d’un animal. Suite à son instauration, les conditions pour adopter un animal évoluent.</p>
        </div>
      </div>

      <div class="right">

        <div class="fond"></div>

        <form method="post">
          <h1>formulaire d'inscription</h1>
          <input type="email" name="email" placeholder="E-mail"><br>
          <input type="password" name="password" placeholder="Mot-de-passe"><br>
          <input type="text" name="first_name" placeholder="Prénom"><br>
          <input type="text" name="last_name" placeholder="Nom"><br>
          <input type="submit" value="S'inscrire">
        </form>

      </div>

    </div>

    <div class="bas">
      <?php
        require_once 'user.php';
        require_once 'connection.php';
        require_once 'utils/donation.php';

        if ($_POST) {
          $user = new User(
            $_POST['email'],
            $_POST['password'],
            $_POST['first_name'],
            $_POST['last_name'],
          );

          if ($user->verify()) {
            // save to database
            $connection = new Connection();
            $result = $connection->insertUser($user);

            if ($result) {
              echo '<h3>'.'Compte créé'.'</h3>';
            } else {
              echo 'Erreur';
            }
          } else {
            echo 'Formulaire invalid';
          }

        }
      ?>
    </div>

  </div>

  <div class="bottom">
    <a href="https://www.la-spa.fr/contactez-nous/">
      <div class="content">
        <div class="left">
          <h2>Contactez-nous</h2>
          <p>Nos 700 salariés et 4 000 bénévoles sont mobilisés chaque jour sur le terrain pour sauver des animaux en détresse. À ce titre, nos capacités de répondre directement à vos questionnements par échange d’e-mail ou par téléphone sont plus que limitées. Nous avons donc créé une foire aux questions très détaillée que vous retrouvez ci-dessous et classifiée par thématique. Nous vous prions de la consulter en priorité.</p>
        </div>
        <div class="right"></div>
      </div>
    </a>
  </div>
<?php
require_once 'utils/footer.php';
?>

</body>
</html>