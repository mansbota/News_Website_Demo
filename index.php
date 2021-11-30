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

        <?php
            include 'connect.php';
        ?>

        <section id='politics'>
            <div class='centered'>
                <h1><a href='kategorija.php?id=politika'>EUROPSKA POLITIKA</a></h1>
                    <?php
                        $query = "SELECT * FROM articles WHERE arhiva = 0 AND kategorija = 'politika' LIMIT 5";
                        $result = mysqli_query($dbc, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            $id = $row['id'];
                            echo "<a href='clanak.php?id=$id'><article>";
                            echo "<img src='img/".$row['slika']."'";
                            echo "<h4>".$row['naslov']."<h4>";
                            echo "</article></a>";
                        }
                    ?>
                <div class='clearfix'></div>
            </div>
        </section>

        <section id='sport'>
            <div class='centered'>
                <h1><a href='kategorija.php?id=kultura'>KULTURA</a></h1>
                <?php
                    $query = "SELECT * FROM articles WHERE arhiva = 0 AND kategorija = 'kultura' LIMIT 4";
                    $result = mysqli_query($dbc, $query);
                    while ($row = mysqli_fetch_array($result)) {
                        $id = $row['id'];
                        echo "<a href='clanak.php?id=$id'><article>";
                        echo "<img src='img/".$row['slika']."'";
                        echo "<h4>".$row['naslov']."<h4>";
                        echo "</article></a>";
                    }
                    mysqli_close($dbc);
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