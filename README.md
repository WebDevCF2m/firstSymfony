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


