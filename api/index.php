<!DOCTYPE html>
<html>
    <?php include '../template/head.php'; ?>
    <body class="hold-transition skin-blue layout-top-nav">
        <!-- Site wrapper -->
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="#" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>K</b>I</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-mini">KIYOKUNI INDONESIA</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">

                </nav>
            </header>
            <!-- =============================================== -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h1>
                            PT. KIYOKUNI INDONESIA
                            <small>Stock Opname API</small>
                        </h1>

                    </section>
                    <!-- Main content -->
                    <section class="content">
                        <div class="error-page">
                            <h2 class="headline text-yellow"> 401</h2>
                        </div>
                        <div class="error-content">
                            <h3><i class="fa fa-warning text-yellow"></i> Authorized Access Required</h3>

                            <p>
                                You do not have permission to load this resources..
                            </p>
                        </div>
                    </section>
                </div>

                <!-- /.content -->
            </div>

            <!-- /.content-wrapper -->

            <footer class="main-footer text-center">
                <strong>Copyright &copy; 2019 PT. Kiyokuni Indonesia</strong> All rights
                reserved.
            </footer>

            <!-- =============================================== -->

            <!-- Control sidebar. -->
            <?php include '../template/control_sidebar.php'; ?>

            <!-- =============================================== -->

            <!-- Footer. Contains page content -->
        </div>
        <?php
        include '../template/js.php';
        ?>

    </body>
</html>