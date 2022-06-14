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
<div class="sticky-top">
      <nav class="navbar navbar-expand-lg navbar-light kolor text-white">
        <div class="container-fluid">
          <a class="navbar-brand text-white" href="#"><img src='Projekt_ks.png' width='30px' height='30px'> Serwis Komputerowy</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <?php
            if(isset($_SESSION['typUzytkownika'] )) {
              if($_SESSION['typUzytkownika'] != "Uzytkownik"){
              echo "<li class='nav-item'>
              <a class='nav-link active text-white' aria-current='page' href='devices.php'>Urządzenia</a>
            </li>";
              }}
              ?>
                
              
              
              <li class="nav-item">
                <a class="nav-link active text-white" href="MojeUrzadzenia.php">Moje naprawy</a>
              </li>
              <?php
              if(isset($_SESSION['typUzytkownika'] )) {
              if($_SESSION['typUzytkownika'] != "Uzytkownik"){
              echo "<li class='nav-item'>
              <a class='nav-link active text-white' href='newdevice.php'>Dodaj urządzenie</a>
            </li>";
              }}
              if(isset($_SESSION['typUzytkownika'] )) {
                if($_SESSION['typUzytkownika'] == "Administrator"){
                echo "<li class='nav-item'>
                <a class='nav-link active text-white' href='dodajPracownika.php'>Dodaj Pracownika</a>
              </li>
              <li class='nav-item'>
                <a class='nav-link active text-white' href='Pracownicy.php'>Statystyki pracowników</a>
              </li>";
                }}
            ?>
            <li class="nav-item">
                <a class="nav-link text-white" href="ONas.php">O Nas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="Kontakt.php">Kontakt</a>
              </li>
                </ul>
          </div>
          <div class='flex-box'>
          <ul class="navbar-nav justify-content-end">
            <li class="nav-item">
              <?php
            if(isset($_SESSION['typUzytkownika'] )) {
              if($_SESSION['typUzytkownika'] != null){
                echo "<li class='nav-item dropdown dropstart'>
          <a class='nav-link dropdown-toggle text-white dropdown-menu-end'  href='' id='navbarDropdownMenuLink' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
            <img width='20px' height='20px' src='account.png'>
          </a>
          <ul class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
            <li><a class='dropdown-item' href='Userinfo.php'>Mój Profil</a></li>
            <li><a class='dropdown-item' href='MojeUrzadzenia.php'>Moje urządzenia</a></li>
            <li><form action='wyloguj.php'>
            <a class='dropdown-item text-dark' type='submit' href='wyloguj.php' method='post' >Wyloguj</a>
            </form></li>
          </ul>
        </li>   
                </dropdown>";
              }
            } else{
              echo "<li class='nav-item'>
              <a class='nav-link active text-white' href='login.php'>Zaloguj</a>
            </li>";
          }   
            ?>
        </div>
      </nav>
    </div>
    <div>
        <?php
        $iduzytkownika = $_SESSION['iduzytkownika'];
    $conn = @new mysqli('localhost','root', '','serwiskomputerowy');
            if($conn->connect_error !=0){
                echo "Wystąpił błąd połączenia";
               }
               else{
                $data = "SELECT * FROM owner where Id='$iduzytkownika'";
                $result = $conn->query($data);
                if($result!=null){
                    while($row = $result->fetch_assoc()){

              echo " 
        
        <div class='d-flex container justify-content-center'>
        <div class='justify-content-center' style='width:50%' >
        <div class='mx-auto' style=''>
            <div class='mt-5'>
            <form action ='EdytujDaneUzytkownika.inc.php'  method='post' enctype='multipart/form-data'>
                
                <input type='Text' class='form-control' id='Imie' name='Imie' value='$row[Imie]' placeholder='Imię' required><br>
                <input type='Text' class='form-control' id='Nazwisko' name='Nazwisko' value='$row[Nazwisko]' placeholder='Nazwisko' required><br>
                <input type='Text' class='form-control' id='Email' name='Email' value='$row[AdresEmail]' placeholder='E-mail' required><br>
                <input type='number' class='form-control' id='number' name='number' value='$row[NumerTelefonu]' placeholder='Numer Telefonu' required><br>
                
                <button type='submit' class='form-control' id='submit' >Edytuj dane</button>
            </form>
            </div></div>
          </div>
";
                    }}}?>
        </div>
      
</body>
</html>