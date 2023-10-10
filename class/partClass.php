<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userClass
 *
 * @author Jamal
 */
class partClass {
    private $db;
    //declare for table name
    private $tbName = 'masterpart';

    //make constructor for db
    function __construct($db) {
        $this->db = $db;
    }

    //function count all record
    public function countRecord(){
        $sql    = $this->db->prepare("SELECT COUNT(Partno) FROM $this->tbName");
        try{
            $sql->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $sql->fetchColumn();
    }

    public function checkRecord($id){
        $sql    = $this->db->prepare("SELECT COUNT(Partno) FROM $this->tbName WHERE Partno=?");
        try{
            $sql->execute([$id]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $sql->fetchColumn();
    }

    public function getDataPart() {
        $sql = $this->db->prepare("SELECT * FROM $this->tbName");
        try {
            $sql->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }

    public function getPartbyID($id) {
        $sql = $this->db->prepare("SELECT * FROM $this->tbName WHERE Partno=?");
        //$sql->bindValue(1, $id);
        try {
            $sql->execute([$id]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $sql->fetch(PDO::FETCH_OBJ);
    }

    public function updatePart($data){
        $sql = $this->db->prepare("UPDATE $this->tbName SET Partname = :pname, 
                                    model = :model, CostumerID = :cust, 
                                    Value_Header = :header, qty = :qty, 
                                    WARNA = :warna WHERE Partno= :partno");
        try {
            $sql->execute($data);
            return TRUE;
        } catch (Exception $e) {
            return $e->getMessage();
            die();
        }
    }

    public function registerPart($data){
        $sql = $this->db->prepare("INSERT INTO $this->tbName VALUES (?,?,?,?,?,?,?)");
        try {
            $sql->execute($data);
            return TRUE;
        } catch (Exception $e) {
            return $e->getMessage();
            die();
            //return $e->getMessage();
        }
    }
}