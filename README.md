# Renommage et Compression de Dossiers

Ce projet vise à simplifier le processus de renommage et de compression de dossiers métiers pour le personnel médical. Les dossiers contiennent des informations de patients stockées dans des fichiers XML.

## Instructions d'Installation

1. Assurez-vous que vous disposez d'un environnement PHP fonctionnel sur votre poste de travail.

2. Téléchargez ou clonez ce projet dans le répertoire de votre choix.

3. Placez les dossiers métiers (correspondant à des patients) dans le dossier `Dossier source`.

4. **IMPORTANT :** Ouvrez le fichier `index.php` et modifiez la variable `$sourceFolder` pour qu'elle corresponde au chemin d'accès complet de votre dossier source.

    ` $sourceFolder = 'C:\..\..';  // Chemin du dossier source `

5. Assurez-vous que chaque dossier métier contient un fichier `STUDYCFG.XML` avec les balises `<Surname>` et `<GivenName>` contenant le nom et le prénom du patient.

## Utilisation

1. Lancez l'application en ouvrant le fichier `index.php`.

2. Cliquez sur le bouton "Parcourir" pour sélectionner le dossier source contenant les dossiers métiers à renommer et compresser.

3. Le chemin du dossier source sélectionné sera affiché sur la page.

4. Cliquez sur le bouton "RENOMMER ET COMPRESSER" pour lancer le processus.

5. L'application parcourra le dossier source, extraira les informations des fichiers `STUDYCFG.XML` et effectuera les opérations de renommage et de compression.

6. Les dossiers métiers renommés seront compressés au format ZIP et stockés dans le même emplacement que le dossier source.

7. Le dossier source initial ne sera pas supprimé.

## Remarques

- Assurez-vous que les fichiers `STUDYCFG.XML` sont correctement configurés et contiennent les balises `<Surname>` et `<GivenName>`.

- Veillez à ce que les autorisations de fichiers soient correctement configurées pour permettre le renommage et la création de dossiers.

- Le projet est développé en PHP sans l'utilisation d'un framework spécifique.
