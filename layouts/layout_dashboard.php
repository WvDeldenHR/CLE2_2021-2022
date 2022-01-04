<!--    Page Content  -->

<div class="d-flex flex-direction-column dashboard-link-list pb-2">
    <h1><?= $user['firstname_parent'].' '.$user['lastname_parent'] ?></h1>
        <a href="dashboard.php"><img src="images/icons/user.png">Profiel</a>
        <a href="account.php"><img src="images/icons/settings.png">Account Instellingen</a>
        <a href="inplannen.php"><img src="images/icons/planning.png">Inplannen</a>
        <?php
            if($user['id'] == $admin) {
               echo '<a href="users.php"><img src="images/icons/users.png">Gebruikers</a>';
            }
        ?>
</div>

<!--    Page Content    -->