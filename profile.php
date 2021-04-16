<?php
  session_start();

  require_once'connection.php';
  if (isset($_POST['username']) && isset($_POST['password'])) {
    # code...
  }else{
    header('Location: index.php');
    exit();
  }
  $msg='';
  //Filtrer les entré utilisateurs
  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $username = validate($_POST['username']);
  $password = validate($_POST['password']);
  if($username != "" && $password != ""){
    try{
      $Stmt = $db->prepare("SELECT * FROM users WHERE nom = :username AND password = :password");
      $Stmt-> bindParam('username',$username, PDO::PARAM_STR);
      $Stmt-> bindParam('password',$password, PDO::PARAM_STR);
      $Stmt->execute();
      $count = $Stmt->rowCount();
      $row = $Stmt->fetch();
      if($count == 1 && !empty($row)){
        $_SESSION['session_id'] = $row['id'];
        $_SESSION['session_nom'] = $row['nom'];
      }
      else{
        header("Location: login.php?error=Mot de passe incorrect");
        $msg = 'Mot de passe incorrect !';
      }
    }
    catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  }
  else{
    $msg = 'Veuillez remplir les deux champs';
  }
?>