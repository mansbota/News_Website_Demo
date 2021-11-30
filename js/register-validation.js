
document.getElementById("slanje").onclick = function (event) {

    var slanjeForme = true;

    // Ime korisnika mora biti uneseno
    var poljeIme = document.getElementById("ime");
    var ime = document.getElementById("ime").value;
    if (ime.length == 0) {
        slanjeForme = false;
        poljeIme.style.border = "1px dashed red";
        document.getElementById("porukaIme").innerHTML = "Unesite ime!<br> ";
    } else {
        poljeIme.style.border = "1px solid green";
        document.getElementById("porukaIme").innerHTML = "";
    }
    // Prezime korisnika mora biti uneseno
    var poljePrezime = document.getElementById("prezime");
    var prezime = document.getElementById("prezime").value;
    if (prezime.length == 0) {
        slanjeForme = false; 13
        poljePrezime.style.border = "1px dashed red";

        document.getElementById("porukaPrezime").innerHTML = "Unesite Prezime!<br>";
    } else {
        poljePrezime.style.border = "1px solid green";
        document.getElementById("porukaPrezime").innerHTML = "";
    }

    // Korisničko ime mora biti uneseno
    var poljeUsername = document.getElementById("username");
    var username = document.getElementById("username").value;
    if (username.length == 0) {
        slanjeForme = false;
        poljeUsername.style.border = "1px dashed red";

        document.getElementById("porukaUsername").innerHTML = "Unesite korisničko ime!<br> ";
    } else {
        poljeUsername.style.border = "1px solid green";
        document.getElementById("porukaUsername").innerHTML = "";
    }

    // Provjera podudaranja lozinki
    var poljePass = document.getElementById("pass");
    var pass = document.getElementById("pass").value;
    var poljePassRep = document.getElementById("passRep");
    var passRep = document.getElementById("passRep").value;
    if (pass.length == 0 || passRep.length == 0 || pass != passRep) {
        slanjeForme = false;
        poljePass.style.border = "1px dashed red";
        poljePassRep.style.border = "1px dashed red";
        document.getElementById("porukaPass").innerHTML = "Lozinke nisu iste!<br>";

        document.getElementById("porukaPassRep").innerHTML = "Lozinke nisu iste!<br>";
    } else {
        poljePass.style.border = "1px solid green";
        poljePassRep.style.border = "1px solid green";
        document.getElementById("porukaPass").innerHTML = "";
        document.getElementById("porukaPassRep").innerHTML = "";
    }

    if (slanjeForme != true) {
        event.preventDefault();
    }
};

