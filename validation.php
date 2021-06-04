<?php session_start();
include('functions.php');
creationPanier();
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

<body style="background-color:#F9E79F;">

<?php include('header.php') ?>

  <div class="row">
    <div class="col ">
      <img src="images/boutique.jpg" class="img-fluid w-100" alt="boutiquecostumehomme">
    </div>
  </div>

  <div class="container mb-5 mt-5 ">
    <?php
    showCart("validation.php");
    $total = cartTotal(); ?>
    <div class="d-flex justify-content-center"><p>Montant total du panier : </p><b><?php echo $total; ?> <i class="fas fa-euro-sign fa-1x"></i></b></div>
    <div class="d-flex justify-content-center align-items-center">
      <p>Vos frais d'éxpéditions sont de <?php echo  expedition(); ?> <i class="fas fa-euro-sign fa-1x"></i></p>
    </div>
  </div>

  <div class="container d-flex justify-content-center">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Valider votre commande !
    </button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Commande validée !</h5>
          </div>
          <div class="modal-body">
            <p>Félicitation votre commande a été validée !</p>
            <p>Votre date de livraison est prévue le <?php setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
                                                      $date = date("Y-m-d");
                                                      echo strftime("%A %d %B %Y", strtotime($date . " + 3 days")); ?> !</p>
            <p>Merci pour votre achat et à bientôt !</p>
          </div>
          <div class="modal-footer">
            <form action="index.php" method="post" class="mb-2 mt-2">
              <input type="hidden" name="orderValidated">
              <input type="submit" value="Retour à l'accueil" class="btn btn-secondary">
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>

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