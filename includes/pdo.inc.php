<?php

    $host = 'localhost';
    $db   = 'namu_sistema';
    $user = 'namai';
    $pass = 'namaipass';
    $dsn = "mysql:host=$host;dbname=$db";
    $opt = [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $user, $pass, $opt);