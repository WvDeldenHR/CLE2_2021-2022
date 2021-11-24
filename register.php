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
                <form class="d-flex flex-direction-column" method="POST">
                    <label class="lr-label">Registreer</label>
                        <input class="lr-input" type="email" id="email" name="email" placeholder="Email" required>
                        <input class="lr-input" type="password" id="password" name="password" placeholder="Wachtwoord" required>
                        <input class="lr-input" type="password" id="password" name="password" placeholder="Wachtwoord Bevestigen" required>
                    <label class="lr-label lr-label-small">Ouder</label>
                        <input class="lr-input" type="text" id="firstname_parent" name="firstname_parent" placeholder="Naam Ouder" required>
                        <input class="lr-input" type="text" id="lastname_parent" name="lastname_parent" placeholder="Achternaam Ouder" required>
                        <input class="lr-input" type="number" min="10" max="10" id="phonenumber" name="phonenumber" placeholder="Telefoonnummer" required>
                    <label class="lr-label lr-label-small">Kind</label>
                        <input class="lr-input" type="text" id="firstname_child" name="firstname_child" placeholder="Naam Kind">
                        <div class="d-flex lr-age">
                            <input class="lr-input flex-25" type="number" min="1" max="2" id="age_day_child" name="age_day_child" placeholder="Dag" required>
                            <select class="lr-select" type="" id="age_month_child" name="age_month_year" required>
                                <option class="d-none" disabled selected value>Maand</option>
                                <option value="Januar">Januari</option>
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
                            <input class="lr-input flex-25" type="number" min="4" max="4" id="age_year_child" name="age_year_child" placeholder="Jaar" required>
                        </div>
                    <button class="lr-button" type="submit">Registeren</button>
                </form>
                <div class="d-flex flex-direction-column ptb-3 lr-box-bottom">
                    <p class="d-flex justify-content-center">Al een Account?<a class="pl-halve" href="login.php">Aanmelden</a></p>
                </div>
            </div>
        </div>
        
        <sript href="js/main.js"></script>
    </body>
</html>