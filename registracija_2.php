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

        <section class = "centered">
            <?php
                include 'connect.php';
                $ime = $_POST['ime'];
                $prezime = $_POST['prezime'];
                $username = $_POST['username'];
                $lozinka = $_POST['pass'];
                $hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
                $razina = 0;
                
                $sql = "SELECT korisnickoIme FROM users WHERE korisnickoIme = ?";
                $stmt = mysqli_stmt_init($dbc);

                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, 's', $username);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                }

                if (mysqli_stmt_num_rows($stmt) > 0) {
                    echo "<h2 class='message'>Korisničko ime već postoji. Molimo izaberite drugo korisničko ime.<h2>";
                }
                else {
                    $sql = "INSERT INTO users (ime, prezime, korisnickoIme, lozinka, razina) VALUES (?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($dbc);

                    if (mysqli_stmt_prepare($stmt, $sql)) {
                        mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username, $hashed_password, $razina);
                        mysqli_stmt_execute($stmt);
                        echo "<h2 class='message'>Registracija uspješna.</h2>";
                    }
                }

                mysqli_close($dbc)
            ?>
        </section>

        <footer>
            <div class='centered'>
                <p>france.tv</p>
            </div>
        </footer>
    </body>
</html>