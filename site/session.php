<?php
if (!isset($_SESSION)) {
session_start();
$timeout = 15; // Set timeout menit
$logout_redirect_url = "../index.php"; // Set logout URL

$timeout = $timeout * 60; // Ubah menit ke detik
if (isset($_SESSION['time'])) {
    $elapsed_time = time() - $_SESSION['time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
        echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
    }
}

} 
//jika session username belum dibuat, atau session username kosong
if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
	?> <script language="javascript">
	alert("Maaf, Anda Harus Login!!");
	document.location="../index.php";
	</script>
	<?php
}

$_SESSION['time']   = time();
?>
