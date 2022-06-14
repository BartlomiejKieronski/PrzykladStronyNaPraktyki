<?php
session_start();

$numertelefonu = $_POST['numerTelefonu'];
$haslo = $_POST['haslo'];

$polaczenie = @new mysqli('localhost', 'root','','serwiskomputerowy');

if($polaczenie->connect_error !=0){
    echo "wystąpił błąd połączenia" .$polaczenie->connect_error;
}
else{
    $sql_check = "SELECT NumerTelefonu,Haslo,typuzytkownika,Id FROM owner";
    $result = $polaczenie->query($sql_check);
    if($result->num_rows >0){
        while($row = $result->fetch_assoc()){
            if($row["NumerTelefonu"]==$numertelefonu && $row["Haslo"]==$haslo){
                $_SESSION["NumerTelefonu"] = $numerTelefonu ;
                $_SESSION['typUzytkownika'] = "$row[typuzytkownika]";
                $_SESSION['iduzytkownika'] = "$row[Id]";
                header("Location:MojeUrzadzenia.php");
            }
        }
    }   
}

?>