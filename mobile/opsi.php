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
        <script src="../lib/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="../lib/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="home.php">KIYOKUNI INDONESIA</a>
                </div>
            </div>
        </nav>
        <?php
        if ($_GET['opt'] == 'qr') {
            ?>
        <form action="scan.php" method="GET" class="form-horizontal">
            <div class="container">
                <div class="form-group">
                    <label for="prdID">Period ID</label>
                    
                        <select class="form-control" id="prdID" name="prdID">
                            <option value="">-- Pilih Periode --</option>
                            <?php
                            $data = $prd->getAktifPeriod();
                            foreach ($data as $row) {
                                ?>
                                <option value="<?= $row->prd_id ?>"><?= $row->prd_id ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    
                </div>
                <div class="form-group">
                    <label for="storage">Scan Gudang</label>
                    <input type="text" name="storage" class="form-control" id="storage" required>
                </div>
                <input type="hidden" name="uID" value="<?= $_SESSION['user'] ?>">

                <div class="form-group text-center">
                    <button type="submit" id="btSubmit" class="col-md-6 btn btn-lg btn-success">Submit</button>
                    <button type="reset" id="btReset" class="col-md-6 btn btn-lg btn-danger">Reset</button>

                </div>
            </div>
        </form>
            <?php
        } else {
            ?>
        <form action="view.php" method="GET" class="form-horizontal">
            <div class="container">
                <div class="form-group">
                    <label for="prdID">Period ID</label>
                    
                    <select class="form-control" id="prdID" name="prdID" required>
                            <option value="">-- Pilih Periode --</option>
                            <?php
                            $data = $prd->getAktifPeriod();
                            foreach ($data as $row) {
                                ?>
                                <option value="<?= $row->prd_id ?>"><?= $row->prd_id ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    
                </div>
                <input type="hidden" name="uID" value="<?= $_SESSION['user'] ?>">

                <div class="form-group text-center">
                    <button type="submit" id="btSubmit" class="col-md-6 btn btn-lg btn-success">Submit</button>
                    <button type="reset" id="btReset" class="col-md-6 btn btn-lg btn-danger">Reset</button>

                </div>
            </div>
        </form>


        <?php }
        ?>
    </body>
</html>