<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/create_business.css">
    <title></title>
  </head>
  <body>
    <div class="info">
      <div class="logo">
        <a href="#"><img src="img/businessLogo.svg" alt="Logo" width="200px"></a>
      </div>
      <h2>Remplir les informations </br>de votre entreprise</h2>
    </div>
    <div class="box-container">
      <form action="bus-profile.php" method="post">
        <input type="text" name="nom" placeholder="Nom de l'entreprise">
        <input type="text" name="wilaya" placeholder="Wilaya">
        <input type="text" name="cat" placeholder="Catégorie">
        <input type="text" name="adr" placeholder="Adresse">
        <input type="text" name="num" placeholder="Numéro de téléphone">
        <textarea name="descr" placeholder="Description" rows="8" cols="32"></textarea>
        <input type="submit" name="" placeholder="Continuer">
      </form>
      <?php if (isset($_GET['error'])) {?>
        <p class="error_message"><?php echo $_Get['error']; ?></p>
      <?php } ?>
    </div>
  </body>
</html>
