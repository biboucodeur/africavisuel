<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <link rel="stylesheet" href="./styles/africa.css">
  <style>
    .services-page {
      padding: 2rem 1rem;
      max-width: 1200px;
      margin: 0 auto;
      text-align: center;
    }

    .services-intro {
      margin-bottom: 2rem;
    }

    .services-intro h1 {
      font-size: 2.5rem;
      color: #333;
    }

    .services-intro p {
      font-size: 1.2rem;
      color: #666;
      margin-bottom: 1rem;
    }

    .services-list {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
      gap: 2rem;
    }

    .service-item {
      flex: 1 1 30%;
      max-width: 30%;
      padding: 1rem;
      box-sizing: border-box;
      text-align: center;
      background: #fff;
      border-radius: 5px;
      transition: transform 0.3s ease;
    }

    .service-item i {
      font-size: 3rem;
      color: #0F47AD;
      margin-bottom: 0.5rem;
    }

    .service-item h3 {
      font-size: 1.5rem;
      color: #333;
      margin-bottom: 1rem;
    }

    .service-item p {
      font-size: 1rem;
      color: #666;
    }

    .service-item:hover {
      transform: scale(1.05);
    }

    @media (max-width: 768px) {
      .service-item {
        flex: 1 1 100%;
        max-width: 100%;
      }
    }
  </style>
  <title>AFRICA VISUEL</title>
</head>

<body>
  <?php include("includes/nav.php") ?>
  <main class="services-page">
    <section class="services-intro">
      <h1>Nos Services</h1>
      <p>Africa Visuel propose une gamme complète de services numériques pour répondre à tous vos besoins en marketing digital, design graphique et création de sites web.</p>
    </section>

    <section class="services-list">
      <div class="service-item">
        <i class="fas fa-bullhorn"></i>
        <h3>Marketing Digital</h3>
        <p>Nous vous aidons à accroître votre visibilité en ligne grâce à des stratégies de marketing digital personnalisées incluant le social media management, la publicité display, le content marketing et le référencement SEO.</p>
      </div>
      <div class="service-item">
        <i class="fas fa-paint-brush"></i>
        <h3>Design Graphique</h3>
        <p>Notre équipe de designers créatifs est spécialisée dans la conception de logos, la création de flyers, les cartes de visite et le flocage, pour donner une identité visuelle forte à votre marque.</p>
      </div>
      <div class="service-item">
        <i class="fas fa-laptop-code"></i>
        <h3>Web Design</h3>
        <p>Nous créons des sites web sur mesure, qu'il s'agisse de sites vitrines, de sites e-commerce ou de sites communautaires. Tous nos sites sont responsives et optimisés pour une expérience utilisateur optimale.</p>
      </div>
    </section>
  </main>
  <?php include("includes/footer.php") ?>
</body>

</html>

</html>