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
class userClass {

    //declare for db connection
    private $db;
    //declare for table name
    private $tbName = 'masteruser';

    //make constructor for db
    function __construct($db) {
        $this->db = $db;
    }

    //function count all record
    public function countRecord() {
        $sql = $this->db->prepare("SELECT COUNT(ID) FROM $this->tbName");
        try {
            $sql->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $sql->fetchColumn();
    }

    public function getUserID($id) {
        $sql = $this->db->prepare("SELECT ID FROM $this->tbName WHERE ID=?");
        $sql->bindValue(1, $id);
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

    public function getUserPass($id) {
        $sql = $this->db->prepare("SELECT password FROM $this->tbName WHERE ID=?");
        $sql->bindValue(1, $id);
        try {
            $sql->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $sql->fetch(PDO::FETCH_OBJ);
    }

    public function registerUser($uID, $uName, $uDept, $uRem, $uRight) {
        $sql = $this->db->prepare("INSERT INTO $this->tbName VALUES (?,?,?,?,?,?,?,?,?)");
        $date = date('Y-m-d H:i:s');
        $img = '../lib/img/user.png';
        $pass = md5($uID . '1234');
        try {
            $sql->execute([$uID, $uName, $pass, $uDept, $date, $date, $uRem, $uRight, $img]);
            return TRUE;
        } catch (Exception $e) {
            return $e->getMessage();
            die();
            //return $e->getMessage();
        }
    }

    public function getDataUser() {
        $sql = $this->db->prepare("SELECT * FROM $this->tbName WHERE ID<>'001'");
        //$sql->bindValue(1, $id);
        try {
            $sql->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }

    public function resetPassword($uID, $pass) {
        $sql = $this->db->prepare("UPDATE $this->tbName SET password=? WHERE ID=?");
        try {
            $sql->execute([$pass, $uID]);
            return TRUE;
        } catch (Exception $e) {
            return $e->getMessage();
            die();
        }
    }

    public function getUserbyID($id) {
        $sql = $this->db->prepare("SELECT * FROM $this->tbName WHERE ID=?");
        //$sql->bindValue(1, $id);
        try {
            $sql->execute([$id]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $sql->fetch(PDO::FETCH_OBJ);
    }

}
