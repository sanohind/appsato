<link href="../lib/bower_components/sweetalert/alert/css/sweetalert.css" rel="stylesheet" type="text/css"/>
<script src="../lib/bower_components/sweetalert/alert/js/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="../lib/bower_components/sweetalert/alert/js/sweetalert.min.js" type="text/javascript"></script>
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../site/session.php';
include '../main.php';
if (isset($_POST['submit'])) {
    $vd = $_POST['vdCode'];
    $part = $_POST['part'];
    $lot = $_POST['lotNo'];
    $qty = $_POST['qty'];
    $ref = $_POST['refNo'];
    $rem = $_POST['remark'];
    $uID = $_POST['uID'];
    $prdID = $_POST['prdID'];
    $stg = $_POST['storage'];
    $loc = $_POST['location'];

    $cekRef = $stk->refnoCheck($prdID, $ref);
    if ($cekRef == 1) {
        ?>
        <script language="javascript">
            alert("Ref. No sudah terdaftar, label sudah discan!!");
            document.location = "scan.php?prdID=<?= $prdID ?>&storage=<?= $stg ?>&uID=<?= $uID ?>";
        </script>
        <?php
    } else {
        $p = $stk->insertSttk($prdID, $stg, $loc, $part, $lot, $qty, $vd, $ref, $rem, $uID);
        if ($p == 1) {
            ?>
            <script language="javascript">
                //alert("data tersimpan");
                document.location = "scan.php?prdID=<?= $prdID ?>&storage=<?= $stg ?>&uID=<?= $uID ?>";
            </script>
            <?php
        }else{
            ?>
            <script language="javascript">
                alert("terjadi kesalahan"+<?=$p?>);
                document.location = "scan.php?prdID=<?= $prdID ?>&storage=<?= $stg ?>&uID=<?= $uID ?>";
            </script>
            <?php
        }
    }
}