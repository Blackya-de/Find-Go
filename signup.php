<?php
  $data = $_POST;

  if(empty($data['username'])||
    empty($data['email'])||
    empty($data['password'])||
    empty($data['confirm-password'])){
      die('Veuillez remplir tous les champs');
    }
  if ($data['password'] !== $data['confirm-password']) {
    die('Les deux mots de passes sont différents');
  }

  require_once'connection.php';

  $Stmt = $db->prepare('INSERT INTO users (nom , email ,password) VALUES (?,?,?)');
  $Stmt-> bindParam(1,$data['username']);
  $Stmt-> bindParam(2,$data['email']);
  $Stmt-> bindParam(3,$data['password']);
  $Stmt->execute();
?>
