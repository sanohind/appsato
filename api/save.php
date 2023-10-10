<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require '../main.php';

//json response
$response = array("error" => FALSE);

if (ISSET($_GET['prdID']) && ISSET($_GET['uID'])) {
    $tkn = filter_input(INPUT_GET, 'token');
    $vd = filter_input(INPUT_GET, 'vdcode');
    $part = filter_input(INPUT_GET, 'partno');
    $lot = filter_input(INPUT_GET, 'lotno');
    $qty = filter_input(INPUT_GET, 'qty');
    $ref = filter_input(INPUT_GET, 'refno');
    $rem = filter_input(INPUT_GET, 'remark');
    $uID = filter_input(INPUT_GET, 'uID');
    $prdID = filter_input(INPUT_GET, 'prdID');
    $stg = filter_input(INPUT_GET, 'stg');
    $loc = filter_input(INPUT_GET, 'loc');

    $auth = $token->cekToken($tkn);
    if ($auth == TRUE) {
        $cekRef = $stk->refnoCheck($prdID, $ref);
        if ($cekRef == 1) {
            $response["error"] = TRUE;
            $response["message"] = "208";
            //208->already_reported
            //$response["message"] = "Label sudah di scan!!";
            echo json_encode($response);
        } else {
            $p = $stk->insertSttk($prdID, $stg, $loc, $part, $lot, $qty, $vd, $ref, $rem, $uID);
            if ($p == 1) {
                $response["error"] = FALSE;
                $response["message"] = "Data tersimpan";
                echo json_encode($response);
            } else {
                $response["error"] = TRUE;
                $response["message"] = "500";
                //500->internal server error
                //$response["message"] = "Terjadi kesalahan";
                echo json_encode($response);
            }
        }
    } else {
        $response["error"] = TRUE;
        $response["message"] = "401";
        echo json_encode($response);
        header("location:index.php");
    }
} else {
    $response["error"] = TRUE;
    $response["message"] = "405";
    ////405->method not allowed
    //$response["message"] = "Parameter tidak lengkap!!!";
    echo json_encode($response);
}

