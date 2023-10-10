<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'config/connect.php';

function my_autoload($class) {
    $filename = 'class/' . $class . '.php';
    include_once $filename;
}

spl_autoload_register('my_autoload');

try {
    $user   = new userClass($db);
    $part   = new partClass($db);
    $cust   = new customerClass($db);
    $hstp   = new historyClass($db);

} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
