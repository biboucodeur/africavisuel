<?php
session_start();
ob_start();

include("configuration/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['username']) and !empty($_POST['password'])) {

        $username = htmlspecialchars($_POST['username']);
        $password = ($_POST['password']);


        $recupUsers = $pdo->prepare('SELECT * FROM admin WHERE username = ? AND password = ? ');
        $recupUsers->execute(array($username, $password));

        if ($recupUsers->rowCount() > 0) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['id'] = $recupUsers->fetch()['id'];
            header('Location: admin.php');
        } else {
            echo "<big>Votre mot de passe ou username incorrect</big>";
        }
    } else {
        echo "<big>Veuillez completez tous les champs</big>";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - AFRICA VISUEL</title>
    <link rel="stylesheet" href="./styles/africa.css">
    <style>
        main {
            padding: 40px;
        }

        .login-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin: auto;
            width: 400px;
            max-width: 100%;
            text-align: center;
        }

        .login-container h2 {
            font-size: 1.8em;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn {
            background-color: #0F47AD;
            border: none;
            padding: 10px 20px;
            color: white;
            font-size: 1em;
            width: 100%;
            cursor: pointer;
            border-radius: 4px;
            display: block;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #e68900;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <?php include("includes/nav.php") ?>

    <main class="login-page">
        <div class="login-container">
            <h2>Connexion à l'interface administrateur</h2>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="btn">Se connecter</button>
                <?php if (isset($error)) : ?>
                    <p class="error-message"><?= $error ?></p>
                <?php endif; ?>
            </form>
        </div>
    </main>

    <?php include("includes/footer.php") ?>
</body>

</html>