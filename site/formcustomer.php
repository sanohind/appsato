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
                        User Management
                        <small>Update : <?= date('Y-m-d H:i:s') ?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php" ><i class="fa fa-dashboard"></i> Home</a></li>
                        <!--                        <li><a href="#">Examples</a></li>-->
                        <li class="active">User Management</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="row">
                        <div class="col-lg-12">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="collapse" data-target="collFilter">Register Customer &nbsp;&nbsp;<i class="fa fa-plus-square"></i></button>
                            <div class="text-center" id="loading">

                            </div>
                        </div>
<!--                                <img src="../lib/dist/img/loading.gif">-->
                        <!-- /.col-lg-12 -->
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-lg-12 collapse " id="collFilter">
                            <div class="panel panel-default">
                                <div class="panel-body ">
                                    <form class="form-horizontal" action="" id="formData" method="POST">
                                        <div class="form-group">
                                            <label for="userID" class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="userEmail" name="userEmail" placeholder="User Email" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="userName" class="col-sm-2 control-label">Nama User</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="userName" name="userName" placeholder="Nama user" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="userDept" class="col-sm-2 control-label">Masa Aktif</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" id="time" name="time">
                                                    <option value="">-- Pilih Masa Aktif --</option>
                                                    <option value="1">7 Hari</option>
                                                    <option value="2">15 Hari</option>
                                                    <option value="3">30 Hari</option>
                                                    <option value="4">60 Hari</option>
                                                    <option value="5">90 Hari</option>
                                                    <option value="6">Live Time</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="userRemark" class="col-sm-2 control-label">Deskripsi</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="desc" name="desc" placeholder="Remark" autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="form-group text-center">
                                            <div class="col-sm-12">
                                                <input type="submit" name="submit" id="displayData" class="btn btn-primary " value="Register">
                                                &nbsp;&nbsp;
                                                <input type="reset" id="resetData" class="btn btn-danger" value="Cancel">
                                                <!--                                                <a class="btn btn-primary" id="btnsave">Save</a>
                                                                                                <a class="btn btn-danger" id="btnreset">Reset</a>-->
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br/>
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Data Customer <small>Update : <?= date('Y-m-d H:i:s') ?></small> </h3>
                        </div>
                        <div class="box-body">
                            <table id="tableToken" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Customer ID</th>
                                        <th>Name</th>
                                        <th>Supplier ID</th>
                                        <th>Delimiter</th>
                                        <th>Header</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $data = $cust->getDataCustomer();
                                        foreach ($data as $row){
                                    ?>
                                    <tr>
                                        <td><?=$row->CostumerID?></td>
                                        <td><?=$row->Costumername?></td>
                                        <td><?=$row->SupplierID?></td>
                                        <td><?=$row->Delimiter?></td>
                                        <td><?=$row->Header?></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                    
                    <!-- reset confirmation -->
                    <div class="modal fade" id="modDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content" style="margin-top:100px;">
                                <div class="modal-header delItem">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title delItem" style="text-align:center;">Reset password user ini ?</h4>
                                </div>

                                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                                    <a href="#" class="btn btn-danger" id="delete_link">Ya</a>
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

            if (isset($_POST['submit'])) {
                $uID = filter_input(INPUT_POST, 'userEmail');
                $uName = filter_input(INPUT_POST, 'userName');
                $time = filter_input(INPUT_POST, 'time');
                $desc = filter_input(INPUT_POST, 'desc');
                $p = $token->generateToken($uID, $uName, $desc, $time);
                //echo $p;

                if ($p == 1) {
                    ?><script language="javascript">
                                //swal("Berhasil!!", "Data tersimpan", "success");
                                swal({
                                    title: "Success!!",
                                    text: "Data tersimpan",
                                    type: "success"},
                                function () {
                                    window.location.href = "formtoken.php";
                                });
                    </script><?php
                    //echo "swal(\"Berhasil!!\", \"Data tersimpan\", \"success\");";
                } else {
                    ?>
                    <script language="javascript">
                        //swal("Oops", "<?= $p ?>", "error");
                        swal({
                            title: "Oops!!",
                            text: "<?= $p ?>",
                            type: "error"},
                        function () {
                            window.location.href = "formuser.php";
                        });
                    </script>

                    <?php
                }
            }
            ?>
            <!-- page script -->
            <script>
                $(document).ready(function () {
                    $('#tableToken').dataTable();
                });
            </script>
    </body>
</html>