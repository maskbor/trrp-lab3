<?php
require_once './Waybill.php';

class WaybillService
{
    public $waybill;

    public function __construct() {
        $this->waybill = new Waybill();
    }

    public function AddWaybill($waybill){
        return ['id' => $this->waybill->save($waybill->Waybill)];
    }

    public function GetAllWaybills(){
        return $this->waybill->getAll();
    }

    public function GetWaybill($date){
        return [$this->waybill->get($date)];
    }
}
