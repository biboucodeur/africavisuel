<?php


include("configuration/config.php");


$category = isset($_GET['category']) ? $_GET['category'] : '';
$brand = isset($_GET['brand']) ? $_GET['brand'] : '';
$min_price = isset($_GET['min_price']) ? $_GET['min_price'] : 10000;
$max_price = isset($_GET['max_price']) ? $_GET['max_price'] : 4000000;


$sql = "SELECT products.*, categories.name as category_name, brands.name as brand_name 
        FROM products 
        JOIN categories ON products.category_id = categories.id 
        JOIN brands ON products.brand_id = brands.id 
        WHERE 1=1";

$params = [];

if (!empty($category)) {
    $sql .= " AND categories.name = :category";
    $params['category'] = $category;
}

if (!empty($brand)) {
    $sql .= " AND brands.name = :brand";
    $params['brand'] = $brand;
}

$sql .= " AND price BETWEEN :min_price AND :max_price";
$params['min_price'] = $min_price;
$params['max_price'] = $max_price;

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$products = $stmt->fetchAll();

$categories = $pdo->query("SELECT name FROM categories")->fetchAll();
$brands = $pdo->query("SELECT name FROM brands")->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="./styles/africa.css">
    <title>AFRICA VISUEL</title>
    <style>
        .boutique-page {
            display: flex;
            flex-wrap: wrap;
            padding: 2rem 1rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .filters {
            flex: 1 1 25%;
            padding: 1rem;
            box-sizing: border-box;
            border-right: 1px solid #ccc;
        }

        .filters h2 {
            font-size: 1.5rem;
            color: #333;
        }

        .filter-group {
            margin-bottom: 1rem;
        }

        .filter-group label {
            display: block;
            font-size: 1rem;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .filter-group select,
        .filter-group input {
            width: 100%;
            padding: 0.5rem;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .filters button.Btn {
            background-color: #0F47AD;
            border: none;
            padding: 0.5rem 1rem;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .filters button.Btn:hover {
            background-color: #e68900;
        }

        .products {
            flex: 1 1 75%;
            padding: 1rem;
            box-sizing: border-box;
        }

        .products h1 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .product-list {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
        }

        .product-item {
            flex: 1 1 calc(33.333% - 2rem);
            background: #fff;
            padding: 1rem;
            box-sizing: border-box;
            border-radius: 5px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .product-item img {
            max-width: 200px;
            height: 200px;
            margin-bottom: 1rem;
        }

        .product-item h3 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .product-item p {
            font-size: 1rem;
            color: #666;
            margin-bottom: 0.5rem;
        }

        .product-item .Btn {
            background-color: #0F47AD;
            border: none;
            padding: 0.5rem 1rem;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .product-item .Btn:hover {
            background-color: #e68900;
        }

        @media (max-width: 768px) {

            .filters,
            .products {
                flex: 1 1 100%;
            }

            .product-item {
                flex: 1 1 100%;
            }
        }
    </style>
</head>

<body>
    <?php include("includes/nav.php") ?>

    <main class="boutique-page">
        <aside class="filters">
            <h2>Filtres</h2>
            <form method="GET" action="boutique.php">
                <div class="filter-group">
                    <label for="category">Catégorie</label>
                    <select id="category" name="category">
                        <option value="">Toutes</option>
                        <?php foreach ($categories as $cat) : ?>
                            <option value="<?= htmlspecialchars($cat['name']) ?>" <?= $cat['name'] == $category ? 'selected' : '' ?>><?= htmlspecialchars($cat['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="filter-group">
                    <label for="brand">Marque</label>
                    <select id="brand" name="brand">
                        <option value="">Toutes</option>
                        <?php foreach ($brands as $br) : ?>
                            <option value="<?= htmlspecialchars($br['name']) ?>" <?= $br['name'] == $brand ? 'selected' : '' ?>><?= htmlspecialchars($br['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="filter-group">
                    <label for="min_price">Prix Min</label>
                    <input type="number" id="min_price" name="min_price" value="<?= htmlspecialchars($min_price) ?>" min="0" step="0.01">
                </div>
                <div class="filter-group">
                    <label for="max_price">Prix Max</label>
                    <input type="number" id="max_price" name="max_price" value="<?= htmlspecialchars($max_price) ?>" min="0" step="0.01">
                </div>
                <button type="submit" class="Btn">Appliquer</button>
            </form>
        </aside>

        <section class="products">
            <h1>Nos Produits</h1>
            <div class="product-list">
                <?php
                if (empty($products)) {
                    echo "<p>Aucun produit ne correspond aux critères de recherche.</p>";
                } else {
                    foreach ($products as $product) : ?>
                        <div class="product-item">
                            <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                            <h3><?= htmlspecialchars($product['name']) ?></h3>
                            <p>Catégorie: <?= htmlspecialchars($product['category_name']) ?></p>
                            <p>Marque: <?= htmlspecialchars($product['brand_name']) ?></p>
                            <p>Prix: <?= htmlspecialchars($product['price']) ?> FCFA</p>
                            <p><?= htmlspecialchars($product['description']) ?></p>
                            <a href="contact.php" class="Btn">Contactez-nous</a>
                        </div>

                <?php endforeach;
                }
                ?>
            </div>
        </section>
    </main>

    <?php include("includes/footer.php") ?>
</body>

</html>