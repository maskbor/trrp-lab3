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
        $conn = new SQLite3('lab2.db');
        if (!$conn)
            exit("Не удалось создать/открыть базу данных SQLite");
        $insert = "INSERT INTO waybill VALUES (
            :date, 
            :region,
            :adress_from,
            :adress_to,
            :vehicles,
            :reg_number,
            :fuel,
            :odometer,
            :responsible,
            :phone,
            :winter_highway,
            :winter_city,
            :summer_highway,
            :summer_city,
            :fuel_add,
            :fuel_start,
            :fuel_end,
            :odometer_start,
            :odometer_end,
            :is_city,	
            :comment
            );
        ";
$stmt = $conn->prepare($insert);
$bind_par = array(
    ':date'                =>  $waybill->date, 
    ':region'              =>  $waybill->region,
    ':adress_from'         =>  $waybill->adress_from,
    ':adress_to'           =>  $waybill->adress_to,
    ':vehicles'            =>  $waybill->vehicles,
    ':reg_number'          =>  $waybill->reg_number,
    ':fuel'                =>  $waybill->fuel,
    ':odometer'            =>  $waybill->odometer,
    ':responsible'         =>  $waybill->responsible,
    ':phone'               =>  $waybill->phone,
    ':winter_highway'      =>  $waybill->winter_highway,
    ':winter_city'         =>  $waybill->winter_city,
    ':summer_highway'      =>  $waybill->summer_highway,
    ':summer_city'         =>  $waybill->summer_city,
    ':fuel_add'            =>  $waybill->fuel_add,
    ':fuel_start'          =>  $waybill->fuel_start,
    ':fuel_end'            =>  $waybill->fuel_end,
    ':odometer_start'      =>  $waybill->odometer_start,
    ':odometer_end'        =>  $waybill->odometer_end,
    ':is_city'             =>  $waybill->is_city,	
    ':comment'             =>  $waybill->comment
);
foreach($bind_par as $key=>$val)
    $stmt->bindValue($key, $val);

$stmt->execute();
/*
ob_start();
var_dump($conn->lastInsertRowID());
file_put_contents('log', ob_get_clean());
        die;*/

return $conn->lastInsertRowID();
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
            $sql = "select * from waybill where waybill.date = '$date->date'";
        $result = $db_sqlite->query($sql);
        ob_start();
var_dump($sql);
file_put_contents('log', ob_get_clean());
        $rows = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $rows[] = $row;
        }
        return $rows;
    }
}
