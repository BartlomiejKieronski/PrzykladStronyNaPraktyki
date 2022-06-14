<?php
session_start();
$NumerTelefonu = $_POST['NumerTelefonuWlasciciela'];
$AdresEmail = $_POST['AdresEmail'];
$ImieWlasciciela= $_POST['ImieWlasciciela'];
$NazwiskoWlasciciela =$_POST['NazwiskoWlasciciela'];
$TypUrzadzenia = $_POST['TypUrzadzenia'];
$MarkaUrzadzenia= $_POST['MarkaUrzadzenia'];
$ModelUrzadzenia= $_POST['ModelUrzadzenia'];
$OpisanyProblem = trim($_POST['OpisanyProblem']);
$stan= 'przyjęto';
$dates = date('y-m-d h:i:s');
$conn= @new mysqli('localhost','root','','serwiskomputerowy');
if($conn->connect_error !=0){
    echo "Wystąpił błąd połączenia";
}
else{
    $sql = "INSERT INTO urzadzenie(imieWlasciciela,nazwiskoWlasciciela,adresEmailWlasiciela,numerTelefonuWlasciciela,markaUrzadzenia,typUrzadzenia,modelUrzadzenia,Problem,Stan,DataObecna) VALUES ('$ImieWlasciciela','$NazwiskoWlasciciela','$AdresEmail','$NumerTelefonu','$MarkaUrzadzenia','$TypUrzadzenia','$ModelUrzadzenia','$OpisanyProblem','$stan','$dates')";
    if($conn->query($sql)){
    header("Location:devices.php");
}

}
?>