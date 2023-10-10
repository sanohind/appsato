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
                    Master Part
                    <small>Update : <?= date('Y-m-d H:i:s') ?></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <!--                        <li><a href="#">Examples</a></li>-->
                    <li class="active">Master Part</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="collapse" data-target="#collFilter">Register Part &nbsp;&nbsp;<i class="fa fa-plus-square"></i></button>
                        <a href="formuploadpart.php" class="btn btn-success dropdown-toggle">Upload Part &nbsp;&nbsp;<i class="fa fa-plus-square"></i></a>
                        <div class="text-center" id="loading">

                        </div>
                    </div>
                    <!--<img src="../lib/dist/img/loading.gif">-->
                    <!-- /.col-lg-12 -->
                </div>
                <br />
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Data Part</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped" id="tbPart">
                            <thead>
                                <th>Part No</th>
                                <th>Part Name</th>
                                <th>Model</th>
                                <th>Customer ID</th>
                                <th>Header</th>
                                <th>SNP</th>
                                <th>Warna</th>
                            </thead>
                            <tbody>
                                <?php
                                $data = $part->getDataPart();
                                foreach ($data as $row) :
                                ?>
                                    <tr>
                                        <td><?= $row->Partno ?></td>
                                        <td><?= $row->Partname ?></td>
                                        <td><?= $row->model ?></td>
                                        <td><?= $row->CostumerID ?></td>
                                        <td><?= $row->Value_Header ?></td>
                                        <td><?= $row->qty ?></td>
                                        <td><?= $row->WARNA ?></td>
                                    </tr>
                                <?php
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- finish confirmation -->
                <div class="modal fade" id="modDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="margin-top:100px;">
                            <div class="modal-header delItem">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title delItem" style="text-align:center;">Yakin finish periode ini ?</h4>
                            </div>

                            <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                                <a href="#" class="btn btn-danger" id="delete_link">Finish</a>
                                <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>

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
        <?php
        include '../template/js.php';
        ?>
        <!-- page script -->
        <script>
            $(function() {
                $('#tbPart').DataTable()
            })
        </script>
</body>

</html>