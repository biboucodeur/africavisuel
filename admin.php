<?php

session_start();
if (!$_SESSION['password']) {
    header('location: login.php');
}

ob_start(); // Démarre la mise en mémoire tampon

// Connexion à la base de données
include("configuration/config.php");

// Récupérer les informations de contact
$contacts = $pdo->query("SELECT * FROM contact")->fetchAll();

// Récupérer les emails de la newsletter
$newsletters = $pdo->query("SELECT * FROM newsletter")->fetchAll();

// Récupérer les catégories et les marques pour les options du formulaire
$categories = $pdo->query("SELECT id, name FROM categories")->fetchAll();
$brands = $pdo->query("SELECT id, name FROM brands")->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="./styles/africa.css">
    <title>Admin - AFRICA VISUEL</title>
    <style>
        .admin-page {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .admin-section {
            margin-bottom: 40px;
        }

        .admin-section h2 {
            font-size: 1.8em;
            margin-bottom: 20px;
            color: #333;
        }

        .admin-list {
            overflow-x: auto;
        }

        .admin-list table {
            width: 100%;
            border-collapse: collapse;
        }

        .admin-list th,
        .admin-list td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .admin-list th {
            background-color: #f4f4f4;
        }

        .admin-list tr:hover {
            background-color: #f1f1f1;
        }

        .admin-list th,
        .admin-list td {
            text-align: left;
            padding: 15px;
        }

        .admin-list th {
            background-color: #f8f8f8;
        }

        .admin-list tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .admin-list tr:hover {
            background-color: #f1f1f1;
        }

        .admin-list td {
            color: #333;
            font-size: 1em;
        }

        p {
            color: #666;
            font-size: 1.1em;
        }

        .dec {
            background-color: brown;
            color: #fff;
            border: 0;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }

        .dec:hover {
            background-color: #fff;
            color: #000;
            border-radius: 4px;
            border: 2px solid brown;
        }
        .btns{
            background: #0F47AD;
            color: #fff;
            border: 0;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        .btns:hover {
            background-color: #fff;
            color: #000;
            border-radius: 4px;
            border: 2px solid #0F47AD;
        }
    </style>
</head>

<body>
    <?php include("includes/nav.php") ?>

    <main class="admin-page">

        <a href="./logout.php" class="dec">Déconnecter</a>
        <a href="./add_product.php" class="btns">Ajouter produits</a>

        <section class="admin-section">
            <h2>Commandes & Messages</h2>
            <div class="admin-list">
                <?php if (empty($contacts)) : ?>
                    <p>Aucune commande trouvée.</p>
                <?php else : ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($contacts as $contact) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($contact['name']) ?></td>
                                    <td><?= htmlspecialchars($contact['email']) ?></td>
                                    <td><?= htmlspecialchars($contact['message']) ?></td>
                                    <td><?= htmlspecialchars($contact['created_at']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </section>

        <section class="admin-section">
            <h2>Newsletters</h2>
            <div class="admin-list">
                <?php if (empty($newsletters)) : ?>
                    <p>Aucun email trouvé.</p>
                <?php else : ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($newsletters as $newsletter) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($newsletter['email']) ?></td>
                                    <td><?= htmlspecialchars($newsletter['subscribed_at']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table <?php endif; ?> </div>
        </section>
    </main>

    <?php include("includes/footer.php") ?>
</body>

</html>