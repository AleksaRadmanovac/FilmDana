<?php
    include 'dbBroker.php';
    include 'domen\Film.php';
    $conn = OpenCon();
    $datum = getdate();
    $datumString = (string)$datum['year'].'-'.(string)$datum['mon'].'-'.(string)$datum['mday'];

    $listaFilmovaRez = Film::vratiSveDatum($conn, $datumString);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script
        src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous">
    </script>
    <script src="ajax.js"></script>
    <title>Document</title>
</head>
<body>
    <div id="listaFilmova">
    <h1>Lista za film dana</h1>
    <?php if($red = $listaFilmovaRez->fetch_array()) { ?>
    <form id="forma1">
    <?php 
    do{?>
    <div id="film">
        <div id="filmNaziv">
        <p><?php echo $red['Naziv'];?></p>
        </div> 
        <div id="filmRadio">
        <input type="radio" name="film" value=<?php echo $red['Id']; ?>>
        </div> 
    </div>    
    <?php 
    }while($red = $listaFilmovaRez->fetch_array()); 
    ?>
    <div id="glasaj">
    <p>email:</p>
    <input type="text" name="email"></input>
    <button type ="button" style= "width: 70; heighth: 100;" id="dugme1">Glasaj</button>
    
    </form>
    <?php } else { ?>
        <p>Jos uvek nema filmova za danasnje glasanje</p>
    <?php }?>
    <div id="response">
    </div>
    </div>
    </div>
    <div id="rezultati">
    <form id="forma2">
        <div id="rezultatiUpit">
            <input type="date" name="InputDatum" style= 'background-color: rgb(250, 250, 250, 0.7);'>
            <button type ="button" style= "width: 70; heighth: 100; background-color: rgb(250, 250, 250, 0.7);" id="dugme2">Rezultati</button>
        </div>
    </form>
    <!-- <div id="tabela">
        <p id="tabelaNaziv">Naziv</p>
        <p id="BrojGlasova">Broj glasova</p>
    </div> -->
    <div id="response2"></div>
    </div>
    <div>
    <form id="forma3">
    <div id="pretraga">
        <p>Pretrazi film:</p>
        <input type="text" name="film"></input>
        <button type ="button" style= "width: 70; heighth: 100;" id="dugme3">Pretrazi</button>
    </form>
    <div id="response3"></div>
    </div>
    </div>

    
    
</body>
</html>



