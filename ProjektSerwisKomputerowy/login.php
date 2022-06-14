<?php
session_start();
if(isset($_SESSION['typUzytkownika'])){
  header("Location:MojeUrzadzenia.php");
}
else{
}
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
              
              
                <?php
                if(isset($_SESSION['typUzytkownika'] )) {
                   if($_SESSION['typUzytkownika'] != null){
                      echo "<li class='nav-item'>
                      <a class='nav-link active text-white' href='dodajPracownika.php'>Dodaj Pracownika</a>
                      </li>";
                   }
                  }
                  
        ?>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <div><?php
    if(isset($_SESSION['typUzytkownika'] )) {
      if($_SESSION['typUzytkownika'] == 'Administrator'){
        echo "<form action='wyloguj.php'>
        <button type ='submit' name='wyloguj'>Wyloguj</button>
        </form>";
      }
    }else{
      
      }
?>
        <div class='d-flex container justify-content-center'>
        <div class='justify-content-center' style='width:50%' >
        <div class='container'>
        
        <div class="mx-auto">
            <div class="mt-5">
            <form action="login.inc.php" method="post">
            
                <input type="Text" class="form-control" id="numerTelefonu" name="numerTelefonu" placeholder="Numer Telefonu" required><br>
                <input type="password" class="form-control" id="haslo" name="haslo" placeholder="Hasło" required><br>
                <div class='d-flex justify-content-center'>
              <button class="btn btn-light" style='width:100px;height:44px' type="submit">Zaloguj</button>
              
        </div>
       
        
    </div>
      </div></div>
            </form>
            <div class='d-flex justify-content-center mt-4'>
            
            <h5><a href="register.php">Nie masz konta? Zarajestruj się!</a></h5>
            </div></div>
          </div>
        </div>
      
</body>
</html>