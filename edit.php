<?php
    include('layouts/layout_header.php');

    // Check if user is logged in

?>
<!--    Header Layout   -->

<div class="align-items-center d-flex h-100 justify-content-center">
    <form class="d-flex flex-direction-column edit-box" action="" method="POST">
        <input type="date" name="date">
        <button type="submit" name="edit_date">Edit</button>
    </form>
</div>

<!--    Footer Layout   -->
<?php
    include('layouts/layout_footer.php');
?>