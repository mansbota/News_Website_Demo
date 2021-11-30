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
                $username = $_POST['username'];
                $lozinka = $_POST['pass'];
                
                $sql = "SELECT lozinka, razina FROM users WHERE korisnickoIme = ?";
                $stmt = mysqli_stmt_init($dbc);

                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, 's', $username);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                }

                if (mysqli_stmt_num_rows($stmt) == 0) {
                    echo "<h2 class='message'>Korisničko ime ne postoji. Molimo registrirajte se.<h2>";
                }
                else {
                    mysqli_stmt_bind_result($stmt, $lozinkaHash, $razina);
                    mysqli_stmt_fetch($stmt);

                    if (password_verify($lozinka, $lozinkaHash)) {
                        session_start();
                        $_SESSION['user'] = $username;
                        $_SESSION['razina'] = $razina;
                        echo "<h2 class='message'>Uspješno ste se ulogirali.<h2>";
                    }
                    else {
                        echo "<h2 class='message'>Kriva lozinka.<h2>";
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