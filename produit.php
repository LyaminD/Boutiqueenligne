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

  <div class="container mb-5 mt-5">
    <?php
    if (isset($_POST['chosenArticleId'])) {
      $productId = $_POST['chosenArticleId'];
      $article = getArticleFromId($productId);
      showDetail($article);
    };
    ?>
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