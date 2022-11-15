<?php

class Connection
{
  public PDO $pdo;
  
  public function __construct()
  {
    $this->pdo = new PDO('mysql:dbname=rendu_spa;host=127.0.0.1', 'root', 'root');
  }
  
  public function insertUser(User $user): bool
  {
    $query = 'INSERT INTO user (email, password, first_name, last_name)
                  VALUES (:email, :password, :first_name, :last_name)';
    
    $statement = $this->pdo->prepare($query);
    
    return $statement->execute([
      'email' => $user->email,
      'password' => md5($user->password . 'lul'),
      'first_name' => $user->firstName,
      'last_name' => $user->lastName,
    ]);
  }
  
  public function insertPet(Pet $pet): bool
  {
    $query = 'INSERT INTO pet (name, species, user_id)
                    VALUES (:name, :species, :user_id)';
    
    $statement = $this->pdo->prepare($query);
    
    return $statement->execute([
      'name' => $pet->name,
      'species' => $pet->species,
      'user_id' => $pet->user_id,
    ]);
  }
  
  public function getAll(): array
  {
    $query = 'SELECT * FROM user';
    
    $statement = $this->pdo->prepare($query);
    $statement->execute();
    
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }
  
  public function getAllPets(): array
  {
    $query = 'SELECT * FROM pet';
    
    $statement = $this->pdo->prepare($query);
    $statement->execute();
    
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }
  
  public function MyPets(): array
  {
    $query = 'SELECT * FROM PET';
    
    $statement = $this->pdo->prepare($query);
    $statement->execute();
    
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }
  
  
  public function deleteUser(int $id): bool
  {
    $query = 'DELETE FROM user
                  WHERE id = :id';
    
    $statement = $this->pdo->prepare($query);
    
    return $statement->execute([
      'id' => $id,
    ]);
  }
  
  public function deletePet(int $id): bool
  {
    $query = 'DELETE FROM pet
                    WHERE id = :id';
    
    $statement = $this->pdo->prepare($query);
    
    return $statement->execute([
      'id' => $id,
    ]);
  }
  
  public function deleteMyPet(int $id): bool
  {
    $query = 'DELETE FROM pet
                    WHERE id = :id';
    
    $statement = $this->pdo->prepare($query);
    
    return $statement->execute([
      'id' => $id,
    ]);
  }
  
  public function account()
  {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $query = 'SELECT * FROM user
                    WHERE email =? ';
    
    $statement = $this->pdo->prepare($query);
    $statement->execute(array($email));
    $users = $statement->fetch();
    if ($email === '' || $password === '') {
      echo 'Wrong users or password try again';
    } else {
      //var_dump($users);
      if ($users['password'] == md5($password . 'lul')) {
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $users['id'];
        $_SESSION['isAdmin'] = $users['isAdmin'];
        header('Location: my-account.php');
        exit;
      }else{
        print_r($_SESSION);
        echo 'error';
      }
    }
  }
}