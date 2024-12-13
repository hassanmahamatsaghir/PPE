<?php
function db_connect() {
    $host = 'localhost:8889'; 
    $dbname = 'projet_orientation';
    $username = 'root';
    $password = 'root'; 

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "ok"; 
        return $pdo;
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
}
?>