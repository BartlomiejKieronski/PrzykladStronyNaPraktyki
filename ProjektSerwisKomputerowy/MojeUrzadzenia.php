<?php
session_start();
if(!isset($_SESSION['typUzytkownika'])){
  header("Location:login.php");
}
else{
}
if(isset($_GET['id'])){
  $strona=$_GET['id'];
}
else{
  $strona = 1;
}
$następna = $strona+1;
$poprzednia = $strona-1;
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
 
<!-- navbar -->
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
    <!-- Ciało -->
    <div class="container">
    <div style="padding: 100px">
    <div class="container padding-left" >
    <div class='row border-bottom border-dark mt-3' id='devices'>
    <h5>Urządzenia do naprawy przypisane do ciebie:</h5>
    <div class='col'> <div class='row'> <div class='col'>ID:</div> <div class='col'>Typ urządzenia:</div> <div class='col'>Stan:</div> <div class='col'>Imie przypisanego pracownika:</div> <div class='col'>Nazwisko przypisanego pracownika:</div><div class='col'></div></div></div>
                    </div>
    <?php
    $test=$_SESSION['typUzytkownika'];
    
    $h=10;
    $offset = ($strona-1) *$h;
    
    $idu = $_SESSION['iduzytkownika'];

    $conn = @new mysqli('localhost','root','','serwiskomputerowy');
    if($conn->connect_error !=0){
      echo "Wystąpił błąd połączenia";
     }
    else{
        if(isset($_SESSION['typUzytkownika'])){
            if($_SESSION['typUzytkownika']=='Uzytkownik'){
                $uzytkownik = "SELECT * FROM owner WHERE Id = $idu";
                $urzadzenie = "SELECT * FROM urzadzenie WHERE Stan !='Odebrane'";
                $result2 = $conn->query($urzadzenie);
                $result = $conn->query($uzytkownik);
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                       
                         
                         if($result2->num_rows>0){
                             while ($row2 = $result2->fetch_assoc()){
                                 if($row['Imie']==$row2['imieWlasciciela'] && $row['Nazwisko']==$row2['nazwiskoWlasciciela'] && $row['NumerTelefonu']==$row2['numerTelefonuWlasciciela'] && $row['AdresEmail']==$row2['adresEmailWlasiciela']){
                                  $data2 = "SELECT Imie,Nazwisko FROM owner WHERE Id='$row2[PrzypisanyPracownik]'";
                                  $wynik1 = $conn->query($data2);

                                     echo "<div class='row border-bottom border-dark mt-3' id='devices'>
                                     <a type='submit' href='deviceinfo.php?id=$row2[idUrzadzenia]'>
                                     <div class='col'> <div class='row'> <div class='col'>$row2[idUrzadzenia]</div> <div class='col'>$row2[typUrzadzenia]</div> <div class='col'>$row2[Stan]</div> "; while($row6=$wynik1->fetch_assoc()){echo "<div class='col'>$row6[Imie]</div> <div class='col'> $row6[Nazwisko]</div> ";} echo"<div class='col'>";
                                     if($row2['typUrzadzenia']=='PC'){
                                      echo "<img src='devicegrafiki/PC.png' height='40px' width='40px' alt ='Avatar' style='border-radius: 50%;' class='float-end '></img> ";
                                      }
                                      else if($row2['typUrzadzenia'] =='Laptop'){
                                        echo "<img src='devicegrafiki/Laptop.png' height='40px' width='40px' alt ='Avatar' style='border-radius: 50%;' class='float-end '></img> ";
                                      }
                                      
                                      else if($row2['typUrzadzenia'] =='Telefon'){
                                        echo "<img src='devicegrafiki/Telefon.png' height='40px' width='40px' alt ='Avatar' style='border-radius: 50%;' class='float-end '></img> ";
                                      }
                                      
                                      else if($row2['typUrzadzenia'] =='Laptop'){
                                        echo "<img src='devicegrafiki/Laptop.png' height='40px' width='40px' alt ='Avatar' style='border-radius: 50%;' class='float-end '></img> ";
                                      }
                                      else if($row2['typUrzadzenia'] =='Tablet'){
                                        echo "<img src='devicegrafiki/Telefon.png' height='40px' width='40px' alt ='Avatar' style='border-radius: 50%;' class='float-end '></img> ";
                                      }
                                      else if($row2['typUrzadzenia'] =='Peryferia'){
                                        echo "<img src='devicegrafiki/Peryferia.png' height='40px' width='40px' alt ='Avatar' style='border-radius: 50%;' class='float-end '></img> ";
                                      }
                                      else if($row2['typUrzadzenia'] =='Konsola'){
                                        echo "<img src='devicegrafiki/Konsola.png' height='40px' width='40px' alt ='Avatar' style='border-radius: 50%;' class='float-end '></img> ";
                                      }
                                      else if($row2['typUrzadzenia'] =='Inne'){
                                        echo "<img src='devicegrafiki/inne.png' height='40px' width='40px' alt ='Avatar' style='border-radius: 50%;' class='float-end '></img> ";
                                      }
                                     
                                     echo "</div></div></div></a></div> ";

                                 }
                             }
                         } 
                    }
                }    
            }
            else if(($_SESSION['typUzytkownika']!="Uzytkownik") ){
               #echo "cos";
               $idpracownika = $_SESSION['iduzytkownika'];
               $urzadzeniaNaprawiane = "SELECT * FROM urzadzenie WHERE PrzypisanyPracownik = $idpracownika && Stan != 'Odebrane' && Stan != 'Niemożliwe do naprawy' && Stan != 'Do odbioru' && Stan != 'Zrealizowane' && Stan != 'Niemożliwe do naprawy' ";
               $result3 = $conn->query($urzadzeniaNaprawiane);
               if($result3 ->num_rows>0){
                   while($row3=$result3->fetch_assoc()){
                    $data1 = "SELECT Imie,Nazwisko FROM owner WHERE Id='$row3[PrzypisanyPracownik]'";
                    $wynik = $conn->query($data1);
                    echo "<div class='row border-bottom border-dark mt-3' id='devices'>
                    <a type='submit' href='deviceinfo.php?id=$row3[idUrzadzenia]'>
                    <div class='col'> <div class='row'> <div class='col'>$row3[idUrzadzenia]</div> <div class='col'>$row3[typUrzadzenia]</div> <div class='col'>$row3[Stan]</div> "; while($row5=$wynik->fetch_assoc()){echo "<div class='col'>$row5[Imie]</div> <div class='col'> $row5[Nazwisko]</div> ";} echo"<div class='col'>";
                    if($row3['typUrzadzenia']=='PC'){
                      echo "<img src='devicegrafiki/PC.png' height='40px' width='40px' alt ='Avatar' style='border-radius: 50%;' class='float-end '></img> ";
                      }
                      else if($row3['typUrzadzenia'] =='Laptop'){
                        echo "<img src='devicegrafiki/Laptop.png' height='40px' width='40px' alt ='Avatar' style='border-radius: 50%;' class='float-end '></img> ";
                      }
                      
                      else if($row3['typUrzadzenia'] =='Telefon'){
                        echo "<img src='devicegrafiki/Telefon.png' height='40px' width='40px' alt ='Avatar' style='border-radius: 50%;' class='float-end '></img> ";
                      }
                      
                      else if($row3['typUrzadzenia'] =='Laptop'){
                        echo "<img src='devicegrafiki/Laptop.png' height='40px' width='40px' alt ='Avatar' style='border-radius: 50%;' class='float-end '></img> ";
                      }
                      else if($row3['typUrzadzenia'] =='Tablet'){
                        echo "<img src='devicegrafiki/Telefon.png' height='40px' width='40px' alt ='Avatar' style='border-radius: 50%;' class='float-end '></img> ";
                      }
                      else if($row3['typUrzadzenia'] =='Peryferia'){
                        echo "<img src='devicegrafiki/Peryferia.png' height='40px' width='40px' alt ='Avatar' style='border-radius: 50%;' class='float-end '></img> ";
                      }
                      else if($row3['typUrzadzenia'] =='Konsola'){
                        echo "<img src='devicegrafiki/Konsola.png' height='40px' width='40px' alt ='Avatar' style='border-radius: 50%;' class='float-end '></img> ";
                      }
                      else if($row3['typUrzadzenia'] =='Inne'){
                        echo "<img src='devicegrafiki/inne.png' height='40px' width='40px' alt ='Avatar' style='border-radius: 50%;' class='float-end '></img> ";
                      }
                    echo"</div></div></div>
                    </a></div> ";
                   }
               }
            }
        }
    }
    ?>
            </div>
        </div>
        <!-- paginator -->
    </div>
  </div>
  
</div>
</body>
</html>