<?php
<<<<<<< HEAD
  session_start();
  include("connection.php");
  $reponse = $db->query('SELECT * FROM business');
  $donnes = $reponse->fetch()
=======
  include("connection.php");
  $reponse = $db->query('SELECT * FROM business');
>>>>>>> b7534ddd8c06487c95a4ae996a8ab3df2525fb71
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/1c84e8a5c3.js" crossorigin="anonymous"></script>
    <title>Search</title>
  </head>
  <body>
    <header>
      <div class="nav-bar">
        <div class="nav-bar-header">
          <div class="logo">
            <a href="#"><img src="img/Logo2.svg" alt="Logo" width="100px"></a>
          </div>
          <div class="search-bar">
            <div class="search-container">
              <input type="text" name="" placeholder="Search">
              <a href="#"> <li class="fa fa-search"></li> </a>
            </div>
          </div>
          <div id="for-business">
            <a href="business.php">For Businesses</a>
            <a href="#">For Clients</a>
          </div>
          <?php if ((isset($_SESSION['session_nom']))&&(isset($_SESSION['session_id']))) { ?>
            <div class="connexion-options">
              <span style="font-size: 25px; color: Dodgerblue;">
                <i class="fas fa-bell"></i>
              </span>
              <img src="<?php echo $_SESSION['session_img'];?>" alt="" width="50px;" class="profile-img">
            </div>
          <?php }else { ?>
          <div class="login-sigup-button">
            <a href="login.php" class="btn">Login</a>
            <a href="register.php" class="btn" id="SignUp">SignUp</a>
          </div>
        <?php }?>
        </div>
        <div class="nav-bar-menu">
          <div class="dropdown">
            <a href="#">Restaurant</a>
            <span style="font-size: 14px; color: Dodgerblue;">
              <i class="fas fa-chevron-down"></i>
            </span>
            <div class="dropdown-content">
              <a href="#">Fast-Food</a>
              <a href="#">Traditionnelle</a>
              <a href="#">Livraison</a>
            </div>
          </div>
          <div class="dropdown">
            <a href="#">Home Services</a>
            <span style="font-size: 14px; color: Dodgerblue;">
              <i class="fas fa-chevron-down"></i>
            </span>
            <div class="dropdown-content">
              <a href="#">Plombier</a>
              <a href="#">Link 2</a>
              <a href="#">Link 3</a>
            </div>
          </div>
          <div class="dropdown">
            <a href="#">Auto Services</a>
            <span style="font-size: 14px; color: Dodgerblue;">
              <i class="fas fa-chevron-down"></i>
            </span>
            <div class="dropdown-content">
              <a href="#">Plombier</a>
              <a href="#">Link 2</a>
              <a href="#">Link 3</a>
            </div>
          </div>
          <div class="dropdown">
            <a href="#">More</a>
            <span style="font-size: 14px; color: Dodgerblue;">
              <i class="fas fa-chevron-down"></i>
            </span>
            <div class="dropdown-content">
              <a href="#">Plombier</a>
              <a href="#">Link 2</a>
              <a href="#">Link 3</a>
            </div>
          </div>
        </div>
      </div>
      <section class="Search">
        <div class="filter-section">
          <h2>Filters</h2>
          <div class="filter-options">
            <h2>Features</h2>
            <form class="" action="index.html" method="post">
              <label class="container">Open Now
                <input type="checkbox" >
                <span class="checkmark"></span>
              </label>
              <label class="container">For Groups
                <input type="checkbox">
                <span class="checkmark"></span>
              </label>
              <label class="container">For Kids
                <input type="checkbox">
                <span class="checkmark"></span>
              </label>
              <label class="container">Outedoors places
                <input type="checkbox">
                <span class="checkmark"></span>
              </label>
            </form>
            <a href="#" id="See-all">See all</a>
          </div>
          <div class="filter-options">
            <h2>Wilaya</h2>
            <form class="" action="index.html" method="post">
              <label class="container">Alger
                <input type="checkbox">
                <span class="checkmark"></span>
              </label>
              <label class="container">Tizi Ouzou
                <input type="checkbox">
                <span class="checkmark"></span>
              </label>
              <label class="container">Oran
                <input type="checkbox">
                <span class="checkmark"></span>
              </label>
              <label class="container">Sétif
                <input type="checkbox">
                <span class="checkmark"></span>
              </label>
            </form>
            <a href="#" id="See-all">See all</a>
          </div>
        </div>
        <div class="search-content">
          <div class="search-desc">
            <h2 id="search-title">Résultat pour Tizi Ouzou</h2>
            <div class="sort">
              <div class="dropdown">
                <a href="#">Recommandé</a>
                <span style="font-size: 14px; color: Dodgerblue;">
                  <i class="fas fa-chevron-down"></i>
                </span>
                <div class="dropdown-content">
                  <a href="#">Plus Visité</a>
                  <a href="#">Plus liké</a>
                </div>
              </div>
            </div>
          </div>
          <?php
            $i = 1;
            while($donnes = $reponse->fetch())
             {
            ?>
            <div class="box-container">
            <div class="image-container">
              <img src=<?php echo $donnes['img'] ?> alt="">
            </div>
            <div class="info-container">
              <div class="profile-info">
                <h2><a href="bus-profile.php?profile=<?php echo $donnes['nom']; ?>"><?php echo $i.'.'.$donnes['nom']; ?></a></h2>
                <div class="stars">
                  <p><?php echo $donnes['NbrLike']; ?></p>
                  <span style="font-size: 18px; color: Dodgerblue;">
                    <i class="fas fa-star"></i>
                  </span>
                </div>
              </div>
              <?php echo '<p>' .$donnes['cat'] .'</p>'?>
              <div id="location">
                <span style="font-size: 20px; color: Dodgerblue;">
                  <i class="fas fa-map-marker-alt"></i>
                </span>
                <a href="#"> <?php echo $donnes['adr'] ?>.</a>
              </div>
              <p id="info-text"><span>&ldquo;</span> <?php echo $donnes['descr'] ?> .
                  <span>&ldquo;</span></p>
            </div>
          </div>
            <?php
            $i++;
            }
            ?>
        </div>
      </section>
    </header>
    <footer>
      <div class="About">

      </div>
    </footer>
    </div>
  </body>
</html>
