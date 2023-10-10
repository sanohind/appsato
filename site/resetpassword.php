<?php
require '../main.php';
$response = array("error" => FALSE);
if (isset($_GET['Rid'])) {
    $Rid = filter_input(INPUT_GET, 'Rid');
    $pass = md5($Rid . '1234');
    $p = $user->resetPassword($Rid, $pass);
    if($p == 1){
        $response["error"] = FALSE;
        $response["message"] = "Password telah diubah menjadi default password";
        echo json_encode($response);
    }  else {
        $response["error"] = TRUE;
        $response["message"] = $p;
        echo json_encode($response);
    }

}

