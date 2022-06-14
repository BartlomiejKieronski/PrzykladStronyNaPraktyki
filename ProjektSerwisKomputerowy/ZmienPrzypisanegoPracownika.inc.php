<?php
session_start();

$idpracownika = $_POST["Pracownik"];
$idurzadzenia = $_POST["iduz"];
$date = date('y-m-d');
$datym = date('m');
$polaczenie=mysqli_connect('localhost','root','','serwiskomputerowy');
if($polaczenie->connect_error !=0){
    echo 'błąd połączenia';
}
else{
    $sql = "UPDATE urzadzenie SET PrzypisanyPracownik='$idpracownika' WHERE idUrzadzenia = $idurzadzenia;";
    $polaczenie->query($sql);
    $check = "SELECT numery FROM stats WHERE MONTH(daty)=$datym AND idUzytkownika=$idpracownika";
    $result = $polaczenie->query($check);
    
    if(mysqli_num_rows($result)>0){
        $num ="SELECT numery FROM stats WHERE MONTH(daty)=$datym AND idUzytkownika=$idpracownika";
        $result2=$polaczenie->query($num);
        $numer = 0;
        while($row = $result2->fetch_assoc()){
            $numer = $row['numery'];
        }
        
            $x = $numer+1;
        $updaty = "UPDATE stats SET numery = $x WHERE MONTH(daty)=$datym AND idUzytkownika=$idpracownika";
        $polaczenie->query($updaty);
    }
if(mysqli_num_rows($result)==0){
    
    $sql2 = "INSERT INTO stats(idUzytkownika,numery) VALUES ($idpracownika,1);";
    $polaczenie->query($sql2);
}
   header("Location:deviceinfo.php?id=$idurzadzenia");
    
}

?>