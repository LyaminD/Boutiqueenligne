<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">AuPlusBeau</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center " id="navbarNavAltMarkup">
          <div class="navbar-nav d-flex">
            <a class="nav-link active " aria-current="page" href="index.php">Accueil</a>
            <a class="nav-link " href="produit.php">Produits</a>
            <a class="nav-link" href="panier.php">Panier (<?php echo totalQuantity() ?>)</a>
          </div>
        </div>
      </div>
    </nav>
  </header>