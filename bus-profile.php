<?php
  require_once'connection.php';

  session_start();
  $default = 'img/default.jpg';
  $nbr = 0;

  if(empty($_POST['nom'])||
     empty($_POST['wilaya'])||
     empty($_POST['cat'])||
     empty($_POST['adr'])||
     empty($_POST['num'])||
     empty($_POST['descr'])
   ){
     die('Veuillez remplir tous les champs');
   }
   $Stmt = $db->prepare('INSERT INTO business (nom,wilaya,cat,adr,NbrLike,descr,NumTel,img) VALUES (:nom,:wilaya,:cat,:adr,0,:descr,:num,:img);');
   $Stmt-> bindParam('nom',$POST['nom']);
   $Stmt-> bindParam('wilaya',$POST['wilaya']);
   $Stmt-> bindParam('cat',$POST['cat']);
   $Stmt-> bindParam('adr',$POST['adr']);
   $Stmt-> bindParam('num',$POST['num']);
   $Stmt-> bindParam('descr',$POST['descr']);
   $Stmt-> bindParam('img',$default);
   $Stmt->execute();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  </body>
</html>
