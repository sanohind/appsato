<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../main.php';
if (isset($_POST['download'])) {

    $prd = $_POST['prdID'];
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data_StockOpaname_Periode_" . $prd . ".xls");
    ?>
    <table>
        <thead>
            <tr>
                <th>Storage - Location</th>
                <th>Part No.</th>
                <th>Lot No.</th>
                <th>Qty</th>
                <th>Ref No.</th>
                <th>Remark</th>
                <th>User</th>
                <th>Scan Time</th>
            </tr>
        </thead>
        <tbody id = "showData">
            <?php
            $uID = 'All';
            $data = $stk->getDataSttk($prd, $uID);
            foreach ($data as $row) {
                ?>
                <tr>
                    <td><?= $row->sttk_storage . " - " . $row->sttk_location ?></td>
                    <td><?= $row->sttk_partno ?></td>
                    <td><?= $row->sttk_lotno ?></td>
                    <td><?= $row->sttk_qty ?></td>
                    <td><?= $row->sttk_refno ?></td>
                    <td><?= $row->sttk_remark ?></td>
                    <td><?= $row->sttk_userid ?></td>
                    <td><?= $row->sttk_time ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table> 
    <?php
}
