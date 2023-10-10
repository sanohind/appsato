<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require '../main.php';

//json response
//$response = array("error" => FALSE);

if (ISSET($_GET['prdID']) && ISSET($_GET['uID'])) {
    $tkn = filter_input(INPUT_GET, 'token');
    $uID = filter_input(INPUT_GET, 'uID');
    $prdID = filter_input(INPUT_GET, 'prdID');

    $auth = $token->cekToken($tkn);
    if ($auth == TRUE) {
        $data = $stk->getDataSttk($prdID, $uID);
        //$response["error"] = FALSE;
        $response["data"] = $data;
        echo json_encode($response);
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
