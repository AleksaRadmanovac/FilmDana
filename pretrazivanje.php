<?php
require 'dbBroker.php';
include 'domen\Glas.php';
include 'domen\Film.php';

if(isset($_POST['film']) && !empty($_POST['film']))
{
    $odgovor = '<div id="RezultatPret">';
    $conn = OpenCon();
    $NazivFilma = $_POST['film'];
    $listaFilmovaRez = Film::PretragaFilmova($conn, $NazivFilma);
    if($red = $listaFilmovaRez->fetch_array()){
    do{
        $odgovor .= '<div id="stavkaRezultataPret">';
        $odgovor .= '<p>Naziv: ' . $red['Naziv'] . '</p>';
        $odgovor .= '<p>Redtilj: ' . $red['Reditelj'] . '</p>';
        $odgovor .= '<p>Datum dodavanja: ' . $red['DatumDodavanja'] .'</p>';
        $filmId = $red['Id'];
        $listaGlasovaZaFilmRez = Glas::vratiSveZaFilm($conn, $filmId);
        $brojac = 0;
        while($listaGlasovaZaFilmRez->fetch_array())
        {
            $brojac = $brojac + 1;
        }
        $odgovor .= '<p>Broj glasova: ' . $brojac . '</p>';
        $odgovor .= '</div>';
    }while($red = $listaFilmovaRez->fetch_array());
    }
    else {$odgovor .= '<p> Nema filmova sa zadatim imenom' . '</p>';}
    $odgovor .= '</div>';
    echo $odgovor;
}



?>