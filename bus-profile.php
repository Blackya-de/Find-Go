<?php
  include("connection.php");

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
   $Stmt-> bindParam('nom',$_POST['nom']);
   $Stmt-> bindParam('wilaya',$_POST['wilaya']);
   $Stmt-> bindParam('cat',$_POST['cat']);
   $Stmt-> bindParam('adr',$_POST['adr']);
   $Stmt-> bindParam('num',$_POST['num']);
   $Stmt-> bindParam('descr',$_POST['descr']);
   $Stmt-> bindParam('img',$default);
   <!DOCTYPE html>
   <html>
   <head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="CSS/busin-profile.css">
   <title><?php echo $_POST['nom']; ?></title>
 </head>
 <body>
   <header>
     <div class="nav-bar">
       <div class="logo">
         <a href="search.php"><img src="img/Logo2.svg" alt="" width="100px"></a>
       </div>
     </div>
   </header>
 </body>
 </html>
   $Stmt->execute();
 ?>
