<?php

  session_start();
  include("connection.php");
  if(isset($_GET['profile'])){
    $reponse = $db->prepare('SELECT * FROM etablissement WHERE nom_et = ?;');
    $reponse-> bindParam(1,$_GET['profile']);
    $reponse-> execute();
    $donnes = $reponse->fetch();
  }else{
    include("connection.php");

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
     $Stmt = $db->prepare('INSERT INTO business (nom,wilaya,cat,adr,NbrLike,descr,NumTel,mdp) VALUES (:nom,:wilaya,:cat,:adr,0,:descr,:num,:mdp);');
     $Stmt-> bindParam('nom',$_POST['nom']);
     $Stmt-> bindParam('wilaya',$_POST['wilaya']);
     $Stmt-> bindParam('cat',$_POST['cat']);
     $Stmt-> bindParam('adr',$_POST['adr']);
     $Stmt-> bindParam('num',$_POST['num']);
     $Stmt-> bindParam('descr',$_POST['descr']);
     $Stmt-> bindParam('mdp',$_POST['password']);
     $Stmt->execute();
  }

 ?>
<!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="CSS/busin-profile.css">
     <script src="https://kit.fontawesome.com/1c84e8a5c3.js" crossorigin="anonymous"></script>
     <title><?php echo $donnes['nom_et']; ?></title>
   </head>
   <body>
     <header>
       <div class="nav-bar">
         <div class="nav-bar-header">
           <div class="logo">
             <a href="acceuil.php"><img src="img/Logo2.svg" alt="Logo" width="100px"></a>
           </div>
           <form class="search-container" action="search.php" method="post">
               <input type="text" name="search" placeholder="Search">
               <input type="text" name="wilaya" placeholder="Wilaya" id="separate">
               <button type="submit" name="button" class="button">
                 <a href="#"><li class="fa fa-search"></li></a>
               </button>
           </form>
           <div id="for-business">
             <a href="business.php">For Businesses</a>
             <a href="#">For Clients</a>
           </div>
           <?php if ((isset($_SESSION['session_nom']))&&(isset($_SESSION['session_id']))) { ?>
             <div class="connexion-options">
               <span style="font-size: 30px; color: #ff5f6d;">
                 <i class="fas fa-bell"></i>
               </span>
               <div class="dropdown">
                 <span style="font-size: 40px; color: #ff5f6d;">
                   <i class="fas fa-user-circle"></i>
                 </span>
                 <div class="dropdown-content dropdown-content-2">
                   <a href="profile.php">Profile</a>
                   <a href="logout.php">Déconnexion</a>
                 </div>
               </div>
             </div>
           <?php }else { ?>
           <div class="login-sigup-button">
             <a href="login.php" class="btn-3 ">Login</a>
             <a href="register.php" class="btn" id="SignUp">SignUp</a>
           </div>
         <?php }?>
         </div>
       </div>
     </header>
     <section class="profile-content">
       <div class="dashboard">
         <div class="items">
           <span style="font-size: 25px; color: Dodgerblue;">
             <i class="fas fa-qrcode"></i>
           </span>
           <h3>Dashboard</h3>
         </div>
         <div class="items">
           <span style="font-size: 25px; color: Dodgerblue;">
             <i class="fas fa-id-badge"></i>
           </span>
           <h3>Profile</h3>
         </div>
         <div class="items">
           <span style="font-size: 25px; color: Dodgerblue;">
             <i class="fas fa-pen-square"></i>
           </span>
           <h3>Modifier</h3>
         </div>
         <div class="items">
           <span style="font-size: 25px; color: Dodgerblue;">
             <i class="fas fa-sign-out-alt"></i>
           </span>
           <a href="logout.php"><h3>Déconnexion</h3></a>
         </div>
       </div>
       <div class="content">
         <div class="boxes">
           <div class="box-container info-box">
             <div class="image-container">
               <img src="<?php echo $donnes['image_et']; ?>" alt="" width="200px">
             </div>
             <div class="info-section">
               <h2 class="title"><?php echo $donnes['nom_et']; ?></h2>
               <div class="suivre">
                 <a href="#" class="btn-2">Suivre</a>
                 <p><?php echo $donnes['NbrLike']; ?> Abonnés</p>
               </div>
               <p><?php echo $donnes['cat']; ?></p>
               <p id="info-text"><span>&ldquo;</span>
                 <?php echo $donnes['descr']; ?>
                 <span>&ldquo;</span></p>
               </div>
               <div class="options">
                 <div class="items items-options">
                   <span style="font-size: 20px; color: #ff5f6d;">
                     <i class="fas fa-phone"></i>
                   </span>
                   <p><?php echo $donnes['tel'] ?></p>
                 </div>
                 <div class="items items-options">
                   <span style="font-size: 20px; color: #ff5f6d;">
                     <i class="fas fa-envelope"></i>
                   </span>
                   <p><?php echo $donnes['email']; ?></p>
                 </div>
                 <div class="items items-options">
                   <span style="font-size: 20px; color: #ff5f6d;">
                     <i class="fas fa-directions"></i>
                   </span>
                   <p>Site Web</p>
                 </div>
               </div>
               <div class="change">
                 <span style="font-size: 20px; color: #ff5f6d;">
                   <i class="fas fa-pen"></i>
                 </span>
                 <a href="#">Changer les information</a></li>
               </div>
             </div>
             <div class="right">
               <div class="box-container action-box">
                 <a href="avis.php?profile=<?php echo $donnes['nom_et']; ?>" class="btn-2 action">
                   <span style="font-size: 20px; color: Dodgerblue;">
                     <i class="fas fa-camera"></i>
                   </span>Écrire un Avis
                 </a>
                 <a href="#" class="btn action">
                   <span style="font-size: 20px; color: Dodgerblue;">
                     <i class="fas fa-camera"></i>
                   </span>Ajouter une photo
                 </a>
               </div>
               <div class="box-container location-box">
               <h2 class="title">emplacement et horaire</h2>
               <div class="location-map">
                 <img src="img/map.png" alt="">
               </div>
               <div id="location">
                 <span style="font-size: 20px; color: Dodgerblue;">
                   <i class="fas fa-map-marker-alt"></i>
                 </span>
                 <a href="#"><?php echo $donnes['adr']; ?></a>
               </div>
               <a href="" class="btn-2">Obtenir des direction</a>
               <div class="horaire">
                 <ul>
                   <li>DIM&emsp;9:00AM-5:30PM</li>
                   <li>LUN&emsp;9:00AM-5:30PM</li>
                   <li>MAR&emsp;9:00AM-5:30PM</li>
                   <li>MER&emsp;9:00AM-5:30PM</li>
                   <li>JEUD&emsp;9:00AM-5:30PM</li>
                   <li>VEN&emsp;FERMER</li>
                   <li>SAM&emsp;9:00AM-5:30PM</li>
                   <li>
                     <span style="font-size: 20px; color: #ff5f6d;">
                       <i class="fas fa-pen"></i>
                     </span>
                     <a href="#">Changer les information</a></li>
                   </ul>
                 </div>
               </div>
             </div>
         </div>
         <div class="avis">
           <h2>Avis des utilisateurs</h2>
           <div class="avis-item">             
             <?php
             $rsp = $db->prepare('SELECT * FROM avis where id_et = ?;');
             $rsp->bindParam(1,$donnes['id_et']);
             $rsp->execute();
             while($data = $rsp->fetch()){
               ?>
               <div class="box-avis">
                 <div class="user-info">
                   <?php
                   $clt = $db->prepare('SELECT * FROM clients WHERE id = ?;');
                   $clt-> bindParam(1,$data['id']);
                   $clt->execute();

                   $user = $clt->fetch();
                   ?>
                   <h2><?php echo $user['nom']; ?></h2>
                 </div>
                 <p><?php echo $data['commentaire']; ?></p>
               </div>
             <?php } ?>
           </div>
         </div>
       </div>
     </section>
   </body>
 </html>
