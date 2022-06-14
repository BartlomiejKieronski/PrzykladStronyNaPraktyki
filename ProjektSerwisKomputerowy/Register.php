<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <Style>
        body {
  background-color: ;
}
.kolor{
  background-color: rgb(3,3,64);
}
.kolory{
  background-color:rgb(3,3,64);
 
}
    </Style>
</head>
<body>
<script>
var sprawdz = function() {
  if (document.getElementById('password').value ==
    document.getElementById('PotwierdzPassword').value) {
    document.getElementById('wiadomosc').style.color = 'green';
    document.getElementById('wiadomosc').innerHTML = 'Hasła są identyczne';
	document.getElementById("submit").disabled = false;
  } else {
    document.getElementById('wiadomosc').style.color = 'red';
    document.getElementById('wiadomosc').innerHTML = 'Hasła nie są identyczne!';
	document.getElementById("submit").disabled = true;
  }
}
 </script>


<div >
      <nav class="navbar navbar-expand-lg navbar-light kolor text-white">
        <div class="container-fluid">
          <a class="navbar-brand text-white" href="#"><img src='Projekt_ks.png' width='30px' height='30px'> Serwis Komputerowy</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              
              <li class="nav-item">
                <a class="nav-link text-white" href="ONas.php">O Nas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="Kontakt.php">Kontakt</a>
              </li>
              
              
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <div>
      
        
        <div class='d-flex container justify-content-center'>
        <div class='justify-content-center' style='width:50%' >
        <div class="mx-auto" style="">
            <div class="mt-5">
            <form action ="register.inc.php"  method="post" enctype="multipart/form-data">
                
                <input type="Text" class="form-control" id="Imie" name="Imie" placeholder="Imię" required><br>
                <input type="Text" class="form-control" id="Nazwisko" name="Nazwisko" placeholder="Nazwisko" required><br>
                <input type="Text" class="form-control" id="Email" name="Email" placeholder="E-mail" required><br>
                <input type="number" class="form-control" id="number" name="number" placeholder="Numer Telefonu" required><br>
                <input type="password" class="form-control" id="password" name="password" placeholder="Hasło" onkeyup='sprawdz();' required><br>
                <input type="password" class="form-control" id="PotwierdzPassword"  placeholder="Potwierdź Hasło" onkeyup='sprawdz();' required><br>
                <span id='wiadomosc'></span>
                <button type="submit" class="form-control" disabled = "true" id="submit" >Zarejestruj</button>
            </form>
            
            <div class='d-flex justify-content-center mt-4'>
        <h5><a href="login.php">Masz już konto? Zaloguj się!</a></h5>
    </div>
            </div></div>
          </div>

        </div>
      
</body>
</html>