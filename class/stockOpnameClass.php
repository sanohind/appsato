<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of stockOpnameClass
 *
 * @author Jamal
 */
class stockOpnameClass {

    //declare for db connection
    private $db;
    //declare for table name
    private $tbName = 'so_sttk';

    //make constructor for db
    function __construct($db) {
        $this->db = $db;
    }
    
    public function refnoCheck($prdID,$refno){
        $sql = $this->db->prepare("SELECT COUNT(sttk_id) FROM $this->tbName WHERE sttk_prdid=? and sttk_refno=?");
        try{
            $sql->execute([$prdID,$refno]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $sql->fetchColumn();
    }

    public function insertSttk($prdID, $storage, $loc, $partno, $lotno, $qty, $vdid, $refno, $remark, $uID) {
        $sql = $this->db->prepare("INSERT INTO $this->tbName (sttk_prdid,sttk_storage,sttk_location,sttk_partno,sttk_lotno,sttk_qty,sttk_vendorid,sttk_refno,sttk_remark,sttk_userid)"
                . "VALUES (?,?,?,?,?,?,?,?,?,?)");
        try {
            $sql->execute([$prdID, $storage, $loc, $partno, $lotno, $qty, $vdid, $refno, $remark, $uID]);
        } catch (Exception $e) {
            die();
        }
        if ($sql) {
            return TRUE;
        } else {
            return $e->getMessage();
        }
    }
    
    public function getDataSttk($prdID,$uID){
        if($uID != 'All'){
            $sql = $this->db->prepare("SELECT * FROM $this->tbName WHERE sttk_prdid=? AND sttk_userid=?");
            $sql->bindValue(1, $prdID);
            $sql->bindValue(2, $uID);
        }else{
            $sql = $this->db->prepare("SELECT * FROM $this->tbName WHERE sttk_prdid=?");
            $sql->bindValue(1, $prdID);
        }
        try{
            $sql->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }
}