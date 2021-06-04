<?php session_start();
include('functions.php');
creationPanier();
if (isset($_POST['chosenArticleId'])) {
  $productId = $_POST['chosenArticleId'];
  $article = getArticleFromId($productId);
  addArticle($article);
}

if (isset($_POST['productQuantity'])) {
  modifQuantity();
}

if (isset($_POST['deleteArticleId'])) {
  deleteArticle();
}

if (isset($_POST['emptyCart'])) {
  $_SESSION['panier'] = [];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Boutique</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css" />
  <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
</head>

<body>

<?php include('header.php') ?>

  <body style="background-color:#F9E79F;">
    <div class="row">
      <div class="col ">
        <img src="images/boutique.jpg" class="img-fluid w-100" alt="boutiquecostumehomme">
      </div>
    </div>

    <div class="container mb-5 mt-5 ">
      <?php
      showCart("panier.php");
      $total = cartTotal(); ?>
      <p class="d-flex justify-content-center">Montant total du panier :<b> <?php echo $total; ?> Euros.</b> </i><br></p>
       <p class="d-flex justify-content-center"> Frais de port : 10 Euros / costumes.</p>
    </div>

    <div class="container d-flex justify-content-center align-items-center">
      <form action="panier.php" method="post" class="mb-2 mt-2">
        <input type="hidden" name="emptyCart">
        <input type="submit" value="vider le panier" class="btn btn-danger ms-5">
      </form>
      <a href="validation.php"><button type="button" class="btn btn-success ms-5">Valider la commande</button></a>
    </div>

  </body>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col align-self-center text-center mb-3 mt-5">
          <p>Copyright @ Costume du plus beau.</p>
        </div>
      </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>