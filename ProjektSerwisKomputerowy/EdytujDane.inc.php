<?php
session_start();

$NumerTelefonu = $_POST['NumerTelefonuWlasciciela'];
$AdresEmail = $_POST['AdresEmail'];
$ImieWlasciciela= $_POST['ImieWlasciciela'];
$NazwiskoWlasciciela =$_POST['NazwiskoWlasciciela'];
$TypUrzadzenia = $_POST['TypUrzadzenia'];
$MarkaUrzadzenia= $_POST['MarkaUrzadzenia'];
$ModelUrzadzenia= $_POST['ModelUrzadzenia'];
$idurzadzenia=$_POST['iduz'];



$polaczenie=mysqli_connect('localhost','root','','serwiskomputerowy');
if($polaczenie->connect_error !=0){
    echo "wystąpił błąd połączenia".$polaczenie->connect_error;
}
else{
    $sql = "UPDATE urzadzenie SET numerTelefonuWlasciciela = '$NumerTelefonu', adresEmailWlasiciela = '$AdresEmail', imieWlasciciela='$ImieWlasciciela', nazwiskoWlasciciela='$NazwiskoWlasciciela', typUrzadzenia='$TypUrzadzenia', markaUrzadzenia='$MarkaUrzadzenia', modelUrzadzenia='$ModelUrzadzenia' WHERE idUrzadzenia='$idurzadzenia'";
    if($polaczenie->query($sql)){
    header("Location:deviceinfo.php?id=$idurzadzenia");
    }
}

?>