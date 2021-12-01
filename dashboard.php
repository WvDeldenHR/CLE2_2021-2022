<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chantal de Man - Dashboard</title>
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
        <!--  Navbar -->
        <nav class="d-flex pt-2">
            <div class="align-items-center d-flex navbar-img">
                <a href="index.php"><img src="images/cdm_logo.png"></a>
            </div>

            <div class="align-items-center d-flex navbar-links navbar-left">
                <a class="navbar-link1-color" href="inplannen.php">Inlpannen</a>
                <a class="navbar-link2-color" href="over-mij.php">Over Mij</a>
                <a class="navbar-link3-color" href="locatie.php">Locatie</a>
            </div>
                    
            <div class="align-items-center d-flex pr-5 navbar-links navbar-right">
                <!-- <a class="navbar-link4-color navbar-button1" href="login.php">Aanmelden</a>
                <a class="navbar-link4-color navbar-button2" href="register.php">Registreer</a> -->

                <span class="navbar-user-name">Name User</span>
                <span class="d-flex navbar-user-img-box dropbtn " onclick="myFunction()"></span>
                        
                <div class="dropdown">
                    <div id="myDropdown" class="dropdown-content">
                        <a href="dashboard.php"><img src="images/icons/user.png">Profile</a>
                        <a href="account.php"><img src="images/icons/settings.png">Account Settings</a>
                        <a href="inplannen.php"><img src="images/icons/planning.png">Inplannen</a>
                        <a class="dropdown-line" href="logout.php"><img src="images/icons/logout.png">Uitloggen</a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="align-items-center d-flex h-100 justify-content-center">
            <div class="d-flex dashboard-box">
                <div class="d-flex flex-direction-column dashboard-link-list">
                    <a class="dashboard-link-selected" href="dashboard.php"><img src="images/icons/user.png">Profile</a>
                    <a href="account.php"><img src="images/icons/settings.png">Account Settings</a>
                    <a href="inplannen.php"><img src="images/icons/planning.png">Inplannen</a>
                </div>

                <div class="dashboard-content">
                    <p>Test</p>
                </div>
            </div>
        </div>
    </body>
</html>