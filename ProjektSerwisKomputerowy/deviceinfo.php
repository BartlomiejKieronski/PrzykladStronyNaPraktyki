<?php
session_start();
if(!isset($_SESSION['typUzytkownika'])){
  header("Location:login.php");
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
        
        <div style="padding-top: 100px">
        <div class="container-fluid " style="width: 70%; pading:left" >
        
          <div class='container' style='width:70%'>
        <h5>
        <?php
        
          $idurzadzenia= $_GET['id'];
          

          $conn = @new mysqli('localhost','root','','serwiskomputerowy');
          if($conn->connect_error !=0){
            echo "wystąpił błąd połączenia".$conn->connect_error;
        }
        else{
          
          $sql = "SELECT * FROM urzadzenie WHERE idUrzadzenia='$idurzadzenia'";
          $result=$conn->query($sql);

          $sql1 = "SELECT * FROM owner WHERE typuzytkownika='Pracownik'";
          $result1=$conn->query($sql1);
          
          


          if($result!=null){
            while($row = $result->fetch_assoc()){
            echo "
            <div class='row m-1 ' style=''>
              <div class='col-5 kolory rounded-start text-white border border-dark border-1' width=''>ID urządzenia: </div>
              <div class='col-6  border border-dark border-1'>$row[idUrzadzenia]</div>
            </div>
             
            <div class='row m-1 '>
              <div class='col-5 kolory rounded-start text-white border border-dark border-1'>Imię właściciela:</div>
              <div class='col-6  border border-dark border-1'>$row[imieWlasciciela]</div>
            </div>

            <div class='row m-1'>
              <div class='col-5 kolory rounded-start text-white border border-dark border-1'>Nazwisko właściciela:</div>
              <div class='col-6 border border-dark border-1'>$row[nazwiskoWlasciciela]</div>
            </div>

            <div class='row m-1'>
              <div class='col-5 kolory rounded-start text-white border border-dark border-1'>Adres E-mail właściciela:</div>
              <div class='col-6 border border-dark border-1'>$row[adresEmailWlasiciela]</div>
            </div>

            <div class='row m-1'>
              <div class='col-5 kolory rounded-start text-white border border-dark border-1'>Numer telefonu właściciela:</div>
              <div class='col-6 border border-dark border-1'>$row[numerTelefonuWlasciciela]</div>
            </div>

            <div class='row m-1'>
              <div class='col-5 kolory rounded-start text-white border border-dark border-1'>Typ rządzenia:</div>
              <div class='col-6 border border-dark border-1'>$row[typUrzadzenia]</div>
            </div>

            <div class='row m-1'>
              <div class='col-5 kolory rounded-start text-white border border-dark border-1'>Marka urządzenia:</div>
              <div class='col-6 border border-dark border-1'>$row[markaUrzadzenia]</div>
            </div>

            <div class='row m-1'>
              <div class='col-5 kolory rounded-start text-white border border-dark border-1'>Model urządzenia:</div>
              <div class='col-6 border border-dark border-1'>$row[modelUrzadzenia]</div>
            </div>

            <div class='row m-1'>
            <div class='col-5 kolory rounded-start border text-white border-dark border-1'>Problem opisany przez właściciela:</div>
            <div class='col-6 border border-dark border-1'>$row[Problem]</div>
          </div>

          <div class='row m-1'>
              <div class='col-5 kolory rounded-start text-white border border-dark border-1'>Dizagnoza:</div>
              <div class='col-6 border border-dark border-1'>$row[Diagnoza]</div>
            </div>
            <div class='row m-1'>
              <div class='col-5 kolory rounded-start text-white border border-dark border-1'>Czas przyjęcia:</div>
              <div class='col-6 border border-dark border-1'>$row[DataObecna]</div>
            </div>
            <div class='row m-1'>
              <div class='col-5 kolory rounded-start text-white border border-dark border-1'>Stan:</div>
              <div class='col-6 border border-dark border-1'>$row[Stan]</div>
            </div>
            
            ";
            $idpracownika = "$row[PrzypisanyPracownik]";
            }
          }
        
          
      $sql2 = "SELECT	Imie,Nazwisko FROM owner WHERE Id= '$idpracownika'";
      $result2=$conn->query($sql2);
      if($result2!=null){
        while($row2 = $result2->fetch_assoc()){
        echo "<div class='row m-1'>
        <div class='col-5 kolory rounded-start text-white border border-dark border-1'>Przypisany pracownik</div>
        <div class='col-6 border border-dark border-1'>$row2[Imie] $row2[Nazwisko]</div>
      </div>";
        }}
        if($_SESSION['typUzytkownika'] !='Uzytkownik' ):
        echo "<form action='ZmienStan.inc.php' method='Post'>
          <div class='row m-1'>
          <div class='col-5 kolory rounded-start text-white border border-dark border-1'>Zmień stan urządzenia:<input width='10px' type='text' name='iduz' class='visually-hidden' value='$idurzadzenia'> </div>
          <div class='col-6 border border-dark border-1'>
          <select class='form-select mb-1 mt-1' id='Stan' name='Stan' aria-label='Stan'>
            <option selected>Przyjęto</option>
            <option value='W czasie diagnozy'>W czasie diagnozy</option>
            <option value='Oczekuje na czesci'>Oczekuje na części</option>
            <option value='Oczekuje na potwierdzenie naprawy'>Oczekuje na potwierdzenie naprawy</option>
            <option value='W czasie naprawy'> W czasie naprawy</option>
            <option value='Do odbioru'>Do odbioru</option>
            <option value='Do utylizacji'>Do utylizacji</option>
            <option value='Niemożliwe do naprawy'>Niemożliwe do naprawy</option>
            <option value='Odebrane'>Odebrane</option>
            <option value='Zrealizowane'>Zrealizowane</option>
          </select>
          <div class='d-flex justify-content-end mb-1 mt-1'>
          <button class='btn btn-success' style='width:150px' type='submit' class='form-control' id='submit' >Zmień stan</button>
          </div>
          </div>
        </div>
             </form>";
             echo "<form action='ZmienPrzypisanegoPracownika.inc.php' method='Post'>
             <div class='row m-1'>
             <div class='col-5 kolory rounded-start text-white border border-dark border-1'>Zmień przypisanego pracownika:<input width='10px' type='text' name='iduz' class='visually-hidden' value='$idurzadzenia'> </div>
             <div class='col-6 border border-dark border-1'>
             <select class='form-select mb-1 mt-1' id='Pracownik' name='Pracownik' aria-label='Pracownik'>
               <option selected>Wybierz Pracownika</option>";
          if($result1!=null)
          while($row1 = $result1->fetch_assoc()){
              echo "<option value='$row1[Id]'>$row1[Imie] $row1[Nazwisko]</option>";
          }
             echo"</select>
             <div class='d-flex justify-content-end mb-1 mt-1'>
             <button class='btn btn-success' style='width:150px' type='submit' class='form-control' id='submit' >Przypisz pracownika</button>
             </div>
             </div>
           </div>
                </form>";
                echo "<form action='Diagnoza.inc.php' method='Post'>
          <div class='row m-1'>
          <div class='col-5 kolory rounded-start text-white border border-dark border-1'>Zmień diagnozę:<input width='10px' type='text' name='iduz' class='visually-hidden' value='$idurzadzenia'> </div>
          <div class='col-6 border border-dark border-1'>
          <div class='mt-2'>
                  <textarea class='form-control' id='diagnoza' name='diagnoza' cols='40' rows='3' placeholder='Diagnoza (max 250 słów)' ></textarea>
                </div>
          <div class='d-flex justify-content-end mb-1 mt-1'>
          <button class='btn btn-success' style='width:150px' type='submit' class='form-control' id='submit' >Zaaktualizuj</button>
          </div>
          </div>
        </div>
             </form>";
        ?> 
        <?php
        
        echo "<div class='col justify-content-start'>";
        if(isset($_SESSION['typUzytkownika'] )) {
          if($_SESSION['typUzytkownika'] == "Administrator"){
        
        echo"<a href='EdytujDane.php?id=$idurzadzenia'>
        <button class='btn 'style='background-color:lightgray;' type='button'>Edytuj dane</button>
        
        </a>" ;
          }}
        endif;
      
        }
        
        
        
        echo"<a href='Message.php?id=$idurzadzenia'>
        <button class='btn 'style='background-color:lightgray;' type='button'>Wyślij wiadomość</button>
        
        </a>
        
        " ;
        
        ?>
        
        
      </h5>
            </div>
            <div class="col-xs-6">
      </div>
      </div>
        </div>
    </div>
      </div>
</div>

</body>
</html>