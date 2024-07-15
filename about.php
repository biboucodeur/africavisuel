<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="styles/africa.css">
    <style>
        .about-page {
            padding: 2rem 1rem;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .about-intro {
            margin-bottom: 2rem;
        }

        .about-intro h1 {
            font-size: 2.5rem;
            color: #333;
        }

        .about-intro p {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 1rem;
        }

        .about-services {
            margin-bottom: 2rem;
        }

        .about-services h2 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .service {
            display: inline-block;
            width: 30%;
            border-radius: 7px;
            padding: 1rem;
            background: #fff;
            text-align: center;
        }

        .service i {
            font-size: 3rem;
            color: #0F47AD;
            margin-bottom: 0.5rem;
        }

        .service h3 {
            font-size: 1.5rem;
            color: #333;
        }

        .service p {
            font-size: 1rem;
            color: #666;
        }

        .about-additional {
            margin-bottom: 2rem;
        }

        .about-additional h2 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .about-additional p {
            font-size: 1.2rem;
            color: #666;
        }

        @media (max-width: 768px) {
            .service {
                width: 100%;
                margin-bottom: 1rem;
            }
        }
    </style>

    <title>AFRICA VISUEL</title>
</head>

<body>
    <?php include("includes/nav.php") ?>
    <main class="about-page">
        <section class="about-intro">
            <h1>À propos de nous</h1>
            <p>Africa Visuel est un site vitrine spécialisé dans le domaine numérique, à savoir le marketing digital, la création de pages web et le design graphique.</p>
            <p>Nous sommes une entreprise spécialisée dans le domaine numérique. Nous siégeons à Dakar, plus précisément à Keur Massar. En effet, nous proposons diverses fonctionnalités et services dans le domaine du numérique.</p>
        </section>

        <section class="about-services">
            <h2>Nos Services</h2>
            <div class="service">
                <i class="fas fa-bullhorn"></i>
                <h3>Marketing Digital</h3>
                <p>Social media management, Publicité Display, Content Marketing, Référencement SEO</p>
            </div>
            <div class="service">
                <i class="fas fa-paint-brush"></i>
                <h3>Design Graphique</h3>
                <p>Conception de logo, Création de flyers, Cartes de visite, Flocage</p>
            </div>
            <div class="service">
                <i class="fas fa-laptop-code"></i>
                <h3>Web Design</h3>
                <p>Création de sites vitrines, Création de sites e-commerce, Création de sites communautaires, Sites responsives</p>
            </div>
        </section>

        <section class="about-additional">
            <h2>Pourquoi nous choisir ?</h2>
            <p>Nous combinons expertise, créativité et technologies de pointe pour offrir des solutions innovantes et personnalisées à nos clients. Notre équipe dédiée s'efforce de répondre aux besoins uniques de chaque client avec des résultats exceptionnels.</p>
        </section>
    </main>
    <?php include("includes/footer.php") ?>
</body>

</html>