<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>

    <form method="POST" action="traite.php">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" placeholder="Entrez votre nom">
        <br>
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prénom">
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Entrez votre email">
        <br>
        <label for="pass">Mot de passe:</label>
        <input type="password" id="pass" name="pass" placeholder="Entrez votre mot de passe">
        <br>
        <input type="submit" value="M'inscrire" name="ok">
    </form>
    
  
    
</body>
</html>