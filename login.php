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
        <!--    Main CSS    -->
            <link rel="stylesheet" href="css/style.css">
        <!--   Bootstrap Like CSS -->
            <link rel="stylesheet" href="css/style-bs.css">
    </head>

    <body>
        <div class="align-items-center d-flex h-100 justify-content-center">
            <div class="d-flex flex-direction-column lr-box">
                <div class="d-flex justify-content-center lr-img">
                    <img src="images/cdm_logo.png">
                </div>
                <form class="d-flex flex-direction-column ltf2" mehtod="POST">
                    <label class="lr-label">Aanmelden</label>
                        <input class="lr-input" type="text" id="email" name="email" placeholder="Email">
                        <input class="lr-input" type="password" id="password" name="password" placeholder="Wachtwoord">
                    <button class="lr-button" type="submit">Aanmelden</button>
                </form>
                <div class="d-flex flex-direction-column pt-3 lr-box-bottom">
                    <a class="d-flex justify-content-center pb-1" href="">Wachtwoord Vergeten?</a>
                    <p class="d-flex justify-content-center">Nog geen account?<a class="pl-halve" href="register.php">Registreer</a></p>
                <div>
            </div>
        </div>
    </body>
</html>