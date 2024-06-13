<?php
$connection = new PDO('mysql:host=localhost;dbname=mybank', 'root', '');
if(!$connection){
    echo "erreur de connection à la Base de donnée.";
}

?>