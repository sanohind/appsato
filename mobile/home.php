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
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h5 class="description-header">Scan Data Stock</h5>
                        </div>
                        <div class="panel-body text-center">
                            <a href="opsi.php?opt=qr"><img src="../lib/img/qrcode.png"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h5 class="description-header">Lihat Data Scan</h5>
                        </div>
                        <div class="panel-body text-center">
                            <a href="opsi.php?opt=sc"><img src="../lib/img/data.png"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h5 class="description-header">Logout</h5>
                        </div>
                        <div class="panel-body text-center">
                            <a href="logout.php"><img src="../lib/img/logout.png"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>