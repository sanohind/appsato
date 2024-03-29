<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Printing Label</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="lib/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="lib/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="lib/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="lib/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="lib/plugins/iCheck/square/blue.css">
    <link href="lib/bower_components/sweetalert/alert/css/sweetalert.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Printing Label</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg"><img src="lib/img/snh.png" alt="SNH-Logo" width="120"> PT. Sanoh Indonesia</p>

            <form action="" method="POST">
                <div class="form-group has-feedback">
                    <input type="text" id="uID" name="userID" class="form-control" placeholder="UserID">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" id="passwd" name="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row ">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center">
                <?php
                if (isset($_POST['submit'])) {
                    $UserID = filter_input(INPUT_POST, "userID");
                    $pwd = filter_input(INPUT_POST, "password");
                    include 'main.php';
                    if ($UserID == "" || $pwd == "") {
                        echo "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                        <span aria-hidden=\"true\">&times;</span>
                                    </button>
                                    <strong>User ID atau password tidak boleh kosong!!!</strong>
                                </div>";
                    } else {
                        $cekU = $user->getUserID($UserID);
                        if ($cekU === FALSE) {
                            //header("location:index.php?error=1");
                            echo "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                        <span aria-hidden=\"true\">&times;</span>
                                    </button>
                                    <strong>User ID anda belum terdaftar!!!</strong>
                                </div>";
                        } else {
                            // $cekRight = $user->getUserbyID($UserID);
                            // if ($cekRight->user_right == "2") {
                            //     echo "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\">
                            //         <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            //             <span aria-hidden=\"true\">&times;</span>
                            //         </button>
                            //         <strong>User ID anda tidak cukup akses untuk module ini!!!</strong>
                            //     </div>";
                            // } else {
                                $cekP = $user->getUserPass($UserID);
                                if ($pwd === $cekP->password) {
                                    session_start();
                                    $_SESSION['user'] = $UserID;
                                    //$_SESSION['auth'] = $cekRight->user_right;
                                    echo "<div align=\"center\"><img src=\"lib/img/loading.gif\"></div>
					<meta http-equiv=\"refresh\" content=\"3; url=site/index.php\">";
                                } else {
                                    echo "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                        <span aria-hidden=\"true\">&times;</span>
                                    </button>
                                    <strong>Periksa kembali password anda!!!</strong>
                                </div>";
                                }
                            //}
                        }
                    }
                }
                ?>
                <!--                    <div align="center"><img src="lib/img/loading.gif">-->
            </div>
            <!-- /.social-auth-links -->

            <!--                <a href="#">I forgot my password</a><br>
                                <a href="register.html" class="text-center">Register a new membership</a>-->

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="lib/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="lib/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="lib/plugins/iCheck/icheck.min.js"></script>
    <script src="lib/bower_components/sweetalert/alert/js/sweetalert.min.js" type="text/javascript"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
</body>

</html>