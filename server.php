<?php
require_once './WaybillService.php';

ini_set("soap.wsdl_cache_enabled","0");

$server=new SoapServer("Waybill.wsdl");

$server->setClass("WaybillService");

$server->handle();