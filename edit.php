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

        <section class='centered' id='edit'>

            <?php
                include 'connect.php';
                $id = $_GET['id'];
                $query = "SELECT * FROM articles WHERE id = '$id'";
                $result = mysqli_query($dbc, $query);
                $row = mysqli_fetch_array($result);

                $title = $row['naslov'];
                $about = $row['sazetak'];
                $photo = $row['slika'];
                $content = $row['tekst'];
                $category = $row['kategorija'];
                $arhiva = ($row['arhiva'] == 1 ? 'checked' : 'unchecked');
                $selektiranaPolitika = ($category == "politika" ? true : false);
                mysqli_close($dbc);
            ?>

            <form enctype="multipart/form-data" action="edit_2.php?id=<?php echo $id;?>" method="POST">
                <div class="form-item">
                    <label for="title">Naslov vijesti</label>
                    <div class="form-field">
                        <input type="text" name="title" id="title" class="form-field-textual" value="<?php echo $title;?>"> <br>
                        <span id ="porukaTitle"></span>
                    </div>
                </div>
                <div class="form-item">
                    <label for="about">Kratki sadržaj vijesti (do 50
                        znakova)</label>
                    <div class="form-field">
                        <textarea name="about" id="about" cols="60" rows="20" class="formfield-textual"><?php echo $about;?></textarea> <br>
                        <span id="porukaAbout"></span>
                    </div>
                </div>
                <div class="form-item">
                    <label for="content">Sadržaj vijesti</label>
                    <div class="form-field">
                        <textarea name="content" id="content" cols="60" rows="20" class="form-field-textual"><?php echo $content;?></textarea> <br>
                        <span id="porukaContent"></span>
                    </div>
                </div>
                <div class="form-item">
                    <label for="pphoto">Slika</label>
                    <div class="form-field">
                        <input type="file" accept="image/*" class="input-text" name="photo" id="photo" value="<?php echo $photo;?>"> <br>
                        <span id="porukaSlika"></span>
                        <br> <img src="img/<?php echo $photo;?>" width=100px>
                    </div>
                </div>
                <div class="form-item">
                    <label for="category">Kategorija vijesti</label>
                    <div class="form-field">
                        <select name="category" id="category" class="form-field-textual" value="<?php echo $category;?>"> <br>
                            <option value="politika" <?php if ($selektiranaPolitika) echo "selected = 'selected'";?>>Politika</option>
                            <option value="kultura" <?php if (!$selektiranaPolitika) echo "selected = 'selected'";?>>Kultura</option>
                        </select>
                        <span id="porukaKategorija"></span>
                    </div>
                </div>
                <div class="form-item">
                    <label>Spremiti u arhivu
                        <div class="form-field">
                            <input type="checkbox" name="archive" <?php echo $arhiva;?>>
                        </div>
                    </label>
                </div>
                <div class="form-item">
                    <button type="reset" value="Poništi">Poništi</button>
                    <button type="submit" name="prepravi" value="Prepravi" id="slanje">Prepravi</button>
                    <button type="submit" name="izbrisi" value="Izbrisi">Izbriši</button>
                </div>
            </form>

            <script src="js/form-validation.js"></script>

        </section>

        <footer>
            <div class='centered'>
                <p>france.tv</p>
            </div>
        </footer>
    </body>

</html>