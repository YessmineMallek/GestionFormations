# GestionFormations
Ce projet vise le développement d’un site Web permettant la gestion de formations. 
Le site va être composé des pages suivantes :
	-)index.html:permet à un utilisateur ou un administrateur de se connecter au site en
         fournissant un login et mot de passe.
	-)register.php:pour l'inscription
	-)Acceuil Admin : permet à l’administrateur de consulter les formations sous forme de tableau
	affichant les colonnes suivantes
		- L’intitulé de la formation
		- Nombre de place total
		- Le nombre de réservations confirmées
		- Le nombre de réservation en attentes sous forme de lien hypertexte permettant d’afficher la
			page ReservationEnAttente
		- Supprimer : un lien hypertexte permettant de supprimer la formation et de réafficher la page
			administration mise à jour.
		+Cette page offre aussi la section « ajouter nouvelle formation » offrant un formulaire permettant de
		saisir les informations de la formation (intitulé, formateur, description, date, prix, nombre de places)
	-)acceuilU.php: c’est la page qui sera affichée après authentification d’un utilisateur. Cette page affichera la
		liste des formations sous forme d’un tableau contenant les colonnes suivantes :
			- intitulé de la formation : lien hypertexte permettant l’affichage de la page DescriptionFormation
			- Nom du formateur
			- Date
			- Prix
			- Nombre de places disponibles 
			- Score  = (nbScore *score + newScore)/(nbScore + 1) (sous forme de 5 étoiles)
			- Etat de la réservation

*les outils utilisés
	-vscode
	-xampp
Le site va utiliser la base de données suivante :
Utilisateur (login, password, nom, cin, date_naiss, email, role) // role (0 : utilisateur, 1 : admin)
Formation (id, intitulé, formateur, description, date, nbPlace, nbReservation, prix, score, nbScore)
Reservation (id, etat, #login, #id_formation) // etat (0 : en attente, 1 : confirmé)
		