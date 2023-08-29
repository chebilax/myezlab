<!DOCTYPE html>
<html>
<head>
    <title>Sélectionner le dossier source</title>
</head>
<body>
    <form action="process.php" method="post">
        <label for="source_folder">Sélectionner le dossier source :</label>
        <input type="file" name="source_folder" id="source_folder" webkitdirectory directory required>
        <button type="submit">RENOMMER ET COMPRESSER</button>
    </form>
</body>
</html>
