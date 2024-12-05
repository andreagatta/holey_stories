<?php 
    include "../backend/main.php";

    session_start();
    initStoria();

    $indiceParole = isset($_SESSION['indiceParole']) ? $_SESSION['indiceParole'] : 0;

    $sesso = "sessogay";

    if(isset($_SESSION["paroleMancanti"])) {
        $indiceParole = 0;
        $parola = $_SESSION["paroleMancanti"][$indiceParole];
        $indiceParole++;
        $_SESSION["indiceParole"] = $indiceParole;
    }
?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HS - Mode 1</title>
    <link rel="stylesheet" href="playmode1.css">
</head>
<body>
    <div class="container">
        <h3> Sei a <?=$indiceParole?>/<?=count($_SESSION["paroleMancanti"])?> parole</h3>
    </div>
</body>
</html>