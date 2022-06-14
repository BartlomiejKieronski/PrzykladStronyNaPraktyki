<?php
session_start();

$diagnoza = trim($_POST["diagnoza"]);
$idurzadzenia = $_POST["iduz"];

$polaczenie=mysqli_connect('localhost','root','','serwiskomputerowy');
if($polaczenie->connect_error !=0){
    echo 'błąd połączenia';
}
else{
    $sql = "UPDATE urzadzenie SET Diagnoza='$diagnoza' WHERE idUrzadzenia = $idurzadzenia;";
    if($polaczenie->query($sql)){
        
    header("Location:deviceinfo.php?id=$idurzadzenia");
}}

?>