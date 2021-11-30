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

        <section class='centered'>

            <?php
                include 'connect.php';
                $id = $_GET['id'];

                if (isset($_POST['izbrisi'])) {
                    $sql = "DELETE FROM articles WHERE id = ?";
                    $stmt = mysqli_stmt_init($dbc);

                    if (mysqli_stmt_prepare($stmt, $sql)) {
                        mysqli_stmt_bind_param($stmt, 'i', $id);
                        mysqli_stmt_execute($stmt);
                        echo "<h2 class='message'>Vijest je izbrisana.</h2>";
                    }
                }
                else if (isset($_POST['prepravi'])) {
                    $picture = $_FILES['photo']['name'];
                    $title = $_POST['title'];
                    $about = $_POST['about'];
                    $content = $_POST['content'];
                    $category = $_POST['category'];

                    if (isset($_POST['archive'])) {
                        $archive = 1;
                    }
                    else {
                        $archive = 0;
                    }

                    move_uploaded_file($_FILES["photo"]["tmp_name"], "img/".$picture);

                    $sql = "UPDATE articles SET naslov = ?, sazetak = ?, tekst = ?, slika = ?, kategorija = ?, arhiva = ? WHERE id = ?";
                    $stmt = mysqli_stmt_init($dbc);

                    if (mysqli_stmt_prepare($stmt, $sql)) {
                        mysqli_stmt_bind_param($stmt, 'sssssii', $title, $about, $content, $picture, $category, $archive, $id);
                        mysqli_stmt_execute($stmt);
                        echo "<h2 class='message'>Vijest je prepravljena.</h2>";
                    }
                }

                mysqli_close($dbc);
            ?>

        </section>

        <footer>
            <div class='centered'>
                <p>france.tv</p>
            </div>
        </footer>
    </body>

</html>