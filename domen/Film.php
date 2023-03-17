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
            $datumString = (string)$datum['mday'].' '.(string)$datum['mon'].' '.(string)$datum['year'];
            $this->datumDodavanja = $datumString;
        }

        public static function vratiSve(mysqli $conn)
        {
            $query = "SELECT * FROM film";
            return $conn->query($query);
        }

        public function dodajFilm(mysqli $conn)
        {
            echo $this->datumDodavanja;
            $query = "INSERT INTO film (Naziv, Reditelj, DatumDodavanja) values ('$this->naziv', '$this->reziser', STR_TO_DATE('$this->datumDodavanja','%d %m %Y'))";
            return $conn->query($query);
        }

        public static function vratiSveDanasnje($danasnjiDatum)
        {
            $query = "SELECT * FROM film WHERE datumDodavanja = $danasnjiDatum";
        }
    
    
    }




?>