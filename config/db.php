<?php
declare(strict_types=1);


// Ce fichier retourne un tableau utilisé lors de l'initialisation PDO

return [

    
    'dsn' => 'mysql:host=127.0.0.1;dbname=gestion_etudiants_pdo;charset=utf8mb4',

    
    'user' => 'root',
    'pass' => '',

    // Options PDO pour sécuriser et standardiser le comportement
    'options' => [

        // Active les exceptions en cas d'erreur SQL
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

        // Retourne les résultats sous forme de tableau associatif
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ],
];