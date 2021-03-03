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

    /*public function __construct($date, $region, $adress_from, $adress_to, $vehicles, $reg_number, $fuel, $odometer, $responsible, $phone, $winter_highway, $winter_city, $summer_highway, $summer_city, $fuel_add, $fuel_start, $fuel_end, $odometer_start, $odometer_end, $is_city, $comment) {
        $this->date = $date;
        $this->region = $region;
        $this->adress_from = $adress_from;
        $this->adress_to = $adress_to;
        $this->vehicles = $vehicles;
        $this->reg_number = $reg_number;
        $this->fuel = $fuel;
        $this->odometer = $odometer;
        $this->responsible = $responsible;
        $this->phone = $phone;
        $this->winter_highway = $winter_highway;
        $this->winter_city = $winter_city;
        $this->summer_highway = $summer_highway;
        $this->summer_city = $summer_city;
        $this->fuel_add = $fuel_add;
        $this->fuel_start = $fuel_start;
        $this->fuel_end = $fuel_end;
        $this->odometer_start = $odometer_start;
        $this->odometer_end = $odometer_end;
        $this->is_city = $is_city;
        $this->comment = $comment;
    }*/

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
