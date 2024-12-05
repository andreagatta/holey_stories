<?php 


    session_start();

    $storiaRandom = null;
    $paroleMancanti = null;

    $_SESSION["storiaRandom"] = $storiaRandom;
    $_SESSION["paroleMancanti"] = $paroleMancanti;

    function initStoria() {
        $storie = glob(__DIR__ . '/../assets/storie/*.txt');
        if ($storie) {
            $storiaRandomDir = $storie[array_rand($storie)];
            $storiaRandom = file_get_contents($storiaRandomDir);
        } else {
            return 'Nessuna storia trovata';
        }   

        preg_match_all('/\{([^}]+)\}/', $storiaRandom, $matches);
        $paroleMancanti = $matches[1];
    }

    function assemblaStoria($nuoveParole) {
        foreach($paroleMancanti as $index => $placeholder) {
            if (isset($nuoveParole[$index])) {
                $storiaRandom = preg_replace('/' . preg_quote($placeholder, '/') . '/', $nuoveParole[$index], $storiaRandom, 1);
            }
        }
    }
    
?>