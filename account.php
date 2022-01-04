<?php 
    include('layouts/layout_header.php');

    // Check if user is logged in
    if (!isset($_SESSION['email'])) {
        header('location: no-account.php');
    }
?>
<!--    Header Layout   -->

<div class="align-items-center d-flex h-100 justify-content-center mb-50 pt-50">
    <div class="d-flex dashboard-box">
        <?php include('layouts/layout_dashboard.php'); ?>   <!--    Dashboard Menu  -->

        <div class="dashboard-content">
            <h1>Account Instellingen</h1>
            <div class="dashboard-account">
                <label for="email">E-mail</label>
                    <div class="dashboard-account-content">
                        <div class="align-items-center d-flex w-100" id="dashboardEditEmail">
                            <p><?= $user['email'] ?></p>
                            <button class="edit-acc-btn">Wijzig</button>
                        </div>
                        <form class="align-items-center w-100 edit-area dashboard-account-content-hide" action="" method="POST">
                            <input class="dashboard-input" id="email" type="email" name="email" placeholder="E-mail" value="<?= $user['email'] ?>">
                            <button class="edit-acc-btn" name="edit_email">Wijzig</button>
                        </form>
                    </div>
                <label for="password">Wachtwoord</label>
                    <div class="dashboard-account-content">
                        <div class="align-items-center d-flex w-100" id="dashboardEditPassword">
                            <p>********</p>
                            <button class="edit-acc-btn2">Wijzig</button>
                        </div>
                        <form class="align-items-end w-100 edit-area2 dashboard-account-content-hide" action="" method="POST"><?php if(isset($message)) { echo $message; } ?>
                            <div class="d-flex flex-direction-column flex-90">
                                <input class="dashboard-input mb-2" id="password_current" type="password" name="password_current" placeholder="Huidig Wachtwoord">
                                <input class="dashboard-input mb-1" id="password_new" type="password" name="password_new" placeholder="Wachtwoord">
                                <input class="dashboard-input" id="password_check" type="password" name="password_check" placeholder="Wachtwoord Bevestigen">
                            </div>
                            <button class="edit-acc-btn2" name="edit_password">Wijzig</button>
                        </form>
                    </div>
                <label for="phonenumber">Telefoonnummer</label>
                    <div class="dashboard-account-content">
                        <div class="align-items-center d-flex w-100" id="dashboardEditPhonenumber">
                            <p><?= $user['phonenumber'] ?></p>
                            <button class="edit-acc-btn3">Wijzig</button>
                        </div>
                        <form class="align-items-center w-100 edit-area3 dashboard-account-content-hide" action="" method="POST">
                            <input class="dashboard-input" id="phonenumber" type="tel" name="phonenumber" placeholder="Telefoonnummer" value="<?= $user['phonenumber'] ?>">
                            <button class="edit-acc-btn3" name="edit_phonenumber">Wijzig</button>
                        </form>
                    </div>

                <h2>Ouder</h2>
                <label for="firstname_parent">Voornaam</label>
                    <div class="dashboard-account-content">
                        <div class="align-items-center d-flex w-100" id="dashboardEditFirstname_parent">
                            <p><?= $user['firstname_parent'] ?></p>
                            <button class="edit-acc-btn4">Wijzig</button>
                        </div>
                        <form class="align-items-center w-100 edit-area4 dashboard-account-content-hide" action="" method="POST">
                            <input class="dashboard-input" id="firstname_parent" type="text" name="firstname_parent" placeholder="Voornaam" value="<?= $user['firstname_parent'] ?>">
                            <button class="edit-acc-btn4" name="edit_firstname_parent">Wijzig</button>
                        </form>
                    </div>
                <label for="lastname_parent">Achternaam</label>
                    <div class="dashboard-account-content">
                        <div class="align-items-center d-flex w-100" id="dashboardEditLastname_parent">
                            <p><?= $user['lastname_parent'] ?></p>
                            <button class="edit-acc-btn5">Wijzig</button>
                        </div>
                        <form class="align-items-center w-100 edit-area5 dashboard-account-content-hide" action="" method="POST">
                            <input class="dashboard-input" id="lastname_parent" type="text" name="lastname_parent" placeholder="Achternaam" value="<?= $user['lastname_parent'] ?>">
                            <button class="edit-acc-btn5" name="edit_lastname_parent">Wijzig</button>
                        </form>
                    </div>

                <h2>Kind</h2>
                <label for="firstname_parent">Voornaam</label>
                    <div class="dashboard-account-content">
                        <div class="align-items-center d-flex w-100" id="dashboardEditFirstname_child">
                            <p><?= $user['firstname_child'] ?></p>
                            <button class="edit-acc-btn6">Wijzig</button>
                        </div>
                        <form class="align-items-center w-100 edit-area6 dashboard-account-content-hide" action="" method="POST">
                            <input class="dashboard-input" id="firstname_child" type="text" name="firstname_child" placeholder="Voornaam" value="<?= $user['firstname_child'] ?>">
                            <button class="edit-acc-btn6" name="edit_firstname_child">Wijzig</button>
                        </form>
                    </div>
                <label>Leeftijd</label>
                    <div class="dashboard-account-content">
                        <div class="align-items-center d-flex w-100" id="dashboardEditAge">
                            <p><?= $user['age_day_child'].' '.$user['age_month_child'].' '.$user['age_year_child'] ?></p>
                            <button class="edit-acc-btn7">Wijzig</button>
                        </div>
                        <form class="align-items-center d-flex w-100 edit-area7 dashboard-account-content-hide" action="" method="POST">
                            <div class="d-flex mb-2 w-100">
                                <input class="dashboard-input-age m-0" type="number" name="age_day_child" placeholder="Dag" value="<?= $user['age_day_child'] ?>">
                                <select class="dashboard-select">
                                    <option value="<?= $user['age_month_child'] ?>"><?= $user['age_month_child'] ?></option>
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
                                <input class="dashboard-input-age m-0" type="number" name="age_year_child" placeholder="Jaar" value="<?= $user['age_year_child'] ?>">
                            </div>
                            <button class="edit-acc-btn7" name="edit_age_child">Wijzig</button>
                        </form>
                    </div>

                <h2>Verwijder Account</h2>
                    <div class="justify-content-end dashboard-account-content">
                        <form action="" method="post">
                            <input type="hidden" name="email" value="<?= $_SESSION['email'] ?>">
                            <button class="dashboard-delete-button" type="submit" name="delete_account">Verwijder Account</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>

<!--    Footer Layout   -->
<?php include('layouts/layout_footer.php')?>