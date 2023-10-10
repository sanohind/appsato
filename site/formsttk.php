<!DOCTYPE html>
<?php
include 'session.php';
include '../main.php';
?>
<html>
    <?php include '../template/head.php'; ?>
    <body class="hold-transition skin-blue sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            <?php include '../template/main_header.php'; ?>

            <!-- =============================================== -->

            <!-- Left side column. contains the sidebar -->
            <?php include '../template/sidebar.php'; ?>

            <!-- =============================================== -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Data Stock Opname

                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <!--                        <li><a href="#">Examples</a></li>-->
                        <li class="active">Data Stock Opname</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="row">
                        <div class="col-lg-12 ">
                            <div class="panel panel-default">
                                <div class="panel-body ">
                                    <form class="form-horizontal" action="" id="formData" method="GET">
                                        <div class="form-group">
                                            <label for="prdID" class="col-sm-2 control-label">Period ID</label>
                                            <div class="col-sm-4">
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
                                        </div>
                                        <!--                                        <div class="form-group">
                                                                                    <label for="jobdesc" class="col-sm-2 control-label">Deskripsi</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="text" class="form-control" id="prdDesc" name="prdDesc" placeholder="Deskripsi" autocomplete="off">
                                                                                    </div>
                                                                                </div>-->

                                        <div class="form-group text-center">
                                            <div class="col-sm-12">
                                                <input type="submit" name="submit" id="displayData" class="btn btn-primary ">
                                                <!--                                                &nbsp;&nbsp;
                                                                                                <input type="reset" id="resetData" class="btn btn-danger" value="Cancel">
                                                                                                <a class="btn btn-primary" id="btnsave">Display</a> -->
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br/>
                    <?php
                    if (isset($_GET['submit'])) {
                        $prdID = $_GET['prdID'];
                        $uID = $_SESSION['user'];

                        if ($_SESSION['auth'] == "0") {
                            $uID = 'All';
                            ?>
                            <div class="box box-info">
                                <div class="box-header">
                                    <div class="text-center">
                                        <form class="form-horizontal" action="exportexcel.php" method="POST" target="_blank">
                                            <input type="hidden" name="prdID" value="<?= $prdID ?>">
                                            <button type="submit" name="download" class="btn btn-default"><i class="glyphicon glyphicon-file"></i> Download to excel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <br/>
                        <div class="box box-info">
                            <div class="box-header">
                                <h3 class="box-title">List Data Stock Opname <small>Update : <?= date('Y-m-d H:i:s') ?></small> </h3>
                            </div>

                            <div class="box-body">
                                <table id="tbPrd" class="table table-bordered table-hover">
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
                                    <tbody id="showData">
                                        <?php
                                        $data = $stk->getDataSttk($prdID, $uID);
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
                            </div>


                        </div>
                        <?php
                    }
                    ?>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <?php include '../template/footer.php'; ?>
            <!-- =============================================== -->

            <!-- Control sidebar. -->
            <?php include '../template/control_sidebar.php'; ?>

            <!-- =============================================== -->

            <!-- Footer. Contains page content -->
            <?php include '../template/js.php'; ?>
            <!-- page script -->
            <script>
                $(function () {
                    $('#tbPrd').DataTable()

                })
                //Date picker
                $('#prdStart').datepicker({
                    autoclose: true
                })
                //Date picker
                $('#prdEnd').datepicker({
                    autoclose: true
                })



            </script>
    </body>
</html>