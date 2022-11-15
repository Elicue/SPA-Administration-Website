<!doctype html>
<html lang="en">
<head>
  <?php  ?>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" type="image/png" href="images/logo.png" />
  <title>Admin</title>
</head>
<body class="admin">

    <?php
      require_once 'utils/header.php';
        require_once 'connection.php';
      require_once 'utils/donation.php';
      session_start();
    ?>
    <?php

        $connection = new Connection();
        $users = $connection->getAll();
        $pets = $connection->getAllPets();
        echo '<div class="content">';
        ?>
        <div class="left">
          <?php

          foreach($users as $user) {
            ?>
            <div class="card">
              <div class="txt">
                  <?php
        
                  echo '<h4>' . $user['first_name'] . ' ' . $user['last_name'] . '</h4>';
                  //echo '<a href="deleteUser.php?id=' . $user['id'] . '">Delete this user</a>';
        
                  echo '<ul>';
                  
                foreach($pets as $pet) {
                  if ($pet['user_id'] == $user['id']) {
                    echo '<p>' . $pet['name'] . ' ' . $pet['species'] . '</p>';
                    echo '<a href="deletePet.php?id=' . $pet['id'] . '">Delete this pet</a>';
                  }
                }
                ?>
              </div>  
              <div class="fond">
                <img src="images/paw.png" alt="paw">
              </div>
            </div>
            <?php
          }
          ?>
        
        </div>
        <div class="right">
          <img src="images/cat.png" alt="cat">
          <svg id="sw-js-blob-svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">                    <defs>                         <linearGradient id="sw-gradient" x1="0" x2="1" y1="1" y2="0">                            <stop id="stop1" stop-color="rgba(248, 117, 55, 1)" offset="0%"></stop>                            <stop id="stop2" stop-color="rgba(235, 101, 28, 1)" offset="100%"></stop>                        </linearGradient>                    </defs>                <path fill="url(#sw-gradient)" d="M29.1,-28.5C36.5,-21.7,40.5,-10.9,40,-0.5C39.4,9.8,34.4,19.6,27,26.1C19.6,32.7,9.8,36,0.1,35.9C-9.7,35.9,-19.4,32.5,-27.3,25.9C-35.2,19.4,-41.2,9.7,-41.3,0C-41.3,-9.8,-35.3,-19.5,-27.4,-26.3C-19.5,-33.1,-9.8,-36.9,0.5,-37.4C10.9,-38,21.7,-35.3,29.1,-28.5Z" width="100%" height="100%" transform="translate(50 50)" stroke-width="0" style="transition: all 0.3s ease 0s;"></path>              </svg>
        </div>

    <?php
      echo '</div>';
      require_once 'utils/footer.php';
    ?>
</body>
</html>