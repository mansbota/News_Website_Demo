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

        <section>
            <div class='centered'>
                <?php
                    session_start();

                    if (!isset($_SESSION['user'])) {
                        echo '<form enctype="multipart/form-data" action="login.php" method="POST" id="registracija">
                                <div class="form-item">
                                    <span id="porukaUsername" class="bojaPoruke"></span>
                                    <label for="content">Korisničko ime:</label>
                                    <br> <span class="bojaPoruke"></span>
                                    <div class="form-field">
                                        <input type="text" name="username" id="username" class="formfield-textual">
                                    </div>
                                </div>
                                <div class="form-item">
                                    <span id="porukaPass" class="bojaPoruke"></span>
                                    <label for="pphoto">Lozinka: </label>
                                    <div class="form-field">
                                        <input type="password" name="pass" id="pass" class="formfield-textual">
                                    </div>
                                </div>
                                <div class="form-item">
                                    <button type="submit" value="Prijava" id="slanje">Prijavi se</button>
                                </div>
                            </form>';
                    }
                    else {
                        if ($_SESSION['razina'] == 1) {
                            include 'connect.php';
                            $query = "SELECT * FROM articles";
                            $result = mysqli_query($dbc, $query);
                            echo "<h1>VIJESTI</h1>";
                            while ($row = mysqli_fetch_array($result)) {
                                $id = $row['id'];
                                echo "<a href='edit.php?id=$id'><article>";
                                echo "<img src='img/".$row['slika']."'";
                                echo "<h4>".$row['naslov']."<h4>";
                                echo "</article></a>";
                            }
                            mysqli_close($dbc);
                        }
                        else {
                            echo "<h2 class='message'>Nemate administratorske ovlasti.<h2>";
                        }
                    }
                ?>
                <div class='clearfix'></div>
            </div>
        </section>

        <footer>
            <div class='centered'>
                <p>france.tv</p>
            </div>
        </footer>
    </body>
</html>