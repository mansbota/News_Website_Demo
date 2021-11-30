<!DOCTYPE html>

<head>
    <title>Franceinfo</title>
    <meta charset='UTF-8'>
    <meta name='description' content='Franceinfo'>
    <link rel="stylesheet" href="style.css" type="text/css">
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
            $title = $_POST['title'];
            $about = $_POST['about'];
            $photo = $_FILES['photo']['name'];
            $content = $_POST['content'];
            $category = $_POST['category'];
            $date = date('d.m.Y.');
            move_uploaded_file($_FILES['photo']['tmp_name'], 'img/'.$photo);

            if (isset($_POST['archive'])) {
                $archive = 1;
            } 
            else {
                $archive = 0;
            }

            echo "<h1>$title</h1>";
            echo "<h5>$about</h5>";
            echo "<img src='img/$photo' alt='slika'>";
            echo "<p>$content</p>";

            include 'connect.php';
            $sql = "INSERT INTO articles (datum, naslov, sazetak, tekst, slika, kategorija, arhiva) VALUES(?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($dbc);

            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, 'ssssssd', $date, $title, $about, $content, $photo, $category, $archive);
                mysqli_stmt_execute($stmt);
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