<?php
    require_once('db_connect.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chantal de Man - Registreer</title>

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
                <form class="d-flex flex-direction-column" action="" method="POST">
                    <label class="lr-label">Registreer</label>
                        <?php   
                        //Email
                            if (isset($errors['email'])) { echo
                                '<div class="lr-error">
                                    <span>' . $errors['email'] . '</span>
                                    <input class="lr-input" type="email" id="email" name="email" placeholder="E-mail">
                                </div>';
                            } else { echo
                                    '<input class="lr-input" type="email" id="email" name="email" placeholder="E-mail">';
                            }
                        //Password
                            if (isset($errors['password'])) { echo
                                '<div class="lr-error">
                                    <span>' . $errors['password'] . '</span>
                                    <input class="lr-input" type="password" id="password" name="password" placeholder="Wachtwoord">
                                </div>';
                            } else { echo
                                    '<input class="lr-input" type="password" id="password" name="password" placeholder="Wachtwoord">';
                            }
                        //Password Checken
                            if (isset($errors['password_check'])) { echo
                                '<div class="lr-error">
                                    <span>' . $errors['password_check'] . '</span>
                                    <input class="lr-input" type="password" id="password_check" name="password_check" placeholder="Wachtwoord Bevestigen">
                                </div>';
                            } else { echo
                                    '<input class="lr-input" type="password" id="password_check" name="password_check" placeholder="Wachtwoord Bevestigen">';
                            }
                        ?>
                    <label class="lr-label lr-label-small">Ouder</label>
                        <?php   
                        //Firstname Parent
                            if (isset($errors['firstname_parent'])) { echo
                                '<div class="lr-error">
                                    <span>' . $errors['firstname_parent'] . '</span>
                                    <input class="lr-input" type="text" name="firstname_parent" placeholder="Voornaam">
                                </div>';
                            } else { echo
                                    '<input class="lr-input" type="text" name="firstname_parent" placeholder="Voornaam">';
                            }
                        //Lastname Parent
                            if (isset($errors['lastname_parent'])) { echo
                                '<div class="lr-error">
                                    <span>' . $errors['lastname_parent'] . '</span>
                                    <input class="lr-input" type="text" name="lastname_parent" placeholder="Achternaam">
                                </div>';
                            } else { echo
                                    '<input class="lr-input" type="text" name="lastname_parent" placeholder="Achternaam">';
                            }
                        //Phonenumber
                            if (isset($errors['phonenumber'])) { echo
                                '<div class="lr-error">
                                    <span>' . $errors['phonenumber'] . '</span>
                                    <input class="lr-input" type="text" name="phonenumber" placeholder="Telefoonnummer">
                                </div>';
                            } else { echo
                                    '<input class="lr-input" type="text" name="phonenumber" placeholder="Telefoonnummer">';
                            }
                        ?>
                    <label class="lr-label lr-label-small">Kind</label>
                        <?php   
                        //Firstname Child
                            if (isset($errors['firstname_child'])) { echo
                                '<div class="lr-error">
                                    <span>' . $errors['firstname_child'] . '</span>
                                    <input class="lr-input" type="text" name="firstname_child" placeholder="Naam Kind">
                                </div>';
                            } else { echo
                                    '<input class="lr-input" type="text" name="firstname_child" placeholder="Naam Kind">';
                            }
                        ?>
                        <div class="d-flex lr-age">
                            <input class="lr-input w-100" type="number" name="age_day_child" placeholder="Dag">
                                <select class="lr-select w-100" id="age_month_child" name="age_month_child">
                                    <option class="d-none">Maand</option>
                                    <option value="Januari">Januari</option>
                                    <option value="Februari">Februari</option>
                                    <option value="Maart">March</option>
                                    <option value="April">April</option>
                                    <option value="Mei">Mei</option>
                                    <option value="Juni">Juni</option>
                                    <option value="Juli">Juli</option>
                                    <option value="Augustus">Augustus</option>
                                    <option value="September">September</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            <input class="lr-input w-100" type="number" name="age_year_child" placeholder="Dag">
                        </div>
                    <button class="lr-button" type="submit" name="register">Registreren</button>
                </form>
                <div class="d-flex flex-direction-column ptb-3 lr-box-bottom">
                    <p class="d-flex justify-content-center">Al een account?<a class="pl-halve" href="login.php">Aanmelden</a></p>
                </div>
            </div>
        </div>

        <sript href="js/main.js"></script>
    </body>
</html>