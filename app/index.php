<?php
$pdo = new PDO("mysql:host=database;dbname=blog","root","password",
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
echo "coucou";