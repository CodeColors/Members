<?php

try{
    $bdd = new PDO('mysql:host=localhost;dbname=panelvente', 'root', '');
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}catch(Exception $e){
    echo 'Connexion à la base de donnée échouée';
    die();
}

?>