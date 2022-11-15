<!doctype html>
<html lang="en">
<head>
    <?php  ?>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>My Account</title>
  <link rel="icon" type="image/png" href="images/logo.png" />
</head>
<body class="account">

  <?php
    require_once 'pet.php';
    require_once 'connection.php';
    require_once 'utils/header.php';
    require_once 'utils/donation.php';
    session_start();

    ?>
  <div class="bas">
    <div class="left">
      <img src="images/paw.png" alt="paw">
      <div class="txt">
        <h4>Signaler une maltraitance</h4>
        <p>Un animal victime d’abus est un animal qui ne peut se défendre seul. Il en va donc de notre responsabilité commune de signaler toute situation nous semblant mettre en péril son bien-être. La SPA reçoit quotidiennement de nombreux signalements de souffrance, qu’elle va vérifier sur le terrain. Découvrez le parcours d’un signalement.
        Afin d’accélérer le processus de signalement, la SPA a mis en place un formulaire maltraitance que vous pourrez remplir selon la nature de l’abus constaté.</p>
      </div>
    </div>
    <div class="right">
      <div class="fond"></div>
  
      <div class="adm">
      <?php
        if($_SESSION['isAdmin'] == 1){
          ?> 
          <div class="content">
            <?php
            echo '<a href="../admin.php"><ion-icon name="person"></ion-icon></a>';
            echo '<p>admin</p>';
            ?>
          </div> 
          <?php
        }
      ?>
      </div>

      <div class="adm">
      <?php
        if($_SESSION['isAdmin'] == 0){
          ?> 
          <div class="content">
            <?php
            echo '<a href="../myPets.php"><ion-icon name="heart"></ion-icon></a>';
            echo '<p>My pets</p>';
            ?>
          </div> 
          <?php
        }
      ?>
      </div>

      <div class="dpt">
      <?php
        if($_SESSION['isAdmin'] == 0){
          ?> 
          <div class="content">
            <?php
            echo '<a href="../my-account.php"><img src="../images/adoption_w.svg" alt="adoption"></a>';
            echo '<p>Adopt</p>';
            ?>
          </div> 
          <?php
        }
      ?>
      </div>

      <form method="post">
        <h1>Adopter un animal</h1>
        <input type="text" name="name" placeholder="Nom"><br>
        <input type="text" name="species" placeholder="Espèce"><br>
        <input type="submit" value="Adopter">
      </form>
    </div>
  </div>

  <div class="bandeau">
      <section>
          <img src="images/illu-experiences.svg" alt="xp">
          <div class="txt">
              <h3>176 ans </h3>
              <p>D’EXISTENCE</p>
          </div>
      </section>
      <section>
          <img src="images/illu-refuges.svg" alt="xp">
          <div class="txt">
              <h3>75</h3>
              <p>REFUGES, MAISONS SPA ET DISPENSAIRES  </p>
          </div>
      </section>
      <section>
          <img src="images/illu-animaux-2.svg" alt="xp">
          <div class="txt">
              <h3>463 267</h3>
              <p>ANIMAUX SAUVÉS DEPUIS 2009</p>
          </div>
      </section>
      <section>
          <img src="images/illu-animaux.svg" alt="xp">
          <div class="txt">
              <h3>414 270</h3>
              <p>ADOPTIONS DEPUIS 2009</p>
          </div>
      </section>
  </div>

  <div class="deux">
    <a href="https://boutique-solidaire.com/la-spa/69-cadons"></a>
  </div>

  <?php
  
    if ($_POST) {
          
      $pet = new Pet(
        $_POST['name'],
        $_POST['species'],
        $_POST['user_id']= $_SESSION['id'],
      );

      if ($pet->verify()) {
        // save to database
        $connection = new Connection();
        $result = $connection->insertPet($pet);
  
        if ($result) {
          echo '';
          //echo 'Pet added';
        } else {
          echo 'Pet addition failed';
        }
      } else {
        echo 'Form invalid';
      }
    }
  
  ?>

  <?php
  require_once 'utils/footer.php';
  ?>
</body>
</html>