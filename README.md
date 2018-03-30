# RollAndPlay

# Comment installer le projet sur un PC

### Téléchargement et injection des dépendances
* Clonez le dépôt ou téléchargez le projet
* Dans le dossier du projet, ouvrez un nouvel invité de commande
* Ecrivez "composer install" dans l'invite de commande puis validez (composer doit être installé)
* Toujours dans l'invité de commande, écrivez "composer require server --dev" puis validez

### Création de la base de données
* Toujours dans un invité de commande pointant sur le dossier de projet, écrire et valider "php bin/console doctrine:database:create"
* Ecrire en valider ensuite "php bin/console doctrine:schema:validate" un message vert et un message rouge devrait d'afficher, tout est normal
* Ecrire et valider ensuite "php bin/console doctrine:migrations:diff"
* Pour finir, écrire et valider "php bin/console doctrine:migrations:migrate" puis appuyer sur "y"

### Lancement du serveur
* Les dépendances et la base de données sont créés, il ne vous reste plus qu'à lancer le serveur dans l'invite de commande en écrivant et en validant "php bin/console server:run"
* Une fois ceci fait, rendez-vous sur "localhost:8000" dans votre navigateur.
