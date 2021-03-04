<?php
require_once './config.php';

class Waybill
{
    public $date;
    public $region;
    public $adress_from;
    public $adress_to;
    public $vehicles;
    public $reg_number;
    public $fuel;
    public $odometer;
    public $responsible;
    public $phone;
    public $winter_highway;
    public $winter_city;
    public $summer_highway;
    public $summer_city;
    public $fuel_add;
    public $fuel_start;
    public $fuel_end;
    public $odometer_start;
    public $odometer_end;
    public $is_city;
    public $comment;

    public function save($waybill){
        
    }

    public function getAll(){
        $db_sqlite = new SQLite3('lab2.db');
        if (!$db_sqlite)
            exit("Не удалось создать/открыть базу данных SQLite");
        $result = $db_sqlite->query("select * from waybill");
        $rows = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function get($date){
        $db_sqlite = new SQLite3('lab2.db');
        if (!$db_sqlite)
            exit("Не удалось создать/открыть базу данных SQLite");
        $result = $db_sqlite->query("select * from waybill where waybill.date = '$date'");
        return [$result->fetchArray(SQLITE3_ASSOC)];
    }
}
