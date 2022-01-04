<?php 
    require_once('db_connect.php');

    // If user is logged in redirect to index
    if (isset($_SESSION['email'])) {
        header('location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chantal de Man - Aanmelden</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="images/icons/cdm_icon.png">
        <!--    Main CSS    -->
            <link rel="stylesheet" href="css/style.css">
        <!--   Bootstrap Like CSS -->
            <link rel="stylesheet" href="css/style-bs.css">
    </head>

    <body>
        <div class="align-items-center d-flex h-100 justify-content-center">
            <div class="d-flex flex-direction-column lr-box">
                <div class="d-flex justify-content-center ptb-2">
                    <a href="index.php"><img src="images/cdm_logo.png"></a>
                </div>
                <form class="d-flex flex-direction-column" action="login.php" method="POST">
                    <label class="lr-label">Aanmelden</label>
                        <span class="lr-error-span"><?= $errors['errorlogin'] ?? '' ?></span>
                        <input class="lr-input" id="email" type="email" name="email" placeholder="E-mail" value="<?= $email ?? '' ?>" 
                                    <?php if (isset($errors['email'])) { echo 'style="border: 1px solid #ed2f21; border-radius: 4px;"'; }?>>
                        <input class="lr-input" id="password" type="password" name="password" placeholder="Wachtwoord" 
                                    <?php if (isset($errors['password'])) { echo 'style="border: 1px solid #ed2f21; border-radius: 4px;"'; }?>>
                    <button class="lr-button" name="login" type="submit">Aanmelden</button>
                </form>
                <div class="d-flex flex-direction-column ptb-3 lr-box-bottom">
                    <a class="d-flex justify-content-center pb-1" href="">Wachtwoord Vergeten?</a>
                    <p class="d-flex justify-content-center">Nog geen account?<a class="pl-halve" href="register.php">Registreer</a></p>
                </div>
            </div>
        </div>

        <sript href="js/main.js"></script>
    </body>
</html>