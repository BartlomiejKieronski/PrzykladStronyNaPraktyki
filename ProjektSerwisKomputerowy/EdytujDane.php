
<?php
session_start();
if(!isset($_SESSION['typUzytkownika'])){
  header("Location:login.php");
}
elseif($_SESSION['typUzytkownika']=='Uzytkownik'){
  header("Location:devices.php");
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
         $urzadzenie=$_GET['id'];
            $conn = @new mysqli('localhost','root', '','serwiskomputerowy');
            if($conn->connect_error !=0){
                echo "Wystąpił błąd połączenia";
               }
               else{
                $data = "SELECT * FROM urzadzenie where idUrzadzenia='$urzadzenie'";
                $result = $conn->query($data);
                if($result!=null){
                    while($row = $result->fetch_assoc()){

               
        echo"<div style='height:50px;'></div>
    <div class='container-fluid' >
      <div class='mx-auto' style='width: 800px;'>
            <div class='mt-5'>
            <form action='EdytujDane.inc.php' method='post'>
            <div class='row'>
             <div class='col'>
                <input type='Text' class='form-control' id='NumerTelefonuWlasciciela' name='NumerTelefonuWlasciciela' value='$row[numerTelefonuWlasciciela]' placeholder='Numer Telefonu Właściciela' required>
                <input type='E-mail' class='form-control' id='AdresEmail' name='AdresEmail' value='$row[adresEmailWlasiciela]' placeholder='Adres E-mail Właściciela' required>
                <input type='Text' class='form-control' id='ImieWlasciciela' name='ImieWlasciciela' value='$row[imieWlasciciela]' placeholder='Imię Właściciela' required>
                <input type='Text' class='form-control' id='NazwiskoWlasciciela' name='NazwiskoWlasciciela' value='$row[nazwiskoWlasciciela]' placeholder='Nazwisko Właściciela' required>
              </div>
                <div class='col mt-3'>
                <select class='form-select' id='TypUrzadzenia' name='TypUrzadzenia'  aria-label='Typ urządzenia'>
                  <option selected>$row[typUrzadzenia]</option>
                  <option value='Telefon'>Telefon</option>
                  <option value='Tablet'>Tablet</option>
                  <option value='PC'>PC</option>
                  <option value='Laptop'>Laptop</option>
                  <option value='Peryferia'>Peryferia</option>
                  <option value='Konsola'>Konsola</option>
                  <option value='Inne'>Inne</option>
                </select>
                <input type='Text' class='form-control' id='MarkaUrzadzenia' name='MarkaUrzadzenia' value='$row[markaUrzadzenia]' placeholder='Marka Urządzenia' required>
                <input type='Text' class='form-control' id='ModelUrzadzenia' name='ModelUrzadzenia' value='$row[modelUrzadzenia]' placeholder='Model urządzenia' required>
                <input width='10px' type='text' name='iduz' class='visually-hidden' value='$urzadzenie'>
                </div>
                
                <div class='mt-2'>
                <button class=' border border-2 form-control' style='height:40px;' type='submit' id='Submit' name='Submit' >Wyślij</button>
                </div>  
              </div>  
            </form>
        </div>
        </div>
        ";
                    }}}?>
       
        </div>
  </body>
</html>