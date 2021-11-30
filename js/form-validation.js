
document.getElementById('slanje').onclick = function(event) {

  var slanjeForme = true;

  var title = document.getElementById('title');
  var titleText = title.value;

  if (titleText.length < 5 || titleText.length > 30) {
      slanjeForme = false;
      title.style.border = "1px dashed red";
      document.getElementById('porukaTitle').innerHTML = "Naslov vijesti mora imati između 5 i 30 znakova! <br>";
  }
  else {
      title.style.border = "1px solid green";
      document.getElementById('porukaTitle').innerHTML = "";
  }

  var about = document.getElementById("about");
  var aboutText = document.getElementById("about").value;

  if (aboutText.length < 10 || aboutText.length > 100) {
      slanjeForme = false;
      about.style.border = "1px dashed red";
      document.getElementById("porukaAbout").innerHTML = "Kratki sadržaj mora imati između 10 i 100 znakova! <br>";
  } 
  else {
      about.style.border = "1px solid green";
      document.getElementById("porukaAbout").innerHTML = "";
  }

  var content = document.getElementById("content");
  var contentText = document.getElementById("content").value;

  if (contentText.length == 0) {
      slanjeForme = false;
      content.style.border = "1px dashed red";
      document.getElementById("porukaContent").innerHTML = "Sadržaj mora biti unesen!<br>";
  } 
  else {
      content.style.border = "1px solid green";
      document.getElementById("porukaContent").innerHTML = "";
  }

  var slika = document.getElementById("photo");
  var slikaValue = document.getElementById("photo").value;

  if (slikaValue.length == 0) {
      slanjeForme = false;
      slika.style.border = "1px dashed red";
      document.getElementById("porukaSlika").innerHTML = "Slika mora biti unesena!<br>";
  } 
  else {
      slika.style.border = "1px solid green";
      document.getElementById("porukaSlika").innerHTML = "";
  }
  
  var category = document.getElementById("category");

  if (document.getElementById("category").selectedIndex == -1) {
      slanjeForme = false;
      category.style.border = "1px dashed red";
      document.getElementById("porukaKategorija").innerHTML = "Kategorija mora biti odabrana!<br>";
  } 
  else {
      category.style.border = "1px solid green";
      document.getElementById("porukaKategorija").innerHTML = "";
  }
  
  if (slanjeForme != true) {
      event.preventDefault();
  }
};