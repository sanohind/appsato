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
        <script type="text/javascript">
            $(document).ready(function () {
                $("#qr").focus();
                $("#qr").blur(function () {
                    var qD = $("#qr").val();
                    //alert(qD);
                    var res = qD.split("|");
                    //alert(res);
                    var part = res[0].substr(2);
                    var lot = res[2].substr(2);

                    $("#vdCode").val(res[1].substr(2));
                    $("#part").val(part);
                    $("#lotNo").val(lot);
                    $("#qty").val(res[3].substr(2));
                    $("#refNo").val(res[5].substr(2));
                    $("#remark").val(res[4].substr(2));
                    $("#qr").val('');
                    $("#btSubmit").focus();
                });
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
        <form action="post.php" method="POST">
            <div class="container">
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" name="location" class="form-control" id="location" required>
                </div>
            </div>

            <hr/>
            
            <div class="container">

                <div class="form-group">
                    <label for="email">Scan QR Code</label>
                    <textarea id="qr" class="form-control" name="qrCode" placeholder="Scan QR Code Here"></textarea>
                </div>
            </div>

            <hr/>

            
            <div class="container">
                <!--form id="formData"> action="post.php" method="POST"--> 
                <div class="form-group">
                    <label for="vdCode">Vendor Code</label>
                    <input type="text" name="vdCode" class="form-control" id="vdCode" readonly required>
                </div>
                <div class="form-group">
                    <label for="part">Part Code</label>
                    <input type="text" name="part" class="form-control" id="part" readonly required>
                </div>
                <div class="form-group">
                    <label for="lot">Lot No</label>
                    <input type="text" name="lotNo" class="form-control" id="lotNo" readonly required>
                </div>
                
                <div class="form-group">
                    <label for="ref">Ref. NO</label>
                    <input type="text" name="refNo" class="form-control" id="refNo" readonly required>
                </div>
                <div class="form-group">
                    <label for="rem">Remark</label>
                    <input type="text" name="remark" class="form-control" id="remark" readonly>
                </div>
                <div class="form-group">
                    <label for="qty">Qty</label>
                    <input type="text" name="qty" class="form-control" id="qty" required>
                </div>
                <input type="hidden" name="uID" value="<?= $_SESSION['user'] ?>">
                <input type="hidden" name="prdID" value="<?= $_GET['prdID'] ?>">
                <input type="hidden" name="storage" value="<?= $_GET['storage'] ?>">
                <hr/>

                <div class="form-group text-right">
                    <button type="submit" name="submit" id="btSubmit" class="col-md-6 btn btn-lg btn-success">Submit</button>
                    <button type="reset" id="btReset" class="col-md-6 btn btn-lg btn-danger">Reset</button>

                </div>

            </div>
        </form>
    </body>
</html>