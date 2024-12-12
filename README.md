# POC-TO-DO-LIST-SYMFONY
Bonjour, voici le projet d'une to do list fait sur Symfony avec une interface.

Les fonctionalités : 
    
    - afficher le nom du user dans les salutations

    - créer une tâche,
    - afficher toutes les tâches
    - supprimer une tâche

Les commentaires : "Aïda" = ..commentaire.. ont été écrits par moi.
Tout le reste a été écrit par Symfony.

## Les paths des modifications faites par moi
Voici les chemins de fichiers que j'ai modfié et ajouté pour facilité.

Configurations :
    J'ai modifié les configurations liées à ma database dans le fichier .env

MVC :
    Les vues dans ce dossier : templates\products
    Les controllers sont dans le dossier : src\Controller
    Les données utilisées sont dans le dossier : src\Entity

## Quelques difficultés :
Le projet a été plus compliqué que je le pensais.
Malheureusement je n'ai pas pu faire la partie "update" des opérations CRUD. J'ai tenté de faire en sorte que le user puisse modifier dans la page même en modifiant la type du conteneur HTML.
Je n'ai pas non plus fait l'API en ligne.

## Question : Comment organiseriez-vous la gestion des permissions utilisateurs dans une application de gestion ?

Je n'ai pas crée une base de données sur les users mais si ça avait été le cas et dépendant du user il existe des priligèges. 
J'aurais utilisé l'id du user, qui est unique et constant. 

Par exemple si mon projet est utilisé pour de la gestion de projet. le user 1, 2, 6 auront le droit de créer une tâche. Dans le back-end j'aurais mis une condition if pour vérifier si l'id du user correspond à un élément d'une ArrayList nommé "idAdmin". Si ça retourne true la page home aura un bouton "modify" et si ça retourne "false" une page sans bouton "modify" sera envoyée.



