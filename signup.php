<?php
  $data = $_POST;

  if ($_SERVER["REQUEST_METHOD"]=="POST") {
    if(trim($data['username'])==""){
      $erreur = "Le champs nom est vide.";
      header("Location: register.php?error=$erreur");
    }
    if(trim($data['email'])==""){
      $erreur = "Le champs email est vide";
      header("Location: register.php?error=$erreur");
    }

  }

/*  if(empty($data['username'])||
    empty($data['email'])||
    empty($data['password'])||
    empty($data['confirm-password'])){
      die('Veuillez remplir tous les champs');
    }
    */
  if ($data['password'] !== $data['confirm-password']) {
    die('Les deux mots de passes sont différents');
  }

  include("connection.php");

  $Stmt = $db->prepare('INSERT INTO users (nom , email ,password) VALUES (?,?,?)');
  $Stmt-> bindParam(1,$data['username']);
  $Stmt-> bindParam(2,$data['email']);
  $Stmt-> bindParam(3,$data['password']);
  $Stmt->execute();
?>
