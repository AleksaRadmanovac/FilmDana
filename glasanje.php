<?php
require 'dbBroker.php';
include 'domen\Glas.php';

if(isset($_POST['film']) != NULL && isset($_POST['email']) != NULL && !empty($_POST['email']))
{
    $conn = OpenCon();
    $pok = TRUE;
    $datum = getdate();
    $film = $_POST['film'];
    //echo $film;
    $email = $_POST['email'];
    //echo $email;
    $datumString = (string)$datum['year'].'-'.(string)$datum['mon'].'-'.(string)$datum['mday'];
    $listaGlasovaRez = Glas::vratiSveDatum($conn, $datumString);
    while($red = $listaGlasovaRez->fetch_array())
    {
        if($red['Email'] == $email)
        {
            $pok = FALSE;
        }
    }
    if($pok){
        Glas::dodajGlas($conn, $film, $email);
        echo "Uspesno ste glasali";
    }
        else 
        {
            echo "Vec ste glasali danas";

        }
}
else { echo 'greska';}


?>