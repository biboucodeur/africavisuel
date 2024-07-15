<?php
include("configuration/config.php");

$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $sql = "INSERT INTO contact (name, email, message) VALUES (:name, :email, :message)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    'name' => $name,
    'email' => $email,
    'message' => $message
  ]);

  $success = true;
}
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
    .contact-page {
      padding: 2rem 1rem;
      max-width: 800px;
      border-radius: 7px;
      margin: auto;
      margin-bottom: 30px;
      margin-top: 30px;
      background: #fff;
    }

    .contact-info,
    .contact-form {
      margin-bottom: 2rem;
      text-align: center;
    }

    .contact-info h1 {
      font-size: 2rem;
      color: #333;
    }

    .contact-info p {
      font-size: 1rem;
      color: #666;
      margin-bottom: 1.5rem;
    }

    .contact-details {
      display: flex;
      justify-content: center;
      gap: 2rem;
    }

    .contact-item {
      display: block;
      justify-content: center;
      align-items: center;
      font-size: 1rem;
      color: #333;
    }

    .contact-item i {
      color: #0F47AD;
      margin-right: 0.5rem;
    }

    .contact-form h2 {
      font-size: 1.5rem;
      color: #333;
      margin-bottom: 1rem;
    }

    .contact-form form {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .contact-form .form-group {
      margin-bottom: 1rem;
      width: 100%;
      max-width: 400px;
    }

    .contact-form label {
      display: block;
      font-size: 1rem;
      color: #333;
      margin-bottom: 0.5rem;
    }

    .contact-form input,
    .contact-form textarea {
      padding: 0.5rem;
      font-size: 1rem;
      border: 1px solid #ccc;
      border-radius: 5px;
      width: 100%;
    }

    .contact-form button.Btn {
      background-color: #0F47AD;
      border: none;
      padding: 0.5rem 1rem;
      color: white;
      font-size: 1rem;
      cursor: pointer;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .contact-form button.Btn:hover {
      background-color: #e68900;
    }

    @media (max-width: 768px) {
      .contact-details {
        flex-direction: column;
        gap: 1rem;
      }
      .contact-form button.Btn{
        display: block;
      }
    }
  </style>
</head>

<body>
  <?php include("includes/nav.php") ?>
  <main class="contact-page">
    <section class="contact-info">
      <h1>Contactez-nous</h1>
      <p>Pour toute question ou commande, n'hésitez pas à nous contacter via le formulaire ci-dessous ou directement via nos coordonnées.</p>
      <div class="contact-details">
        <div class="contact-item">
          <i class="fas fa-phone-alt"></i>
          <p>+221 78 411 45 11</p>
        </div>
        <div class="contact-item">
          <i class="fas fa-envelope"></i>
          <p>contact@africavisuel.com</p>
        </div>
        <div class="contact-item">
          <i class="fas fa-map-marker-alt"></i>
          <p>Keur Massar, Dakar, Sénégal</p>
        </div>
      </div>
    </section>
    <section class="contact-form">
      <h2>Formulaire de Contact</h2>
      <?php if ($success) : ?>
        <p style="color: green;">Merci pour votre message ! Nous vous répondrons sous peu.</p>
      <?php endif; ?>
      <form action="contact.php" method="post">
        <div class="form-group">
          <label for="name">Nom complet</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea id="message" name="message" rows="4" required></textarea>
        </div>
        <button type="submit" class="Btn">Envoyer</button>
      </form>
    </section>
  </main>
  <?php include("includes/footer.php") ?>
</body>

</html>