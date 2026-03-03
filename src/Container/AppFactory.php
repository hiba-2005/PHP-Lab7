<?php
declare(strict_types=1);

namespace App\Container;

use App\Core\Request;
use App\Core\Response;
use App\Core\Router;
use App\Core\View;

use App\Controller\EtudiantController;

use App\Dao\DBConnection;
use App\Dao\Logger;
use App\Dao\EtudiantDao;
use App\Dao\FiliereDao;

class AppFactory
{
    public function create(): array
    {
        // Paramètres DB (adapter selon ta machine)
        $db = [
            'host' => '127.0.0.1',
            'name' => 'gestion_etudiants_pdo',
            'user' => 'root',
            'pass' => '',
            'charset' => 'utf8mb4',
        ];

        // Journalisation
        $logger = new Logger(__DIR__ . '/../../logs/app.log');

        // Connexion PDO
        $pdo = DBConnection::create(
            $db['host'],
            $db['name'],
            $db['user'],
            $db['pass'],
            $db['charset'],
            $logger
        );

        // DAO (accès données)
        $etudiantDao = new EtudiantDao($pdo, $logger);
        $filiereDao  = new FiliereDao($pdo, $logger);

        // Services MVC
        $view     = new View(__DIR__ . '/../../views');
        $response = new Response();
        $request  = new Request();
        $router   = new Router();

        // Contrôleur principal
        $controller = new EtudiantController($view, $response, $etudiantDao, $filiereDao);

        // Route racine : redirection vers la liste
        $router->get('/', function ($req, $params) use ($response) {
            $response->redirect('/etudiants');
        });

        // Routes CRUD
        $router->get('/etudiants', [$controller, 'index']);
        $router->get('/etudiants/create', [$controller, 'create']);
        $router->post('/etudiants/store', [$controller, 'store']);

        $router->get('/etudiants/{id}', [$controller, 'show']);
        $router->get('/etudiants/{id}/edit', [$controller, 'edit']);
        $router->post('/etudiants/{id}/update', [$controller, 'update']);
        $router->post('/etudiants/{id}/delete', [$controller, 'delete']);

        // Optionnel : API JSON
        $router->get('/api/etudiants', [$controller, 'apiList']);

        return [$router, $request];
    }
}