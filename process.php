<?php

$sourceFolder = 'C:\..\..';  // Chemin du dossier source 

function renameAndCompress($sourceFolder) {
    $folders = scandir($sourceFolder); 
    // Liste tous les éléments dans le dossier source

    foreach ($folders as $folder) {
        if ($folder != '.' && $folder != '..') {
            // Exclut les références aux dossiers parent (. et ..)

            $patientInfoFile = $sourceFolder . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . 'STUDYCFG.XML';
            // Construit le path vers le fichier STUDYCFG.XML dans chaque dossier

            if (file_exists($patientInfoFile)) {
                // Vérifie si le fichier STUDYCFG.XML existe dans ce dossier
                $patientInfo = simplexml_load_file($patientInfoFile);
                // Charge les données du fichier XML dans un objet
                $surname = (string) $patientInfo->Surname;
                $givenName = (string) $patientInfo->GivenName;
                // Récupère les valeurs des balises <Surname> et <GivenName>

                $newFolderName = "$surname $givenName";
                // Construit le nouveau nom du dossier
                $newFolderPath = $sourceFolder . DIRECTORY_SEPARATOR . $newFolderName;
                // Construit le path du nouveau dossier

                if (!is_dir($newFolderPath)) {
                    // Vérifie si le nouveau dossier n'existe pas déjà
                    rename($sourceFolder . DIRECTORY_SEPARATOR . $folder, $newFolderPath);
                    // Renomme le dossier en utilisant le nouveau nom

                    $zip = new ZipArchive();
                    $zipFileName = $newFolderPath . '.zip';
                    // Construit le nom du fichier ZIP
                    if ($zip->open($zipFileName, ZipArchive::CREATE) === true) {
                        // Ouvre le fichier ZIP en mode création
                        $files = scandir($newFolderPath);
                        
                        foreach ($files as $file) {
                            if ($file != '.' && $file != '..') {
                                $zip->addFile($newFolderPath . DIRECTORY_SEPARATOR . $file, $file);
                                // Ajoute chaque fichier au ZIP
                            }
                        }
                        $zip->close();
                        // Ferme le ZIP
                    }

                    echo "Dossier $folder renommé en $newFolderName et compressé.\n";
                    // Affiche un message pour indiquer l'opération réussie
                }
            }
        }
    }
}

// Appel de la fonction
renameAndCompress($sourceFolder);

?>
