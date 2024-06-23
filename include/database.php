<?php
// Connection base de données //

$PDO = new PDO('mysql:dbname=happynewyear;host=localhost', 'root', 'root');
$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Erreurs SQL transformé en erreurs PHP
$PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); // Mode de récupération