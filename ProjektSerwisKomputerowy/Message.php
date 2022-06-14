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
 
}.kolor{
  background-color: rgb(3,3,64);
}
.kolory{
  background-color:#e7f5fe;
 
}

    </Style>
</head>
<body onload="bottom()">
    <script>
        function bottom() {
    document.getElementById( 'message' ).scrollIntoView();
    window.setTimeout( function () { top(); }, 10 );
};

bottom();
        </script>
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
    <div class="container justify content-center " style="padding-top:100px;">
    <div class='container border p-1 align-bottom' style='width:50%;min-height: 800px;' >
<div class="container">

<?php
$sesja = $_SESSION['iduzytkownika'];
    $urzadzenie=$_GET['id'];
    $conn= @new mysqli('localhost','root','','serwiskomputerowy');
    if($conn->connect_error !=0){
        echo "Wystąpił błąd połączenia";
       }else{
        $dane = "SELECT * FROM message WHERE idUrzadzenia = $urzadzenie";
        $result =$conn->query($dane);
        if($result!=null){
        while($row =$result->fetch_assoc()){
            #$dane1 = "SELECT typuzytkownika FROM owner WHERE Id = $row[idUzytkownika]";
           # $result2 = $conn->query($dane1);
           if($row['idUzytkownika']==$sesja){
        echo "<div class='row '>
    <div class='col-2 justify-content-end text-end'>";
    echo" <div class='p-1 align-bottom d-inline kolor text-white rounded-circle' >ja </div>";
    echo"</div>
    <div class='col p-2 rounded-end'>";
      echo"<div class='p-1 text-white d-inline-flex rounded start kolor'>".$row['messageText']."</div>";
    echo"</div>
    <div class='col-2'>
    </div>
  </div>";
           }else{
            echo "<div class='row'>
            <div class= col-2>
            </div>
            <div class='col d-flex justify-content-end'>";
            echo"<div class='d-inline-flex rounded kolor text-white p-1 m-1'>".$row['messageText']."</div>";
            echo"</div>
            <div class='col-2 rounded-start'>";
            echo "<div class='rounded-circle kolor d-inline text-white p-1'>S </div>";
            echo"</div>
            
          </div>";
           }
        }
    }
}?></div></div>
<div class="container justify-content-center" style='width:50%;'>
<form action="message.inc.php" method="post">
<div class="mt-2 ">
<div class="input-group mb-3">
  <textarea class="form-control" id="message" name="message" placeholder="Wiadomość max 250 znaków" aria-label="Recipient's username" aria-describedby="button-addon2" rows='1'></textarea>
  <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Wyślij</button>
  <?php echo"<input class='form-control' name='idUrzadzenia' id='idUrzadzenia' value='$urzadzenie' type='hidden'>"?>
</div>
                </div>
</form>
</div>
        

</body>
</html>