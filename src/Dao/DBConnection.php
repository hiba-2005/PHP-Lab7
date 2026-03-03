<?php
// src/Dao/DBConnection.php
namespace App\Dao;

use PDO;
use PDOException;

class DBConnection
{
    /**
     * Crée et retourne une instance PDO
     * Centralise la configuration de connexion à la base de données
     */
    public static function create(
        string $host,
        string $db,
        string $user,
        string $pass,
        string $charset,
        Logger $logger
    ): PDO {

        // Construction du DSN MySQL
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        // Options PDO recommandées
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,          // Lève des exceptions en cas d'erreur
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,     // Retourne des tableaux associatifs
            PDO::ATTR_EMULATE_PREPARES => false,                  // Utilise les requêtes préparées natives
        ];

        try {
            // Tentative de connexion
            return new PDO($dsn, $user, $pass, $options);

        } catch (PDOException $e) {

            // Log de l'erreur dans le fichier
            $logger->error('DB Connection failed: ' . $e->getMessage());

            // Code HTTP interne
            http_response_code(500);

            // Message simple pour l'utilisateur
            die('Database connection error');
        }
    }
}