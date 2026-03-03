<?php
declare(strict_types=1);

namespace App\Core;

/**
 * Classe responsable des réponses HTTP
 * Centralise JSON et redirections
 */
class Response
{
    /**
     * Envoie une réponse JSON
     */
    public function json($payload, int $statusCode = 200): void
    {
        $this->setStatus($statusCode);
        $this->setHeader('Content-Type', 'application/json; charset=utf-8');

        echo json_encode(
            $payload,
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
        );

        exit;
    }

    /**
     * Redirection HTTP
     */
    public function redirect(string $location, int $statusCode = 302): void
    {
        $this->setStatus($statusCode);
        $this->setHeader('Location', $location);
        exit;
    }

    /**
     * Méthode interne pour définir le status
     */
    private function setStatus(int $code): void
    {
        http_response_code($code);
    }

    /**
     * Méthode interne pour définir un header
     */
    private function setHeader(string $name, string $value): void
    {
        header($name . ': ' . $value);
    }
}