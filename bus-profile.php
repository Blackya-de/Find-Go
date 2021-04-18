<?php
<<<<<<< HEAD
  session_start();
  include("connection.php");
  $reponse = $db->prepare('SELECT * FROM business WHERE nom = ?;');
  $reponse-> bindParam(1,$_GET['profile']);
  $reponse-> execute();
  $donnes = $reponse->fetch()
 ?>
<!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="CSS/busin-profile.css">
     <script src="https://kit.fontawesome.com/1c84e8a5c3.js" crossorigin="anonymous"></script>
     <title><?php echo $donnes['nom']; ?></title>
   </head>
   <body>
     <header>
       <div class="nav-bar">
         <div class="logo">
           <a href="search.php"><img src="img/Logo2.svg" alt="" width="100px"></a>
         </div>
         <h2 id="name"><?php echo $donnes['nom']; ?></h2>
         <div class="connexion-options">
           <span style="font-size: 25px; color: Dodgerblue;">
             <i class="fas fa-bell"></i>
           </span>
           <img src="img/Food.jpeg" alt="" width="50px;">
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
             <i class="fas fa-sign-out-alt"></i>
           </span>
           <a href="logout.php"><h3>Déconnexion</h3></a>
         </div>
       </div>
       <div class="content">
         <div class="boxes">
           <div class="box-container info-box">
             <div class="image-container">
               <img src="<?php echo $donnes['img']; ?>" alt="">
             </div>
             <div class="info-section">
               <h2 class="title">Profile Informations</h2>
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
                   <p>0541 24 78 54</p>
                 </div>
                 <div class="items items-options">
                   <span style="font-size: 20px; color: #ff5f6d;">
                     <i class="fas fa-envelope"></i>
                   </span>
                   <p>thetwelve@yahoo.com</p>
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
                 <div id="action">
                   <a href="#" class="btn">
                     <span style="font-size: 20px; color: Dodgerblue;">
                       <i class="far fa-star"></i>
                     </span>
                     Écrire une critique</a>
                 </div>
                 <div id="action">
                   <a href="#" class="btn-2">
                     <span style="font-size: 20px; color: Dodgerblue;">
                       <i class="fas fa-camera"></i>
                     </span>
                     Ajouter une Photo</a>
                 </div>
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
         <div class="photos">
           <h2>Photo de Twelve</h2>
         </div>
       </div>
     </section>
   </body>
 </html>
=======
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
>>>>>>> b7534ddd8c06487c95a4ae996a8ab3df2525fb71
