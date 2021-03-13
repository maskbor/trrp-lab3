import zeep

client = zeep.Client(wsdl='http://localhost/TRRP_lab3/server.php?WSDL')
waybill = client.get_element('ns0:Waybill')

def create():
    obj = waybill(
        date = input('Дата: '), 
        region = input('Регион: '), 
        adress_from = input('Адрес от: '), 
        adress_to = input('Адрес до: '), 
        vehicles = input('ТС: '), 
        reg_number = input('Рег. номер ТС: '), 
        fuel = input('Топливо: '), 
        odometer = input('Показания одометра: '), 
        responsible = input('Ответственный: '), 
        phone = input('Номер телефона: '), 
        winter_highway = 10, 
        winter_city = 11, 
        summer_highway = 9, 
        summer_city = 10, 
        fuel_add = input('Заправлено: '), 
        fuel_start = input('Показания топлива при выезде: '), 
        fuel_end= input('Показания топлива при въезде: '),
        odometer_start = input('Показания одометра при выезде: '), 
        odometer_end = input('Показания одометра при въезде: '), 
        is_city = 0,
        comment = input('Коментарий: ')
    )
    print(client.service.AddWaybill(Waybill=obj))

def find():
    print(client.service.GetWaybill(date=input('Введите дату \n') ))

def printAll():
    print(client.service.GetAllWaybills())

n = input('\n1-добавить\n2-Вывести все\n')

while True:
    if n == '1':
        create()
    if n == '2':
        printAll()
        
    n = input('\n1-добавить\n2-Вывести все\n')