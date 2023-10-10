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
class historyClass {
    private $db;
    //declare for table name
    private $tbName = 'historyprint';

    //make constructor for db
    function __construct($db) {
        $this->db = $db;
    }

    //function count all record
    public function countRecord(){
        $sql    = $this->db->prepare("SELECT COUNT(rowID) FROM $this->tbName");
        try{
            $sql->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $sql->fetchColumn();
    }

    public function getDataHistoryGraph() {
        $sql = $this->db->prepare("select month(proddate) 'month',COUNT(rowID) 'total' FROM [PrintingLabel].[dbo].[HistoryPrint]
        where year(PrintDate) = ?
        group by month(proddate)
        order by 1 asc");
        try {
            $sql->execute([date('Y')]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
        $fetch = $sql->fetchAll();
        return $fetch;
        // $month = array();
        // $value = array();
        // foreach($fetch as $row)
        // {
        //     array_push($month, $row->month);
        //     array_push($value, $row->total);
        // }

        // $data['month'] = $month;
        // $data['value'] = $value;

        // return $data;
    }

}