<?php


$config = array(
      'host' => '10.1.10.104\sqlexpress',
      'username' => 'sa',
      'password' => 'S@n0h123',
      'dbname' => 'printinglabel'
    
    );

//$db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'] , $config['username'] , $config['password']);
$db = new PDO("sqlsrv:Server=". $config['host'] .";Database=". $config['dbname'] , $config['username'] , $config['password']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
