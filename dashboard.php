<?php 
    include('layouts/layout_header.php');
    
    // Check if user is logged in
    if (!isset($_SESSION['email'])) {
        header('location: no-account.php');
    }
?>
<!--    Header Layout   -->

<div class="align-items-center d-flex h-100 justify-content-center">
    <div class="d-flex dashboard-box">
        <?php include('layouts/layout_dashboard.php'); ?>   <!--    Dashboard Menu  -->

        <div class="dashboard-content">
            <h1>Profiel</h1>
        </div>
    </div>
</div>

<!--    Footer Layout   -->
<?php include('layouts/layout_footer.php');?>