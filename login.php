<?php 
    include('db_connect.php');
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
                        <?php
                        if (isset($errors['errorlogin'])) { echo
                            '<div class="lr-error">
                                <span>' . $errors['errorlogin'] . '</span>
                            </div>';
                        }
                        //Email
                            if (isset($errors['email'])) { echo
                                '<div class="lr-error">
                                    <input class="lr-input" type="email" id="email" name="email" placeholder="E-mail">
                                </div>';
                            } else { echo
                                    '<input class="lr-input" type="email" id="email" name="email" placeholder="E-mail">';
                            }
                        //Password
                            if (isset($errors['password'])) { echo
                                '<div class="lr-error">
                                    <input class="lr-input" type="password" id="password" name="password" placeholder="Wachtwoord">
                                </div>';
                            } else { echo
                                    '<input class="lr-input" type="password" id="password" name="password" placeholder="Wachtwoord">';
                            }
                        ?>
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