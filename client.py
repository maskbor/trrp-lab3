import zeep

wsdl = 'http://localhost/TRRP_lab3/server.php?WSDL'

client = zeep.Client(wsdl=wsdl)
waybill = client.get_element('ns0:Waybill')
obj = waybill(
    date = '2020-02-02 00:00:00', 
    region = '', 
    adress_from = '', 
    adress_to = '', 
    vehicles = '', 
    reg_number = '', 
    fuel = 10, 
    odometer = 15000, 
    responsible = '', 
    phone = '', 
    winter_highway = 10, 
    winter_city = 11, 
    summer_highway = 9, 
    summer_city = 10, 
    fuel_add = 0, 
    fuel_start = 10, 
    fuel_end= 4,
    odometer_start = 14880, 
    odometer_end = 15000, 
    is_city = 0,
    comment = '')

print(client.service.AddWaybill(Waybill=obj))
print(client.service.GetAllWaybills())
print(client.service.GetWaybill(date='2020-06-19'))

