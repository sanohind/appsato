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
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="collapse" data-target="#">Register User &nbsp;&nbsp;<i class="fa fa-plus-square"></i></button>

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
                                            <label for="userID" class="col-sm-2 control-label">User ID</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="userID" name="userID" placeholder="User ID." autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="userName" class="col-sm-2 control-label">Nama User</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="userName" name="userName" placeholder="Nama user" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="userDept" class="col-sm-2 control-label">Departemen</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" id="userDept" name="userDept">
                                                    <option value="">-- Pilih Departemen --</option>
                                                    <option value="Accounting">Accounting</option>
                                                    <option value="Warehouse">Warehouse</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="userRight" class="col-sm-2 control-label">Departemen</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" id="userRight" name="userRight">
                                                    <option value="">-- Pilih Level --</option>
                                                    <option value="0">Manager</option>
                                                    <option value="1">Leader</option>
                                                    <option value="2">Member</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="userRemark" class="col-sm-2 control-label">Remark</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="userRemark" name="userRemark" placeholder="Remark" autocomplete="off">
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
                    <div class="row">
                        <?php
                        $col = 3;
                        $i = 0;
                        $data = $user->getDataUser();
                        foreach ($data as $row) {
                            if ($i >= $col) {
                                echo "<div class=\"row\"></div>";
                                $i = 0;
                            }
                            $i++;
                            ?>
                            <div class="col-md-4">
                                <!-- Widget: user widget style 1 -->
                                <div class="box box-widget widget-user">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <div class="widget-user-header bg-aqua-active">
                                        <h3 class="widget-user-username text-bold"><?= $row->ID . " - " . $row->username ?></h3>
                                        <h5 class="widget-user-desc text-capitalize"></h5>
                                    </div>
                                    <div class="widget-user-image">
                                        <img class="img-circle" src="../lib/img/user2.png" alt="User Avatar">
                                    </div>
                                    <div class="box-footer">
                                        <div class="row text-center">
                                            <div class="description-block">
                                                <h5 class="description-header"></h5>
                                            </div>
                                            <p>
                                                <small class="label bg-aqua-gradient ">
                                                    <a href="#" id="<?= $row->ID ?>" class="text-info btnReset">
                                                        Reset password <i class="fa fa-check-circle"></i></a>
                                                </small>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 border-right">
                                                <div class="description-block">
                                                    <h5 class="description-header">Registrasi</h5>
                                                    <span class="description-text"></span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-6 border-right">
                                                <div class="description-block">
                                                    <h5 class="description-header">Update</h5>
                                                    <span class="description-text"></span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                </div>
                                <!-- /.widget-user -->
                            </div>
                            <?php
                        }
                        ?>

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
                $uID = filter_input(INPUT_POST, 'userID');
                $uName = filter_input(INPUT_POST, 'userName');
                $uDept = filter_input(INPUT_POST, 'userDept');
                $uRem = filter_input(INPUT_POST, 'userRemark');
                $uRight = filter_input(INPUT_POST, 'userRight');
                $p = $user->registerUser($uID, $uName, $uDept, $uRem, $uRight);
                //echo $p;

                if ($p == 1) {
                    ?><script language="javascript">
                                //swal("Berhasil!!", "Data tersimpan", "success");
                                swal({
                                    title: "Success!!",
                                    text: "Data tersimpan",
                                    type: "success"},
                                function () {
                                    window.location.href = "formuser.php";
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
                    $('.btnReset').click(function (e) {
                        $('#modDelete').modal('show', {backdrop: 'static'});
                        var m = $(this).attr("id");
                        //console.log(m);
                        $('#delete_link').click(function () {
                            $('#modDelete').modal('hide');
                            $.ajax({
                                url: "resetpassword.php",
                                type: "GET",
                                data: {Rid: m, },
                                success: function (ajaxData) {
                                    var res = JSON.parse(ajaxData);
                                    console.log(res.message);
                                    swal("Success!!", res.message, "success");
//                                    if (res.error <> "TRUE") {
//                                        swal("Success!!", res.message, "success");
//                                    } else {
//                                        swal("Oops!!", res.message, "error");
//                                    }
                                }
                            });
                        });
                    });
                });
            </script>
    </body>
</html>