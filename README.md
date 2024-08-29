# firstSymfony

## Installation :

  symfony new firstSymfony

Nous voici avec un Symfony vierge.

## Lancement de Symfony

On change de répertoire

```bash
cd firstSymfony
# Pour lancer le serveur
symfony serve
# ou
symfony server:start
# Pour lancer le serveur en mode deamon (arrière plan)
symfony serve -d
# ou
php -S localhost:8000 -t public
```

https://127.0.0.1:8000

### Installation de maker

    composer require --dev symfony/maker-bundle

Documentation :

https://symfony.com/bundles/SymfonyMakerBundle/current/index.html

    php bin/console make:
    # ou
    symfony console make:

### Création du premier contrôleur

    php bin/console make:controller

    Choose a name for your controller class (e.g. BraveKangarooController):
    > FirstController

    created: src/Controller/FirstController.php

```php
###
class FirstController extends AbstractController
{
    #[Route('/first', name: 'app_first')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/FirstController.php',
        ]);
    }
}
```

Pour les routes : 

    php bin/console debug:router

On trouve la route vers le json créé dans l'attribut `#[Route('/first', name: 'app_first')]` :
    
    https://127.0.0.1:8000/first

On peut modifier la route et son nom en changeant, pour le mettre à la racine, l'attribut en `#[Route('/', name: 'homepage')]`

    php bin/console debug:router

### Un peu plus sur les routes

Documentation :

https://symfony.com/doc/current/routing.html

Méthode par défaut de routing :

    config/routes.yaml

Qui contient les attributs pour gérer les routes :

    controllers:
    resource:
        path: ../src/Controller/
        namespace: App\Controller
    type: attribute

### Utilisation de `yaml` pour les routes

Faisable, mais à éviter au profit des `attributes`

```yaml
#controllers:
#   resource:
#       path: ../src/Controller/
#       namespace: App\Controller
#   type: attribute

homepage:
    path: /
    # the controller value has the format 'controller_class::method_name'
    controller: App\Controller\FirstController::index
```

Les routes peuvent être définies dans ce fichier (principe `Laravel`)

Bonne pratique : si cette option est choisie, on évite de l'utiliser avec un autre type de routage

#### Exemple

Ici, c'est bien `config/routes.yaml` qui va gérer les routes


Création des méthodes qui seront appelées depuis `config/routes.yaml`
```php
<?php
# src/Controller/FirstController.php
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
```
 et `config/routes.yaml` :

```yaml
#controllers:
#   resource:
#       path: ../src/Controller/
#       namespace: App\Controller
#   type: attribute

homepage:
    path: /
    # the controller value has the format 'controller_class::method_name'
    controller: App\Controller\FirstController::index

myJson:
    path: /json
    controller: App\Controller\FirstController::myJson

papa2:
    path: /page2
    controller: App\Controller\FirstController::page2
```
