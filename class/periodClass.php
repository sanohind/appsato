<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of periodClass
 *
 * @author Jamal
 */
class periodClass {

    //declare for db connection
    private $db;
    //declare for table name
    private $tbName = 'so_period';

    //make constructor for db
    function __construct($db) {
        $this->db = $db;
    }
    
    //function count all record
    public function countRecord(){
        $sql    = $this->db->prepare("SELECT COUNT(prd_id) FROM $this->tbName");
        try{
            $sql->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $sql->fetchColumn();
    }

    public function getDataPeriod() {
        $sql = $this->db->prepare("SELECT * FROM $this->tbName ");
        try {
            $sql->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }

    public function createPeriod($prdID, $prdTA, $prdTR, $prdDesc) {
        $sql = $this->db->prepare("INSERT INTO $this->tbName VALUES (?,?,?,?,?)");
        try {
            $sql->execute([$prdID,$prdTA,$prdTR,$prdDesc,"O"]);
            return TRUE;
        } catch (Exception $e) {
            return $e->getMessage();
            die();
        }
    }
    
    public function finishPeriod($prdID) {
        $sql = $this->db->prepare("UPDATE $this->tbName SET prd_status='F' WHERE prd_id = ?");
        try {
            $sql->execute([$prdID]);
            //header('location:formperiod.php?state=ok');
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function getAktifPeriod(){
        $sql = $this->db->prepare("SELECT * FROM $this->tbName WHERE prd_status='O'");
        try {
            $sql->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }
        
}
