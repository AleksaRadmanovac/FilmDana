<?php 
    class Film 
    {
        public $id=null;
        public $naziv;
        public $reziser;
        public $datumDodavanja;
    
        public function __construct($naziv=null,$reziser=null)
        {
            $this->naziv = $naziv;
            $this->reziser = $reziser;
            $datum = getdate();
            $datumString = (string)$datum['year'].'-'.(string)$datum['mon'].'-'.(string)$datum['mday'];
            $this->datumDodavanja = $datumString;
        }

        public static function vratiSve(mysqli $conn)
        {
            $query = "SELECT * FROM film";
            return $conn->query($query);
        }

        public function dodajFilm(mysqli $conn)
        {
            $query = "INSERT INTO film (Naziv, Reditelj, DatumDodavanja) values ('$this->naziv', '$this->reziser', STR_TO_DATE('$this->datumDodavanja','%Y-%m-%d'))";
            return $conn->query($query);
        }

        public static function vratiSveDatum(mysqli $conn, $datum)
        {
            $query = "SELECT * FROM film WHERE DatumDodavanja = STR_TO_DATE('$datum', '%Y-%m-%d')";
            return $conn->query($query);
        }
        
        public static function PretragaFilmova(mysqli $conn, $nazivFilma)
        {
            $query = "SELECT * FROM film WHERE Naziv LIKE '$nazivFilma%'";
            return $conn->query($query);
        }

    
    }




?>