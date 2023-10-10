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
                    <li class="active">Upload Part</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box box-info">
                            <div class="box-header">
                                <h3 class="box-title">Upload Part</h3>
                            </div>
                            <div class="box-body">
                                <form class="form-horizontal" action="prosesuploadpart.php" id="formData" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleInputFile" class="col-sm-2 control-label">File Format</label>
                                        <div class="col-sm-6">
                                            <a href="../lib/Template_Master_Part.xlsx" class="form-control btn btn-success">Download File tempate</a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile" class="col-sm-2 control-label">File Upload</label>
                                        <div class="col-sm-6">
                                            <input type="file" name="file_excel_part" class="form-control" id="exampleInputFile">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
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
                                        <label for="userRemark" class="col-sm-2 control-label">Deskripsi</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="desc" name="desc" placeholder="Remark" autocomplete="off">
                                        </div>
                                    </div> -->
                                    <div class="form-group text-center">
                                        <div class="col-sm-12">
                                            <input type="submit" name="submit" id="displayData" class="btn btn-primary " value="Proses">
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
                    <!--<img src="../lib/dist/img/loading.gif">-->
                    <!-- /.col-lg-12 -->
                </div>
                <br />

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