<?php $Week = date('W');?>
<?php 
    include('layouts/layout_header.php');
    
    // Check is user is logged in
    if (!isset($_SESSION['email'])) {
        header('location: no-account.php');
    }
?>
<!--    Header Layout   -->

<div class="align-items-center d-flex h-100 justify-content-center">
    <div class="inpl-box">
        <div class="align-items-center d-flex justify-content-center inpl-box-top">
            <button><</button>
                <h2><?= 'Week ' . $Week;?></h2>
            <button>></button>
        </div>
        <table>
            <thead>
                <tr>
                    <th style="cells:empty-cells;"></th>
                    <th>Maandag</th>
                    <th>Dinsdag</th>
                    <th>Woensdag</th>
                    <th>Donderdag</th>
                    <th style="border-right:none!important">Vrijdag</th>
                </tr>
            <thead>
            <tbody>
                <tr>
                    <td>9:00-10:00</td>
                    <td>test</td>
                </tr>
                <tr>
                    <td>10:00-11:00</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!--    Footer Layout   -->
<?php include('layouts/layout_footer.php');?>