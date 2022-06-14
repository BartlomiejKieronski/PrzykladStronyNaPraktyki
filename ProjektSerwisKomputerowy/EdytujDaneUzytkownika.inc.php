<?php
session_start();

$Imie =$_POST['Imie'];
$Nazwisko =$_POST['Nazwisko'];
$Email =$_POST['Email'];
$numer =$_POST['number'];

$iduzytkownika = $_SESSION['iduzytkownika'];

$polaczenie=mysqli_connect('localhost','root','','serwiskomputerowy');
if($polaczenie->connect_error !=0){
    echo "wystąpił błąd połączenia".$polaczenie->connect_error;
}
else{
    $sql = "UPDATE owner SET Imie = '$Imie', Nazwisko = '$Nazwisko', AdresEmail='$Email', NumerTelefonu='$numer' WHERE Id='$iduzytkownika'";
    if($polaczenie->query($sql)){
    header("Location:EdytujDaneUzytkownika.php");
    }
}

?>