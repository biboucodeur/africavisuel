<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar - Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Arial", sans-serif;
            list-style: none;
            text-decoration: none;
        }

        .titre {
            color: #1D2125;
        }

        body {
            background-color: #ECF0F1;
            color: #1D2125;
        }

        .menu {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            width: 100%;
            background-color: white;
        }

        nav h3 {
            color: #0F47AD;
        }

        nav ul {
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin-right: 20px;
            transition: 0.5s ease;
        }

        nav ul li:hover {
            transform: translateY(5px);
        }

        nav ul li a {
            color: #0F47AD;
            transition: 0.5s ease;
            opacity: 1;
        }

        nav ul li a:hover {
            color: #111622;
            opacity: 0.6;
        }

        button {
            background-color: #0F47AD;
            color: white;
            border: 0;
            padding: 4px 8px;
            border-radius: 4px;
            cursor: pointer;
            transition: 0.5s ease;
        }

        button:hover {
            background-color: #ccc;
            color: black;
        }

        a {
            color: #fff;
        }

        .fa-bars {
            display: none;
        }

        @media (max-width: 768px) {
            .menu {
                display: flex;
                flex-direction: column;
                transition: 0.5s ease;
            }

            .menu h3 {
                font-size: 30px;
                position: relative;
            }

            .link {
                display: none;
                flex-direction: column;
            }

            button {
                display: block;
                width: 100px;
                margin: 0 auto;
            }

            nav ul li {
                text-align: center;
                margin: 10px 0;
            }

            .afficher {
                display: block;
            }

            .fa-bars {
                display: block;
                position: absolute;
                top: 30px;
                cursor: pointer;
                padding-right: 20px;
                font-size: 24px;
                right: 0;
            }
        }
    </style>
</head>

<body>
    <div class="menu">
        <h3><a class="titre" href="index.php">Africavisuel</a></h3>
        <nav>
            <ul class="link">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="boutique.php">Boutique</a></li>
                <li><a href="about.php">A propos</a></li>
            </ul>
            <i class="fa-solid fa-bars"></i>
        </nav>
        <button><a class="Btn" href="contact.php">Contact us</a></button>
    </div>

    <script>
        const link = document.querySelector('.link');
        const fabars = document.querySelector('.fa-bars');
        const btn = document.querySelector('button');

        fabars.addEventListener('click', () => {
            link.classList.toggle("afficher");
            btn.classList.toggle("afficher");
            fabars.classList.toggle('fa-times')
        });
    </script>
</body>

</html>