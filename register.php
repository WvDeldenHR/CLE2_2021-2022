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
        <title>Chantal de Man - Registreer</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="images/icons/cdm_icon.png">
        <link rel="stylesheet" href="css/style.css">    <!--    Main CSS    -->
        <link rel="stylesheet" href="css/style-bs.css"> <!--   Bootstrap Like CSS -->
    </head>

    <body>
        <div class="align-items-center d-flex h-100 justify-content-center">
            <div class="d-flex flex-direction-column lr-box">
                <div class="d-flex justify-content-center ptb-2">
                    <a href="index.php"><img src="images/cdm_logo.png"></a>
                </div>
                <form class="d-flex flex-direction-column" action="" method="POST">
                    <label class="lr-label">Registreer</label>
                        <span class="lr-error-span"><?= htmlentities($errors['email'] ?? '' ) ?></span>
                        <input class="lr-input" id="email" type="email" name="email" placeholder="E-mail" value="<?= $email ?? '' ?>" 
                                    <?php if (isset($errors['email'])) { echo 'style="border: 1px solid #ed2f21; border-radius: 4px;"'; }?>>
                                    
                        <span class="lr-error-span"><?= htmlentities($errors['password'] ?? '' ) ?></span>
                        <span class="lr-error-span"><?= htmlentities($errors['password_check'] ?? '' ) ?></span>
                        <input class="lr-input" id="password" type="password" name="password" placeholder="Wachtwoord" 
                                    <?php if (isset($errors['password'])) { echo 'style="border: 1px solid #ed2f21; border-radius: 4px;"'; }
                                          else if (isset($errors['password_check'])) { echo 'style="border: 1px solid #ed2f21; border-radius: 4px;"'; }?>>
                        <input class="lr-input" id="password_check" type="password" name="password_check" placeholder="Wachtwoord Bevestigen" 
                                    <?php if (isset($errors['password_check'])) { echo 'style="border: 1px solid #ed2f21; border-radius: 4px;"'; }?>>

                    <label class="lr-label lr-label-small">Ouder</label>
                        <span class="lr-error-span"><?= htmlentities($errors['firstname_parent'] ?? '' ) ?></span>
                        <input class="lr-input" id="firstname_parent" type="text" name="firstname_parent" placeholder="Voornaam" value="<?= $firstname_parent ?? '' ?>" 
                                    <?php if (isset($errors['firstname_parent'])) { echo 'style="border: 1px solid #ed2f21; border-radius: 4px;"'; }?>>
                        <span class="lr-error-span"><?= htmlentities($errors['lastname_parent'] ?? '' ) ?></span>
                        <input class="lr-input" id="lastname_parent" type="text" name="lastname_parent" placeholder="Achternaam" value="<?= $lastname_parent ?? '' ?>" 
                                    <?php if (isset($errors['lastname_parent'])) { echo 'style="border: 1px solid #ed2f21; border-radius: 4px;"'; }?>>
                        <span class="lr-error-span"><?= htmlentities($errors['phonenumber'] ?? '' ) ?></span>
                        <input class="lr-input" id="phonenumber" type="tel" name="phonenumber" placeholder="Telefoonnummer" value="<?= $phonenumber ?? '' ?>" 
                                    <?php if (isset($errors['phonenumber'])) { echo 'style="border: 1px solid #ed2f21; border-radius: 4px;"'; }?>>
                                                                
                    <label class="lr-label lr-label-small">Kind</label>
                        <span class="lr-error-span"><?= htmlentities($errors['firstname_child'] ?? '' ) ?></span>
                        <input class="lr-input" id="firstname_child" type="text" name="firstname_child" placeholder="Naam Kind" value="<?= $firstname_child ?? '' ?>" 
                                    <?php if (isset($errors['firstname_child'])) { echo 'style="border: 1px solid #ed2f21; border-radius: 4px;"'; }?>>
                        
                        <span class="lr-error-span"><?= htmlentities($errors['age'] ?? '' ) ?></span>
                        <div class="d-flex lr-age">    
                            <input class="lr-input w-100" id="age_day_child" type="number" name="age_day_child" placeholder="Dag" value="<?= $age_day_child ?? '' ?>" 
                                    <?php if (isset($errors['age_day_child'])) { echo 'style="border: 1px solid #ed2f21; border-radius: 4px;"'; }?>>
                                <select class="lr-select w-100" id="age_month_child" name="age_month_child"
                                            <?php if (isset($errors['age_month_child'])) { echo 'style="border: 1px solid #ed2f21; border-radius: 4px;"'; }?>>
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
                            <input class="lr-input w-100" id="age_year_child" type="number" name="age_year_child" placeholder="Jaar" value="<?= $age_year_child ?? '' ?>" 
                                        <?php if (isset($errors['age_year_child'])) { echo 'style="border: 1px solid #ed2f21; border-radius: 4px;"'; }?>>          
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