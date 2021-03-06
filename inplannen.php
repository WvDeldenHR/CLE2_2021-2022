<?php
    include('layouts/layout_header.php');

    // Check if user is logged in
    if (!isset($_SESSION['email'])) {
        header('location: no-account.php');
    }

    setlocale(LC_ALL, 'nl_NL');
    setlocale (LC_ALL, "Dutch");

    // $duration = 30;
    // $cleanup = 0;
    // $start = "09:00";
    // $end = "15:00";

    // function timeslots($duration, $cleanup, $start, $end) {
    //     $start = new DateTime($start);
    //     $end = new DateTime($end);
    //     $interval = new DateInterval("PT".$duration."M");
    //     $cleanupInterval = new DateInterval("PT".$duration."M");
    //     $slots = array();

    //     for($intStart = $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval)) {
    //         $endPeriod = clone $intStart;
    //         $endPeriod->add($interval);
    //         if($endPeriod>$end) {
    //             break;
    //         }

    //         $slots = $intStart->format("H:iA")."-". $endPeriod->format("H:iA");
    //     }

    //     return $slots;
    // }





    $dt = new DateTime;
    if (isset($_GET['year']) && isset($_GET['week'])) {
        $dt->setISODate($_GET['year'], $_GET['week']);
    } else {
        $dt->setISODate($dt->format('o'), $dt->format('W'));
    }
    $year = $dt->format('o');
    $week = $dt->format('W');
    $month = $dt->format('F');

    $day = $dt->format('Y m d')
?>
<!--    Header Layout   -->

<div class="align-items-center d-flex h-100 justify-content-center">
    <div class="inpl-box">
        <div class="align-items-center d-flex flex-direction-column inpl-box-top">
            <h1 class="cursor-default"><?= $month." ".$year ?></h1>
            <div class="align-items-center d-flex">
                <a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week-1).'&year='.$year; ?>"><</a>
                    <h2 class="cursor-default"><?= 'Week ' . $week;?></h2>
                <a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week+1).'&year='.$year; ?>">></a>
            </div>
        </div>

        <?php
            // do { 
            //     echo $dt->format('l');
            //     $dt->modify('+1 day');
            // } while ($week == $dt->format('W'));
        ?>

        <table cellspacing="0" class="">
            <thead>
                <tr>
                    <th></th>
                    <?php do { if($dt->format('d M Y') == date('d M Y')) { ?>
                            <th class='inpl-box-current'><?= $dt->format('l')?></th>
                       <?php } else { ?>
                            <th><?= $dt->format('l') ?></th>
                            <?php if ($day == $reservation['date']) { ?>
                                <h1>Test</h1>
                                <?php } ?>
                            <?php } $dt->modify('+1 day');
                        } while ($week == $dt->format('W'))?>
                                      
                </tr>
            </thead>
            <tbody>
                <tr class="inpl-box-content">
                    <td>9:00 - 16:00+</td>
                    <?php //if ($day == $reservation['date']) { ?>
                    <td>
                        <div class="d-flex flex-direction-column">
                                <span class="inpl-box-content-date"><?= $dt->format('d M')  ?></span>
                                <span class="inpl-box-content-img"><img src="images/icons/planning.png"></span>
                                <button class="inpl-box-btn">Maak Afspraak</button>

                                <div id="myModal" class="modal inpl-modal">
                        
                                <div class="inpl-modal-content">
                                <span class="inpl-close-btn">&times;</span>
                                    <div class="align-items-center d-flex flex-direction-column justify-content-center">
                                        <h2 class="pb-1">Maandag <?php ?></h2>
                                        <form class="d-flex flex-direction-column" action="" method="POST">
                                            <span class="lr-error-span"><?= htmlentities($errors['user_id'] ?? '' ) ?></span>
                                            <input type="hidden" id="user_id" name="user_id"  value="<?= htmlentities($user['id']) ?>">
                                            <span class="lr-error-span"><?= htmlentities($errors['date'] ?? '' ) ?></span>
                                            <input class="mtb-2" type="date" id="date" name="date" placeholder="date">
                                            <button class="inpl-modal-btn" type="submit" name="plan_date">Maak Afspraak</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                   <?php// } else {?>
                    <td>
                        <div class="d-flex flex-direction-column">
                                <span class="inpl-box-content-date"><?= htmlentities($dt->format('d M')) ?></span>
                                <span class="pt-2">09:00 - 16:00</span>
                                <div class="align-items-baseline d-flex justify-content-center pt-3 inpl-box-content-alt">
                                <span class="inpl-btn-edit"><img src="images/icons/edit.png"></span>
                                <span class="inpl-btn-delete">&times;</span> 
                                </div>
                        </div>
                    </td>
                    <?php// }?>
                </tr>
                <tr class="inpl-box-bottom">
                    <td></td>
                    <?php for ($i = 0; $i < 5; $i++) { ?>
                    <td>
                        <div class="align-items-center d-flex justify-content-center">
                            <img src="images/icons/users.png"><?= "0/4" ?>
                        </div>    
                    </td>
                    <?php } ?>
                </tr>

                <?php foreach ($reservations as $reservation) { ?>
                    <tr>
                        
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
// Get the modal
// var modal = document.getElementById("myModal");


var modal = document.getElementsByClassName("inpl-modal")[0];

var btn = document.getElementsByClassName("inpl-box-content-btn")[0];
var span = document.getElementsByClassName("inpl-close-btn")[0];

btn.onclick = function() {
  modal.style.display = "flex";
}
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<!--    Footer Layout   -->
<?php include('layouts/layout_footer.php'); ?>