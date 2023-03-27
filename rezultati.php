<?php
require 'dbBroker.php';
include 'domen\Glas.php';
include 'domen\Film.php';

if(isset($_POST['InputDatum']) && !empty($_POST['InputDatum']))
{
    $conn = OpenCon();
    $pok = TRUE;
    $datum = $_POST['InputDatum'];
    echo $datum;
    $listaFilmovaRez = Film::vratiSveDatum($conn, $datum);
    while($red = $listaFilmovaRez->fetch_array())
    {
        echo $red['Naziv'];
        $filmId = $red['Id'];
        $listaGlasovaZaFilmRez = Glas::vratiSveZaFilm($conn, $filmId);
        $brojac = 0;
        while($listaGlasovaZaFilmRez->fetch_array())
        {
            $brojac = $brojac + 1;
        }
        echo $brojac;
    }
}



?>