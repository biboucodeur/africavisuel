<?php
ob_start(); 
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
        .add-product-page {
            padding: 2rem 1rem;
            max-width: 800px;
            margin: 0 auto;
        }

        .add-product-form {
            background-color: #fff;
            padding: 2rem;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .add-product-form h1 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            font-size: 1rem;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group select,
        .form-group textarea,
        .form-group input[type="file"] {
            width: 100%;
            padding: 0.5rem;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group textarea {
            resize: vertical;
        }

       
    </style>
</head>

<body>
    <?php include("includes/nav.php") ?>

    <?php
    include("configuration/config.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $category_id = $_POST['category_id'];
        $brand_id = $_POST['brand_id'];
        $price = $_POST['price'];
        $description = $_POST['description'];

        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($_FILES['image']['name']);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            $image = $uploadFile;

            $sql = "INSERT INTO products (name, category_id, brand_id, price, image, description) 
                    VALUES (:name, :category_id, :brand_id, :price, :image, :description)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'name' => $name,
                'category_id' => $category_id,
                'brand_id' => $brand_id,
                'price' => $price,
                'image' => $image,
                'description' => $description
            ]);

            // Redirection après l'ajout
            header("Location: boutique.php");
            exit;
        } else {
            echo "Erreur lors du téléchargement de l'image.";
        }
    }

    $categories = $pdo->query("SELECT id, name FROM categories")->fetchAll();
    $brands = $pdo->query("SELECT id, name FROM brands")->fetchAll();
    ?>

    <main class="add-product-page">
        <section class="add-product-form">
            <h1>Ajouter un Produit</h1>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Nom du Produit</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="category_id">Catégorie</label>
                    <select id="category_id" name="category_id" required>
                        <option value="">Sélectionner une catégorie</option>
                        <?php foreach ($categories as $cat) : ?>
                            <option value="<?= htmlspecialchars($cat['id']) ?>"><?= htmlspecialchars($cat['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="brand_id">Marque</label>
                    <select id="brand_id" name="brand_id" required>
                        <option value="">Sélectionner une marque</option>
                        <?php foreach ($brands as $br) : ?>
                            <option value="<?= htmlspecialchars($br['id']) ?>"><?= htmlspecialchars($br['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Prix (FCFA)</label>
                    <input type="number" id="price" name="price" min="0" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="image">Image du Produit</label>
                    <input type="file" id="image" name="image" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="5" required></textarea>
                </div>
                <button type="submit" class="Btn">Ajouter le Produit</button>
            </form>
        </section>
    </main>

    <?php include("includes/footer.php") ?>

</body>

</html>

<?php
ob_end_flush();
?>
