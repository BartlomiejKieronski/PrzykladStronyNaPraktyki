<?php
session_start();

$Imie =$_POST['Imie'];
$Nazwisko =$_POST['Nazwisko'];
$Email =$_POST['Email'];
$numer =$_POST['number'];
$haslo =$_POST['password'];
$typUzytkownika = "Pracownik";

$polaczenie=mysqli_connect('localhost','root','','serwiskomputerowy');
if($polaczenie->connect_error !=0){
    echo "wystąpił błąd połączenia".$polaczenie->connect_error;
}
else{
    $sql = "INSERT INTO owner(Imie,Nazwisko,NumerTelefonu,AdresEmail,Haslo,typUzytkownika) VALUES ('$Imie','$Nazwisko','$numer','$Email','$haslo','$typUzytkownika')";
    if($polaczenie->query($sql)){
    header("Location:login.php");
    }
}

?>