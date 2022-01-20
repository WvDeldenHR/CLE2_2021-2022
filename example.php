<?php
    include('layouts/layout_header.php');

/* Set locale to Dutch */
setlocale(LC_ALL, 'nl_NL');
setlocale (LC_TIME, "Dutch");
/* Output: vrijdag 22 december 1978 */
echo strftime("%A %e %B %Y", mktime(0, 0, 0, 1, 22, 1978));

/* try different possible locale names for german */
// $loc_nl = setlocale(LC_ALL, 'nl_NL@euro', 'nl_NL', 'nl', 'nl');
// echo "Preferred locale for german on this system is '$loc_nl'";

    $duration = 30;
    $cleanup = 0;
    $start = "09:00";
    $end = "15:00";

    function timeslots($duration, $cleanup, $start, $end) {
        $start = new DateTime($start);
        $end = new DateTime($end);
        $interval = new DateInterval("PT".$duration."M");
        $cleanupInterval = new DateInterval("PT".$duration."M");
        $slots = array();

        for($intStart = $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval)) {
            $endPeriod = clone $intStart;
            $endPeriod->add($interval);
            if($endPeriod>$end) {
                break;
            }

            $slots = $intStart->format("H:iA")."-". $endPeriod->format("H:iA");
        }

        return $slots;
    }


    $dt = new DateTime;
    if (isset($_GET['year']) && isset($_GET['week'])) {
        $dt->setISODate($_GET['year'], $_GET['week']);
    } else {
        $dt->setISODate($dt->format('o'), $dt->format('W'));
    }
    $year = $dt->format('o');
    $week = $dt->format('W');
    $month = $dt->format('F');
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
        <table cellspacing="0" class="">
            <thead>
                <tr>
                    <th></th>
                    <?php 
                        do { 
                            if($dt->format('d M Y') == date('d M Y')) {
                                echo "<th class='inpl-box-current'>". $dt->format('l') ."</th>";
                            } else {
                                echo "<th>". $dt->format('l')  ."</th>";
                            }
                            $dt->modify('+1 day');
                        } while ($week == $dt->format('W')); 
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    // $timeslots = timeslots($duration, $cleanup, $start, $end);
                    // foreach((array) $timeslots as $ts) { 
                ?>
                <tr class="inpl-box-content">
                    <td>9:00 - 16:00+</td>
                    <td>
                        <div class="d-flex flex-direction-column">
                            <span class="inpl-box-content-date"><?= htmlentities($dt->format('d M')) ?></span>
                            <span><img src="images/icons/planning.png"></span>
                            <button id="myBtn">Maak Afspraak</button>

                            <div id="myModal" class="modal">
                        
                                <div class="inpl-modal-content">
                                <span class="inpl-close-btn">&times;</span>
                                    <div class="align-items-center d-flex flex-direction-column justify-content-center">
                                        <h2 class="pb-1">Maandag <?= date("d"); ?></h2>
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
                </tr>
                <?php //} ?>
                <tr class="inpl-box-bottom">
                    <td></td>
                    <td>
                        <div class="align-items-center d-flex justify-content-center">
                            <img src="images/icons/users.png"><?= "0/4" ?>
                        </div>    
                    </td>
                    <td>
                        <div class="align-items-center d-flex justify-content-center">
                            <img src="images/icons/users.png"><?= "0/4" ?>
                        </div>    
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("inpl-close-btn")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "flex";
}

// When the user clicks on <span> (x), close the modal
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