<?php
require '../main.php';
if (isset($_GET['Rid'])) {
    $Rid = filter_input(INPUT_GET, 'Rid');
    $prd->finishPeriod($Rid);
}

