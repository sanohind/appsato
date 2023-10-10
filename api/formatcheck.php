<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require '../main.php';
$response = array("error" => FALSE);
if (isset($_GET['code'])) {
    $tkn = filter_input(INPUT_GET, 'token');
    $code = filter_input(INPUT_GET, 'code');

    $auth = $token->cekToken($tkn);
    if ($auth == TRUE) {
        $limiter = "|";
        $limCount = substr_count($code, $limiter);
        if ($limCount == 6) {
            $extract = explode("|", $code);
            $dataCount = 0;
            foreach ($extract as $data) {
                switch (substr($data, 0, 2)) {
                    case "Z1" :
                        $partno = substr($data, 2);
                        $dataCount++;
                        break;
                    case "Z2" :
                        $lotno = substr($data, 2);
                        $dataCount++;
                        break;
                    case "Z3" :
                        $qty = substr($data, 2);
                        $dataCount++;
                        break;
                    case "Z4" :
                        $remark = substr($data, 2);
                        $dataCount++;
                        break;
                    case "Z5" :
                        $ref = substr($data, 2);
                        $dataCount++;
                        break;
                    case "Z6" :
                        $spare = substr($data, 2);
                        $dataCount++;
                        break;
                    case "Z7" :
                        $vendor = substr($data, 2);
                        $dataCount++;
                        break;
                }
            }
            //echo $dataCount;
            //if ($partno <> '' || $lotno <> '' || $qty <> '' || $ref <> '' || $vendor <> '') 
            if ($dataCount != 0) {
                $result = array(
                    'partno' => $partno,
                    'lotno' => $lotno,
                    'qty' => $qty,
                    'remark' => $remark,
                    'reference' => $ref,
                    'vendor' => $vendor
                );

                $response["error"] = FALSE;
                $response["partno"] = $partno;
                $response["lotno"] = $lotno;
                $response["qty"] = $qty;
                $response["remark"] = $remark;
                $response["ref"] = $ref;
                $response["vendor"] = $vendor;
                //$response = $result;
                echo json_encode($response);
            } else {
                $response["error"] = TRUE;
                $response["message"] = "406";
                //406->Not Acceptable
                //$response["message"] = "Data tidak ditemukan!!!";
                echo json_encode($response);
            }
        } else {
            $response["error"] = TRUE;
            $response["message"] = "412";
            //412->precondition failed
            //$response["message"] = "Format data tidak mendukung";
            echo json_encode($response);
        }
    } else {
        $response["error"] = TRUE;
        $response["message"] = "401";
        echo json_encode($response);
        //header("location:index.php");
    }
} else {
    $response["error"] = TRUE;
    $response["message"] = "405";
    //405->method not allowed
    //$response["message"] = "Parameter tidak lengkap!!!";
    echo json_encode($response);
}

