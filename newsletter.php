<?php
include("configuration/config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = $_POST['email'];

    $sql = "INSERT INTO newsletter (email) VALUES (:email)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute(['email' => $email]);
        echo "Merci de vous être abonné à notre newsletter !";
        echo'Retourner <a href="index.php">africavisuel</a>';
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            echo "Cet email est déjà abonné à notre newsletter.";
        } else {
            throw $e;
        }
    }
} else {
    echo "Veuillez fournir un email valide.";
}
?>
