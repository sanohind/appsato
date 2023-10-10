<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require '../main.php';

//json response
$response = array("error" => FALSE);

//memastikan parameter lengkap
if (isset($_GET['uID']) && isset($_GET['password'])) {
    //tangkap variabel dari aplikasi dengan method GET
    $tkn = filter_input(INPUT_GET, 'token');
    $uID = filter_input(INPUT_GET, 'uID');
    $pass = md5(filter_input(INPUT_GET, 'password'));

    $auth = $token->cekToken($tkn);
    if ($auth == TRUE) {

        //cek apakah data tersedia di database
        $cek = $user->getUserID($uID);
        //jika data ada
        if ($cek != FALSE) {
            $passwd = $user->getUserPass($uID);

            //jika password benar set session dengan user_id
            if ($pass === $passwd->user_password) {
                $response["error"] = FALSE;
                $response["message"] = "Login sukses!!!";
                $response["session"] = $uID;
                echo json_encode($response);
            } else {                                          //jika password salah kasih error
                $response["error"] = TRUE;
                $response["message"] = "Password salah. Periksa kembali password anda!!!";
                echo json_encode($response);
            }
        } else {                                              //jika tidak ada
            $response["error"] = TRUE;
            $response["message"] = "User ID belum terdaftar!!!";
            echo json_encode($response);
        }
    } else {
        $response["error"] = TRUE;
        $response["message"] = "401";
        echo json_encode($response);
        header("location:index.php");
    }
} else {                                                 //jika parameter tidak lengkap berikan error
    $response["error"] = TRUE;
    $response["message"] = "Parameter tidak lengkap!!!";
    echo json_encode($response);
}

