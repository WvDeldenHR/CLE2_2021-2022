<?php include('layout_header.php');?>
<!--    Header Layout   -->

<div class="align-items-center d-flex h-100 justify-content-center pt-10">
    <div class="d-flex dashboard-box">
        <div class="d-flex flex-direction-column dashboard-link-list">
            <h1>Name User</h1>
            <a href="dashboard.php"><img src="images/icons/user.png">Profiel</a>
            <a class="dashboard-link-selected" href="account.php"><img src="images/icons/settings.png">Account Instellingen</a>
            <a class="mb-2" href="inplannen.php"><img src="images/icons/planning.png">Inplannen</a>
        </div>

        <div class="dashboard-content">
            <h1>Account Instellingen</h1>
            <form class="dashboard-form">
                <label>E-mail</label>
                    <div class="dashboard-form-content">
                        <p>email@test.nl</p>
                        <a href="">Wijzig</a>
                    </div>
                <label>Wachtwoord</label>
                    <div class="dashboard-form-content">
                        <p>*****</p>
                        <a href="">Wijzig</a>
                    </div>
                <label>Telefoonnummer</label>
                    <div class="dashboard-form-content">
                        <p>0612345678</p>
                        <a href="">Wijzig</a>
                    </div>

                <h2>Ouder</h2>
                <label>Voornaam</label>
                    <div class="dashboard-form-content">
                        <p>Henk</p>
                        <a href="">Wijzig</a>
                    </div>
                <label>Achternaam</label>
                    <div class="dashboard-form-content">
                        <p>Boot</p>
                        <a href="">Wijzig</a>
                    </div>

                <h2>Kind</h2>
                <label>Voornaam</label>
                    <div class="dashboard-form-content">
                        <p>Jantje</p>
                        <a href="">Wijzig</a>
                    </div>
                <label>Leeftijd</label>
                    <div class="dashboard-form-content">
                        <p>1-2-2020</p>
                        <a href="">Wijzig</a>
                    </div>
            </form>
        </div>
    </div>
</div>

<!--    Footer Layout   -->
<?php include('layout_footer.php')?>