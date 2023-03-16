<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/login-style.css">
    <title>Connexion</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">
</head>
<body>

    <?php

        session_start();
        session_unset();
        session_destroy();
    
        if(isset($_POST['password'])) {
            if($_POST['username'] == 'admin' && $_POST['password'] == '1234') {

                session_start();
                $_SESSION['username'] = $_POST['username'];

                header('Location: accueil.php');
            }
        }

    ?>

    <main id="login-form">

        <form action="index.php" method="POST">
            <h3>Connexion</h3>
            
            <label for="username">Identifiant</label>
            <input type="text" name="username" placeholder="Identifiant" id="username">
            
            <label for="password">Mot de passe</label>
            <input type="password" name="password" placeholder="Mot de passe" id="password">
            
            <input type="submit" value="Se connecter">
        </form>
    </main>
</body>
</html>
