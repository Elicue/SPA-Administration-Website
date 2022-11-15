<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connection</title>
    <link rel="stylesheet" href="css/style.css">
  <link rel="icon" type="image/png" href="images/logo.png" />
  
</head>
<body class="connect">
  <?php
      require_once 'utils/header.php';
      require_once 'connection.php';
      session_start();
  ?>
  <div class="content">
    <div class="haut">
      <div class="left">
        <div class="fond"></div>
        
        <form method="post">
          <h1>Se connecter</h1>
          <input type="email" name="email" placeholder="E-mail"><br>
          <input type="password" name="password" placeholder="Mot-de-passe"><br>
          <input type="submit" value="Se connecter">
        </form>
      </div>
      <div class="right">
        <img src="images/paw.png" alt="paw">
        <div class="txt">
          <h4>Devenez Compagnon SPA</h4>
          <p>Aidez des animaux abandonnés comme Buck qui ont été retrouvés seuls et traumatisés par cette épreuve. Aidez-les à reprendre confiance en l’être humain en donnant tous les mois le montant que vous souhaitez.
            Devenez ainsi Compagnon SPA et grâce à votre don régulier, reconstruisez des vies brisées en les préparant à être de nouveau aimés. Offrez-leur ainsi les meilleurs soins pour se remettre sur pattes avant d’être adoptés auprès d’une famille aimante.</p>
        </div>
      </div>
    </div>
  </div>


  <div class="sous">
    <div class="content">
      <div class="left"></div>
      <div class="right">

        <div class="patoune">
          <img src="images/paw.png" alt="">
        </div>

        <div class="txt">
          <h2>Pour l'abolition de la corrida en France</h2>
          <p>Aujourd’hui encore, au nom de la tradition, des centaines de taureaux sont torturés et tués chaque année lors des corridas.
          Il est temps de mettre fin à ces spectacles de souffrance, dans lesquels un être doué de sensibilité est torturé à des fins de divertissement.</p>
        </div>
      </div>
    </div>
  </div>

  <?php
    if ($_POST) {
    
      $connection = new Connection();
      $account = $connection->account();
    
    }
  require_once 'utils/footer.php';
  ?>
</body>
</html>