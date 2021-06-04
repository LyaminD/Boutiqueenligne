<?php
//--------------------------------------LISTE ARTICLE ET AFFICHAGE----------------------------//
function getArticle()
{

    $article1 = [
        'name' => 'Costume BEXLEY',
        'id' => '1',
        'price' => 2768,
        'description' => 'Léger et stylé',
        'details' => 'Costume 3 pièces bordeau en lin, très léger, agréable à porter en été !',
        'img' => 'costume1.jpg',
    ];

    $article2 = [
        'name' => 'Costume BRUCE FIELD',
        'id' => '2',
        'price' => 3268,
        'description' => 'Elegant et simple',
        'details' => 'Costume 3 pièces bleu en soie, léger, pour votre plus beau jour !',
        'img' => 'costume2.jpg',
    ];

    $article3 = [
        'name' => 'Costume COWT',
        'id' => '3',
        'price' => 3987,
        'description' => 'Classe et finesse',
        'details' => 'Costume 3 pièces blanc en tweed, soyez le plus beau de tous !',
        'img' => 'costume3.jpg',
    ];

    $article4 = [
        'name' => 'Costume Charles Tyrwhitt',
        'id' => '4',
        'price' => 4045,
        'description' => 'Luxe et simplicité',
        'details' => 'Costume 3 pièces écru en laine, demarquez vous des autres mariages !',
        'img' => 'costume.jpg',
    ];

    $listArticles = [];
    array_push($listArticles, $article1, $article2, $article3, $article4);

    return $listArticles;
}

function showArticle()
{
    $listArticles = getArticle();
    foreach ($listArticles as $product) {
        echo "  <div class=\"card mx-3 mb-5 mt-5 pt-2\" style=\"width: 18rem;\">
    <img src=\"images/" . $product['img'] . "\" class=\"card-img-top\" alt=\"...\">
    <div class=\"card-body\">
      <h5 class=\"card-title\">" . $product['name'] . "</h5>
      <p class=\"card-text\">" . $product['description'] . "</p>
      <p class=\"card-text\">" . $product['price'] . " <i class=\"fas fa-euro-sign fa-1x\"></i></p>
      <form  action=\"produit.php\" method=\"post\">     
      <input type=\"hidden\" value=\"" . $product['id'] . "\" name=\"chosenArticleId\">
      <input type=\"submit\" value=\"detail\" class=\"btn btn-primary\">
      </form>
      <form  action=\"panier.php\" method=\"post\">     
      <input type=\"hidden\" value=\"" . $product['id'] . "\" name=\"chosenArticleId\">
      <input type=\"submit\" value=\"acheter\" class=\"btn btn-primary mb-2 mt-2\">
      </form>
    </div>
  </div>";
    };
};

function getArticleFromId($id)
{
    $listArticles = getArticle();
    foreach ($listArticles as $article) {
        if ($article['id'] == $id) {
            return $article;
        }
    }
}

//---------------------------------PANIER -----------------------------------------//
function creationPanier()
{
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = array();
    }
}

function addArticle($article)
{
    $articleAdded = false;
    foreach ($_SESSION['panier'] as $product) {
        if ($product['id'] == $article['id']) {
            $articleAdded = true;
            echo "<script> alert(\"Article déjà présent dans le panier !\");</script>";
        }
    }
    if (!$articleAdded) {
        $article['quantity'] = 1;
        array_push($_SESSION['panier'], $article);
    }
}

function showCart($page)
{
    foreach ($_SESSION['panier'] as $product) { ?>
        <div class="container ">
            <div class="row align-items-center p-2">
                <div class="col-2">
                    <img src="images/<?php echo $product['img'] ?>" class="card-img-top w-50" alt="...">
                </div>
                <div class="col-2 d-flex align-items-center">
                    <h5 class="title"><?php echo $product['name'] ?></h5>
                </div>
                <div class="col-2 d-flex align-items-center">
                    <p class="text"><?php echo $product['price'] ?> <i class="fas fa-euro-sign fa-1x"></i></p>
                </div>
                <div class="col-2 d-flex align-items-center">
                    <p class="text"><?php echo $product['description'] ?></p>
                </div>
                <form action="<?php echo $page ?>" method="post" class="mb-2 mt-2 col-2 d-flex align-items-center">
                    <input class="col-2 offset-3 ms-2" type="number" value=<?php echo $product['quantity'] ?> name="productQuantity">
                    <input type="hidden" value=<?php echo $product['id'] ?> name="productId">
                    <input type="submit" value="modifier" class="btn btn-primary ms-2">
                </form>
                <form action="<?php echo $page ?>" method="post" class="mb-2 mt-2 col-2">
                    <input type="hidden" value=<?php echo $product['id'] ?> name="deleteArticleId">
                    <input type="submit" value="supprimer" class="btn btn-danger">
                </form>
            </div>
        </div><?php
            }
        };

        function showDetail($product)
        {  ?>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <img src="images/<?php echo $product['img'] ?>" class="card-img-top" alt="...">
                    </div>
                    <div class="col d-flex align-items-center">
                        <h5 class="title"><?php echo $product['name'] ?></h5>
                    </div>
                    <div class="col d-flex align-items-center">
                        <p class="text"><?php echo $product['price'] ?> <i class="fas fa-euro-sign fa-1x"></i></p>
                    </div>
                    <div class="col d-flex align-items-center">
                        <p class="text"><?php echo $product['description'] ?></p>
                    </div>
                    <div class="col d-flex align-items-center">
                        <p class="text"><?php echo $product['details'] ?></p>
                    </div>

                    <form action="panier.php" method="post" class="mb-2 mt-2 d-flex justify-content-center align-items-center">
                        <input type="hidden" value=<?php echo $product['id'] ?> name="chosenArticleId">
                        <input type="submit" value="acheter" class="btn btn-primary">
                    </form>
                </div>
            </div>
     <?php
        };

        function modifQuantity()
        {
            $newQuantity = $_POST['productQuantity'];

            $id = $_POST['productId'];

            if ($newQuantity >= 1 && $newQuantity <= 10) {
                for ($i = 0; $i < count($_SESSION['panier']); $i++) {
                    if ($id == $_SESSION['panier'][$i]['id']) {
                        $_SESSION['panier'][$i]['quantity'] = $newQuantity;
                    }
                };
            } else {
                echo "<script>alert(\"quantité saisie incorect\")</script>";
            };
        };

        function deleteArticle()
        {
            $id = $_POST['deleteArticleId'];
            for ($i = 0; $i < count($_SESSION['panier']); $i++) {
                if ($id == $_SESSION['panier'][$i]['id']) {
                    array_splice($_SESSION['panier'], $i, 1);
                    echo "<script>alert(\"article retiré du panier\")</script>";
                };
            };
        };

        function cartTotal()
        {
            $total = 0;
            if (count($_SESSION['panier']) > 0) {
                for ($i = 0; $i < count($_SESSION['panier']); $i++) {
                    $total += $_SESSION['panier'][$i]['quantity'] * $_SESSION['panier'][$i]['price'];
                }
                return $total;
            } else {
                echo "Votre panier est vide";
            }
        };

        function expedition()
        {
            return totalQuantity() * 10;
        }

        function totalQuantity()
        {
            $quantity = 0;

            if (count($_SESSION['panier']) > 0) {
                for ($i = 0; $i < count($_SESSION['panier']); $i++) {
                    $quantity += $_SESSION['panier'][$i]['quantity'];
                }
            }
            return $quantity;
        } ?>