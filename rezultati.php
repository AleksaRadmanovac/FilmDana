<?php
require 'dbBroker.php';
include 'domen\Glas.php';
include 'domen\Film.php';

if(isset($_POST['InputDatum']) && !empty($_POST['InputDatum']))
{
    $odgovor = '<div id="stavkaRezultata">';
    $conn = OpenCon();
    $pok = TRUE;
    $datum = $_POST['InputDatum'];
    $odgovor .= '<p> Rezultati glasanja za dan: ' . $datum . '</p>';    
    $listaFilmovaRez = Film::vratiSveDatum($conn, $datum);
    if($red = $listaFilmovaRez->fetch_array()){
    do{
        $odgovor .= '<p>' . $red['Naziv'] . ': ';
        $filmId = $red['Id'];
        $listaGlasovaZaFilmRez = Glas::vratiSveZaFilm($conn, $filmId);
        $brojac = 0;
        while($listaGlasovaZaFilmRez->fetch_array())
        {
            $brojac = $brojac + 1;
        }
        $odgovor .= $brojac . ' glasova</p>';
    }while($red = $listaFilmovaRez->fetch_array());
    }
    else {$odgovor .= '<p> Nema filmova za navedeni dan' . '</p>';}
    $odgovor .= '</div>';
    echo $odgovor;
}



?>