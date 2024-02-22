# Parrot
ECF-Garage-Parrot

Accès admin:
    - mail factice : correcteur_studi@gmail.com
    - mdp : correcteur55$


Instructions d'installation pour une utilisation en local


--- MySQL ---

1. Site MySQL
    https://www.mysql.com

2. Pied de page - Download
    https://dev.mysql.com/downloads/mysql/

3. Choix de version
    Selon système d’exploitation (Mac, linux, windows)

4. Download
    Cliquer sur ”Download” correspondant à la version

5. Installation
    Lancer l’installateur et valider

6. Vérifier l’installation
    Dans le terminal/l'invite de commande
        mysql --v

7. Importer la base de données
    Dans le terminal/l’invite de commande :
        mysql -u root -p
        /mot de passe défini à l’installation/
        CREATE DATABASE Parrot;
        USE Parrot;
        SOURCE /parrot-garage/base_de_données.sql;
        INSERT INTO USERS (user_id, mail, password, first_name, last_name, address, birthdate, role) VALUES ('1', 'v.parrot@gmail.com', 'votre_mot_de_passe', 'Vincent', 'PARROT', 'votre_adresse_personnelle', 'votre_anniversaire', 'admin')
        exit;




--- XAMPP ---

1. Site apachfriends
    https://www.apachefriends.org

2. Choix
    Selon système d’exploitation (Mac, linux, windows)

3. Download
    Téléchargement automatique

4. Installation
    Lancer l’installateur et valider

5. Démarrage
    Lancer xampp pour accéder au panneau de contrôle
    Démarrer' Apache server' et 'MySQL Database' en les sélectionnant puis cliquer sur “Start”

6. Accéder aux fichiers
    Unzip l’archive fournit ‘v-parrot.zip’ dans le dossier ‘htdocs’
    Lancer UNE seule fois le fichier 'update_pwd.php'

7. Accéder au site
    Entrer 'http://localhost/index.php' dans la barre de recherche de votre navigateur

8. Utiliser votre site
    Vous utiliserez votre adresse mail et le mot de passe que vous avez choisi après avoir installé MySQL
    À vous de jouer !
