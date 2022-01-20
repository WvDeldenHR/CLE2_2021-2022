<?php 
    include('layouts/layout_header.php');
    
    // Check is user is logged in
    if (!isset($_SESSION['email'])) {
        header('location: no-account.php');
    }

    // Check of user had admin role
    if($user['id'] != $admin) {
        header('location: no-account.php');
    }
?>
<!--    Header Layout   -->

<div class="align-items-center d-flex h-100 justify-content-center pt-10">
    <div class="d-flex dashboard-box">
        <?php include('layouts/layout_dashboard.php'); ?>   <!--    Dashboard Menu  -->

        <div class="dashboard-content w-fcontent">
            <h1>Gebruiker Overzicht</h1>
            <table>
                <tr>
                    <th>Email</th>
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>Telefoonnummer</th>
                    <th>Naam Kind</th>
                    <th>Leeftijd</th>
                    <th class="b-none"></th>
                </tr>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?= htmlentities($user['email']) ?></td>
                        <td><?= htmlentities($user['firstname_parent']) ?></td>
                        <td><?= htmlentities($user['lastname_parent']) ?></td>
                        <td><?= htmlentities($user['phonenumber']) ?></td>
                        <td><?= htmlentities($user['firstname_child']) ?></td>
                        <td><?= htmlentities($user['age_day_child']).' '.htmlentities($user['age_month_child']).' '.htmlentities($user['age_year_child']) ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?= htmlentities($user['id']) ?>">
                                <button class="dashboard-delete-button" type="submit" name="delete_user">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<!--    Footer Layout   -->
<?php include('layouts/layout_footer.php'); ?>