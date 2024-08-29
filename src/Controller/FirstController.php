<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
# use Symfony\Component\Routing\Attribute\Route;

class FirstController extends AbstractController
{

    public function index(): Response
    {
        return new Response('<html><body><h1>Accueil</h1>
<a href="./page2">Page 2</a> | <a href="./json">notre json</a></body></html>');

    }

    public function page2(): Response
    {
        return new Response('<html><body><h1>Page2</h1>
<a href="./">Accueil</a> | <a href="./json">notre json</a></body></html>');

    }

    public function myJson(): JsonResponse
    {
        return $this->json(
            [
                'prems' => 'coucou',
                'path' => 'src/Controller/FirstController.php',
            ]

        );
    }
}
