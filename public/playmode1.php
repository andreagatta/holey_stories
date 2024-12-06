<?php 
    include "../backend/main.php";


    if(!isset($_SESSION["storiaInizializzata"])) {
        echo "<script>console.log('sessoassurdo');</script>";
        initStoria(); 
        $_SESSION["storiaInizializzata"] = true;
    }



    $indiceParole = isset($_SESSION['indiceParole']) ? $_SESSION['indiceParole'] : 0;

    if($indiceParole >= count($_SESSION["paroleMancanti"])) {
        $nuoveParole = $_SESSION["nuoveParole"];
        session_reset();
        assemblaStoria($nuoveParole);
        header("Location: displaystory.php");
        exit();
    } 


    $sesso = "sessogay";

    if(isset($_SESSION["paroleMancanti"])) {
        $parola = $_SESSION["paroleMancanti"][$indiceParole];
        $parola = trim($parola, "{}");
    }

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["valore"])) {
        if(!($_POST["valore"] == "")) {
            $_SESSION["nuoveParole"][$indiceParole] = $_POST["valore"];
            $indiceParole++;
            $_SESSION["indiceParole"] = $indiceParole;
        }       
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
        <h1>Ho bisogno di <br> un <?=$parola?></h1>
        <form method="post">
            <input type="text" $placeholder="Inserisci un <?=$parola?>" name="valore">
            <button type="submit">Inserisci</button>
        </form>
    </div>
</body>
</html>