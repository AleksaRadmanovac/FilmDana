<?php
    include 'dbBroker.php';
    include 'domen\Film.php';
    $conn = OpenCon();
    echo "Connected Successfully";
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
    <link rel="stylesheet" href="Style.css">
    <script
        src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous">
    </script>
    <title>Document</title>
</head>
<body>
    <h1>Lista za film dana</h1>
    <?php if($red = $listaFilmovaRez->fetch_array()) { ?>
    <form method="post" action="glasanje.php" name="forma1">
    <?php 
    do{?>
    
        <p><?php echo $red['Naziv'];?></p>
        
        <input type="radio" name="film" value=<?php echo $red['Id']; ?>>


    <?php 
    }while($red = $listaFilmovaRez->fetch_array()); 
    ?>
    <br>
    <p>email:</p>
    <input type="text" name="email"></input>
    <button type ="submit" style= "width: 70; heighth: 100;">Glasaj</button>
    </form>
    <?php } else { ?>
        <p>Jos uvek nema filmova za danasnje glasanje</p>
    <?php }?>
    <form method="post" action="rezultati.php" name="forma2">
    <button type ="submit" style= "width: 70; heighth: 100;">Rezultati</button>
    <input type="date" name="InputDatum">
    </form>
    
</body>
</html>



