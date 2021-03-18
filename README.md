Avant toutes choses vous devez finir de tout lire avant d''entreprendre quoi que ce soit.

Blade Register user (data de base +nom, age,email,choix d'un avatar parmis une liste d'avatar)
Dans la blade home ajouter 4 onglets dans un menu vertical
- Crud avatars (ce sont des images on doit pouvoir choisir un nom pour chaque image) 
- Crud utilisateurs ou on peut changer leurs données
- Crud Categories D'images
- Crud images ( c'est une page qui permet de créer des galeries d'images, ça veux dire qu'on doit pouvoir choisir dans quelle galerie on ajoute l'image)

Dans la blade Welcome, afficher du contenu.

Fonctionnement : 
Quand on créer un user on doit lui attribuer un avatar parmis une liste d'avatars
C'est nous qui alimentons la liste d'avatars 
On a également une page pour pouvoir ajouter des images, chaque image doit appartenir à une categorie exemple : Voitures, Art, Food, 
On doit pouvoir créer de nouvelles catégorie d'image
Vérifier les champs avec des validations
Les images dans la galeries doivent être téléchargeables
A Savoir :
On ne peut ajouter que 5 Avatars maximum
Si on supprimes un avatars cela attribue un avatar par defaut genre "anonyme" a tous les users raccrochés a l'avatar que l'on vient de supprimer
Si on supprimes un user cela ne supprime pas l'avatar raccroché
Si on supprimes une catégorie d'image cela supprime toutes les images raccrochés a cette catégorie
Le design doit être soigné
Il faut un repository github

Bonus : 
On à le choix entre ajouter une image/avatar par url ou par input file
Faire une pagination quand on a plus que 5 utilisateurs# laravel_auth_projet
