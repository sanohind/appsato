<!DOCTYPE html>
<?php
include '../site/session.php';
include '../main.php';
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name = "viewport" content = "width = device-width, initial-scale = 1, 
              maximum-scale = 1, minimum-scale = 1" />
        <title>Stock Opname</title>
        <link href="../lib/bower_components/bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../lib/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../lib/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../lib/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="../lib/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../lib/bower_components/datatables.net/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="../lib/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
               $('#tbData').dataTable();
            });
        </script>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="home.php">KIYOKUNI INDONESIA</a>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="container">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Data scan user <?=$_GET['uID']?> Periode <?=$_GET['prdID']?>
                    </div>
                </div>
                <table id="tbData" class="table table-responsive table-striped">
                    <thead>
                    <th>No</th>
                    <th>Gudang</th>
                    <th>Part No</th>
                    <th>Lot No</th>
                    <th>Qty</th>
                    <th>Ref No</th>
                    <th>Remark</th>
                    <th>Waktu scan</th>
                    </thead>
                    <tbody>
                        <?php 
                        $n=1;
                        $data = $stk->getDataSttk($_GET['prdID'], $_GET['uID']);
                        foreach ($data as $row) {
                            ?>
                            <tr>
                                <td><?=$n?></td>
                                <td><?=$row->sttk_storage ." - ". $row->sttk_location?></td>
                                <td><?=$row->sttk_partno?></td>
                                <td><?=$row->sttk_lotno?></td>
                                <td><?=$row->sttk_qty?></td>
                                <td><?=$row->sttk_refno?></td>
                                <td><?=$row->sttk_remark?></td>
                                <td><?=$row->sttk_time?></td>
                                
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>