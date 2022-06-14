<?php
session_start();
if(!isset($_SESSION['typUzytkownika'])){
  header("Location:login.php");
}
else if (isset($_SESSION['typUzytkownika'])){
  if ($_SESSION['typUzytkownika']=='Uzytkownik'){
      header("Location:MojeUrzadzenia.php");
}}
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
    <h5>Urządzenia do naprawy :</h5>
                    <div class='col'> <div class='row'> <div class='col'>ID:</div> <div class='col'>Typ urządzenia:</div> <div class='col'>Stan:</div> <div class='col'>Imie i nazwisko przypisanego pracownika:</div> <div class='col'></div></div></div>
                    </div>
    <?php
    
    $h=10;
    $offset = ($strona-1) *$h;
    
    $conn = @new mysqli('localhost','root','','serwiskomputerowy');
    if($conn->connect_error !=0){
      echo "Wystąpił błąd połączenia";
     }
    else{
      
      $data = "SELECT * FROM urzadzenie LIMIT $offset, $h";
      $result = $conn->query($data);
      
      if($result!=null){
        while($row = $result->fetch_assoc()){
          $data1 = "SELECT Imie,Nazwisko FROM owner WHERE Id='$row[PrzypisanyPracownik]'";
          $wynik = $conn->query($data1);
          echo "<div class='row border-bottom border-dark mt-3' id='devices'>
          <a type='submit' href='deviceinfo.php?id=$row[idUrzadzenia]'>
          <div class='col'> <div class='row'><div class='col'> $row[idUrzadzenia]</div> <div class='col'>$row[typUrzadzenia]</div> <div class='col'> $row[Stan]</div> <div class='col'> "; while($row5=$wynik->fetch_assoc()){echo "$row5[Imie] $row5[Nazwisko]";} echo" </div><div class='col'>";
          if($row['typUrzadzenia']=='PC'){
          echo "<img src='devicegrafiki/PC.png' height='40px' width='40px' alt ='Avatar' style='border-radius: 50%;' class='float-end '></img> ";
          }
          else if($row['typUrzadzenia'] =='Laptop'){
            echo "<img src='devicegrafiki/Laptop.png' height='40px' width='40px' alt ='Avatar' style='border-radius: 50%;' class='float-end '></img> ";
          }
          
          else if($row['typUrzadzenia'] =='Telefon'){
            echo "<img src='devicegrafiki/Telefon.png' height='40px' width='40px' alt ='Avatar' style='border-radius: 50%;' class='float-end '></img> ";
          }
          
          else if($row['typUrzadzenia'] =='Laptop'){
            echo "<img src='devicegrafiki/Laptop.png' height='40px' width='40px' alt ='Avatar' style='border-radius: 50%;' class='float-end '></img> ";
          }
          else if($row['typUrzadzenia'] =='Tablet'){
            echo "<img src='devicegrafiki/Telefon.png' height='40px' width='40px' alt ='Avatar' style='border-radius: 50%;' class='float-end '></img> ";
          }
          else if($row['typUrzadzenia'] =='Peryferia'){
            echo "<img src='devicegrafiki/Peryferia.png' height='40px' width='40px' alt ='Avatar' style='border-radius: 50%;' class='float-end '></img> ";
          }
          else if($row['typUrzadzenia'] =='Konsola'){
            echo "<img src='devicegrafiki/Konsola.png' height='40px' width='40px' alt ='Avatar' style='border-radius: 50%;' class='float-end '></img> ";
          }
          else if($row['typUrzadzenia'] =='Inne'){
            echo "<img src='devicegrafiki/inne.png' height='40px' width='40px' alt ='Avatar' style='border-radius: 50%;' class='float-end '></img> ";
          }
          echo"</div></div></div>
          </a></div>";
      }
    }
  }
    ?>
            </div>
        </div>
        <!-- paginator -->
    <?php
    
$number = "SELECT max(idUrzadzenia) as max FROM urzadzenie;";
$result1 = $conn->query($number);
if($result1!=null){
  while($row1 = $result1->fetch_assoc()){
    
    $x = "$row1[max]";  
  }
}

$y = (int)($x/10);

$z = $x%10;
$a=0;
if($z>0){
  $a = $y+1;
  
}
if($strona>2){
$min=$strona-2;
}else{
  $min=0;
}
$max=$strona+2;

$i=1;
  echo "<div class=' justify-content-center '>
    <ul class='pagination justify-content-center '>";

    if($poprzednia>0){
    echo "<li class='page-item'><a class='page-link' href='devices.php?id=$poprzednia'>Previous</a></li>";
    }
    else{
      echo "<li class='page-item'><a  link='disabled' class='page-link' href='#'>Previous</a></li>";
    }
    if($min>0){
    echo "<li class='page-item'><a  link='disabled' class='page-link' href='devices.php?id=$min'>$min</a></li>";
    }else{}
    if($poprzednia>0){
    echo "<li class='page-item'><a  link='disabled' class='page-link' href='devices.php?id=$poprzednia'>$poprzednia</a></li>";
    }else{}
    echo "<li class='page-item page-item active'> <a link='disabled' class='page-link' href='devices.php?id=$strona'>$strona</a></li>";
    if($następna<=$a){
    echo "<li class='page-item'><a  link='disabled' class='page-link' href='devices.php?id=$następna'>$następna</a></li>";
    }else{}
    if($max<=$a){
    echo "<li class='page-item'><a  link='disabled' class='page-link' href='devices.php?id=$max'>$max</a></li>";
    }else{}
    if((($strona*10)+1)>=$x){
echo "<li class='page-item'><a link='disabled' class='page-link' href='#'>Next</a></li>";
  
}else{
  echo "<li class='page-item'><a  class='page-link' href='devices.php?id=$następna'>Next</a></li>";

}
echo"</ul>
</nav>
</div>";
?>
    </div>
  </div>

</body>
</html>