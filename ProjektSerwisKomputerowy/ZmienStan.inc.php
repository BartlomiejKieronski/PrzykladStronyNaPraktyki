<?php
session_start();

$stanUrzadzenia = $_POST['Stan'];
$idurzadzenia = $_POST['iduz'];

$polaczenie=mysqli_connect('localhost','root','','serwiskomputerowy');
if($polaczenie->connect_error !=0){
    echo 'błąd połączenia';
}
else{
    $sql = "UPDATE urzadzenie SET Stan = '$stanUrzadzenia' WHERE idUrzadzenia = $idurzadzenia;";
    if($polaczenie->query($sql)){
        
    header("Location:deviceinfo.php?id=$idurzadzenia");
}}

?>