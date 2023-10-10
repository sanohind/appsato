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
class customerClass {
    private $db;
    //declare for table name
    private $tbName = 'mastercostumer';

    //make constructor for db
    function __construct($db) {
        $this->db = $db;
    }

    //function count all record
    public function countRecord(){
        $sql    = $this->db->prepare("SELECT COUNT(CostumerID) FROM $this->tbName");
        try{
            $sql->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $sql->fetchColumn();
    }

    public function getDataCustomer() {
        $sql = $this->db->prepare("SELECT * FROM $this->tbName");
        try {
            $sql->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCustomerbyID($id) {
        $sql = $this->db->prepare("SELECT * FROM $this->tbName WHERE CostumerID=?");
        //$sql->bindValue(1, $id);
        try {
            $sql->execute([$id]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $sql->fetch(PDO::FETCH_OBJ);
    }
}