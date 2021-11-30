<!DOCTYPE html>
    <head>
        <title>Franceinfo</title>
        <meta charset='UTF-8'>
        <meta name='description' content='Franceinfo'>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <header>
            <div class='centered'>
                <img src="img/logo.png" id='logo' alt="logo">
            </div>

            <nav>
                <ul class='centered'>
                    <li><a href="index.php">home</a></li>
                    <li><a href="kategorija.php?id=politika">politika</a></li>
                    <li><a href="kategorija.php?id=kultura">kultura</a></li>
                    <li><a href="unos.html">unos</a></li>
                    <li><a href="administracija.php">admin</a></li>
                    <li><a href="registracija.html">register</a></li>
                </ul>
            </nav>
        </header>

        <section id='article' class='centered'>
            <?php
                $id = $_GET['id'];
                include 'connect.php';

                $query = "SELECT * FROM articles WHERE id = '$id'";
                $result = mysqli_query($dbc, $query);
                $row = mysqli_fetch_array($result);

                $title = $row['naslov'];
                $about = $row['sazetak'];
                $photo = $row['slika'];
                $content = $row['tekst'];
                mysqli_close($dbc);

                echo "<h1>$title</h1>";
                echo "<h5>$about</h5>";
                echo "<img src=img/$photo alt='slika'>";
                echo "<p>$content</p>";
            ?>
        </section>

        <footer>
            <div class='centered'>
                <p>france.tv</p>
            </div>
        </footer>
    </body>
</html>