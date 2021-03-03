<?php
require_once './Waybill.php';

class WaybillService
{
    public $waybill;

    public function __construct() {
        $this->waybill = new Waybill();
    }

    public function AddWaybill($waybill){
        return ['id' => 1];
    }

    public function GetAllWaybills(){
        return $this->waybill->getAll();
    }

    public function GetWaybill($date){
        return ['waybill' =>$this->waybill->get($date)];
    }
}
