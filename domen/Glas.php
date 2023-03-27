<?php

    class Glas 
    {
        public $id;
        public $film_id;
        public $email;
        public $username;
        public $komentar;
    

        public static function dodajGlas(mysqli $conn, $filmId, $email) {
            
            echo $filmId;
            echo $email;
            $query = "Insert into glaszaFilm(FilmId,Email) values ('$filmId','$email')";
            return $conn->query($query);
        }

        public static function vratiSveDatum(mysqli $conn, $datum)
        {
            $query = "SELECT * FROM glaszaFilm INNER JOIN film ON Id = filmId WHERE DatumDodavanja = STR_TO_DATE('$datum', '%Y-%m-%d')";
            return $conn->query($query);
        }

        public static function vratiSveZaFilm(mysqli $conn, $id)
        {
            $query = "SELECT * FROM glaszaFilm WHERE FilmId = $id";
            return $conn->query($query);
        }

    }

?>