<?php
session_start();
$wiadomosc = $_POST['message'];
$idurzadzenia = $_POST['idUrzadzenia'];
$iduzytkownika = $_SESSION['iduzytkownika'];

$conn = @new mysqli('localhost', 'root','','serwiskomputerowy');
if($conn->connect_error !=0){

}else{
$sql = "INSERT INTO message(idUrzadzenia,messageText,idUzytkownika) VALUES ($idurzadzenia,'$wiadomosc','$iduzytkownika')";
if($conn->query($sql)){
    header("Location:Message.php?id=$idurzadzenia");
}
}
?>