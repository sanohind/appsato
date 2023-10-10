<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tokenClass
 *
 * @author Jamal
 */
class tokenClass {

    //declare for db connection
    private $db;
    //declare for table name
    private $tbName = 'so_token';

    //make constructor for db
    function __construct($db) {
        $this->db = $db;
    }

    public function generateToken($usermail, $username, $desc, $time) {
        // Buat Array untuk header lalu convert menjadi JSON
        $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
        // Encode header menjadi Base64Url String
        $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));

        // Buat Array payload lalu convert menjadi JSON
        $payload = json_encode(['userId' => $usermail , 'userName' => $username]);
        // Encode Payload menjadi Base64Url String
        $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

        // Buat Signature dengan metode HMAC256
        $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, 'kiyokunindo', true);
        // Encode Signature menjadi Base64Url String
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
         // Gabungkan header, payload dan signature dengan tanda titik (.)
        //$jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
        $token = substr($base64UrlHeader,-15).substr($base64UrlPayload,-15).substr($base64UrlSignature,-15);
        
        switch ($time){
            case "1" :
                $expired = date('Y-m-d 23:59:59', strtotime(date('Y-m-d H:i:s'))+(7*86400));
                break;
            case "2" :
                $expired = date('Y-m-d 23:59:59', strtotime(date('Y-m-d H:i:s'))+(15*86400));
                break;
            case "3" :
                $expired = date('Y-m-d 23:59:59', strtotime(date('Y-m-d H:i:s'))+(30*86400));
                break;
            case "4" :
                $expired = date('Y-m-d 23:59:59', strtotime(date('Y-m-d H:i:s'))+(60*86400));
                break;
            case "5" :
                $expired = date('Y-m-d 23:59:59', strtotime(date('Y-m-d H:i:s'))+(90*86400));
                break;
            default :
                 $expired = '2075-12-31 23:59:59';
        }
        
        $sql = $this->db->prepare("INSERT INTO $this->tbName VALUES (?,?,?,?,?,?)");
        try {
            $sql->execute([$usermail,$username,$token,date('Y-m-d H:i:s'),$expired,$desc]);
            return TRUE;
        } catch (Exception $e) {
            return $e->getMessage();
            die();
        }
    }
    
    public function showToken($usermail){
        $sql = $this->db->prepare("SELECT * FROM $this->tbName WHERE tkn_usermail = ?");
        $sql->bindValue(1, $usermail);
        try {
            $sql->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $sql->fetch(PDO::FETCH_OBJ);
    }
    
    public function cekToken($token){
        $sql = $this->db->prepare("SELECT tkn_token FROM $this->tbName WHERE tkn_token = ?");
        $sql->bindValue(1, $token);
        try {
            $sql->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
        $q = $sql->fetch();
        if ($q > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function getDataToken(){
        $sql = $this->db->prepare("SELECT * FROM $this->tbName");
        //$sql->bindValue(1, $usermail);
        try {
            $sql->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }
}
