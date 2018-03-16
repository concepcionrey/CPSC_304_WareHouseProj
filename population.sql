CREATE DATABASE warehousProj;

CREATE TABLE City 
(CID int not null,
name varchar(40) not null,
country varchar(40) null,
region varchar(40) null,
Primary key (CID));

CREATE TABLE Client_Lives_In 
(CLID int not null,
CID int not null,
billingAddress varchar(255) not null,
Name varchar(255) null,
creditCardNum varchar(255) null,
Email varChar(255) null,
cellnum varchar(255) null,
Primary key (CLID),
Foreign key (CID) references City
ON DELETE CASCADE);

CREATE TABLE Item (
IID varchar(40) not null,
category varchar(40) not null,
name varchar(40) not null,
price FLOAT(20) not null,
supplierCode varchar(40) not null,
itemStock int not null,
PRIMARY KEY(IID));

CREATE TABLE Warehouse_Located (
WID int  not null,
CID int  not null,
streetName varchar(20) null,
postalCode varchar(7) null,
numOfEmployees int null,
numOfForklift int null,
Primary key (WID),
Foreign key (CID) references City 
ON DELETE CASCADE);

CREATE TABLE Order_Makes (
CLID int not null,
OD   int not null,
isShipped varchar(5) null,
ShippingAddress varchar (20) null,
DesiredTime varchar(255) null,
ExpectedDeliveryTime varchar(255) null,
IsDelivered varchar(5) null,
Primary key (CLID, OD),
FOREIGN KEY (CLID) references Client_Lives_In ON DELETE CASCADE);


CREATE TABLE STORES 
(WID int  not null,
IID varchar(40)  not null,
Primary key (WID, IID),
Foreign key (WID) references Warehouse_Located ON DELETE CASCADE,
Foreign key (IID) references Item ON DELETE CASCADE); 

CREATE TABLE CONTAINS 
(IID varchar(40)  not null,
CLID int  not null,
OD int  not null,
Primary key (IID, CLID, OD),
Foreign key (IID) references Item ON DELETE CASCADE,
Foreign key (CLID, OD) references Order_Makes ON DELETE CASCADE);


INSERT INTO City
(CID, Name, Region, Country)
VALUES
(00000001, 'North Vancouver', 'British Columbia', 'Canada');

INSERT INTO City
(CID, Name, Region, Country)
VALUES
(00000002, 'Richmond', 'British Columbia', 'Canada');

INSERT INTO City
(CID, Name, Region, Country)
VALUES
(00000003, 'Burnaby', 'British Columbia', 'Canada');

INSERT INTO City
(CID, Name, Region, Country)
VALUES
(00000004, 'Makati City', 'Manila', 'Philippines');

INSERT INTO City
(CID, Name, Region, Country)
VALUES
(00000005, 'Abbotsford', 'British Columbia', 'Canada');

INSERT INTO Client_Lives_In
(CLID, CID, billingAddress, Name, creditCardNum, Email, cellnum)
VALUES
(10000000, 00000001, '2451 Westhill Court, West Vancouver, BC, A3K 2F4', 'Natalie Chen', '11114444090958367', 'chennat@yahoo.com', '6042910876');

INSERT INTO Client_Lives_In
(CLID, CID, billingAddress, Name, creditCardNum, Email, cellnum)
VALUES
(20000000, 00000002, '1234 Francis Road, Richmond, BC, F9T 2W4', 'Ash Ketchum', '1024567820394563', 'pikachu@hotmail.com', '7786450098');

INSERT INTO Client_Lives_In
(CLID, CID, billingAddress, Name, creditCardNum, Email, cellnum)
VALUES
(30000000, 00000003, '1456 3rd Street, Burnaby, BC, J9T 4F9', 'Ted Mosby', '2222567800003456', 'mosbius0101@gmail.com', '6045698754');

INSERT INTO Client_Lives_In
(CLID, CID, billingAddress, Name, creditCardNum, Email, cellnum)
VALUES
(40000000, 00000004, '5690, Manga Street, Makati City, Manila, I1P 1B5', 'Michael Smith', '7541110905942345', 'msmith24@yahoo.com', '7782233450');

INSERT INTO Client_Lives_In
(CLID, CID, billingAddress, Name, creditCardNum, Email, cellnum)
VALUES
(50000000, 00000005, '2341, Moric Road, Abbotsford, BC, U7T 2W1', 'Bruce Wayne', '1234567890987654', 'wayne_industries@gmail.com', '6041239900');



INSERT INTO Item
(IID, category, name, price, supplierCode, itemStock)
VALUES
(10000001, 'Appliances000', 'Humidifier', 57.60, 12345, 695);

INSERT INTO Item
(IID, category, name, price, supplierCode, itemStock)
VALUES
(20000002, 'Toys', 'Solar Glasses', 5.25, 40987, 4025);

INSERT INTO Item
(IID, category, name, price, supplierCode, itemStock)
VALUES
(30000003, 'Thingies', 'Expensive thingy', 169.69, 50345, 515);

INSERT INTO Item
(IID, category, name, price, supplierCode, itemStock)
VALUES
(40000004, 'Electronics', '58 Smart LED Tv', 840.00, 43340, 40);

INSERT INTO Item
(IID, category, name, price, supplierCode, itemStock)
VALUES
(50000005, 'Furniture', 'Couch', 85.89, 22111, 854);

INSERT INTO Order_Makes
(CLID, OD, isShipped, shippingAddress, desiredTime, ExpectedDeliveryTime, isDelivered)
VALUES
(10000000, 32458745, 1, 'Y4N 7F3', '13:00', '14:00', 'FALSE');

INSERT INTO Order_Makes
(CLID, OD, isShipped, shippingAddress, desiredTime, ExpectedDeliveryTime, isDelivered)
VALUES
(20000000, 66984248, 0, 'P0B 1D3', '9:00', '19:00', 'FALSE');

INSERT INTO Order_Makes
(CLID, OD, isShipped, shippingAddress, desiredTime, ExpectedDeliveryTime, isDelivered)
VALUES
(30000000, 98486248, 0, 'T2L 1Z6', '18:00', '14:00', 'FALSE');

INSERT INTO Order_Makes
(CLID, OD, isShipped, shippingAddress, desiredTime, ExpectedDeliveryTime, isDelivered)
VALUES
(40000000, 22258748, 1, 'V0N 1U2', '10:00', '10:30', 'FALSE');

INSERT INTO Order_Makes
(CLID, OD, isShipped, shippingAddress, desiredTime, ExpectedDeliveryTime, isDelivered)
VALUES
(50000000, 96584125, 1, 'V0N 1U2', '13:00', '11:00', 'TRUE');

INSERT INTO Warehouse_Located 
(WID, CID, streetName, postalCode, numofEmployees, numOfForklift)
VALUES
(4001, 00000001, 'Contigo', 'F3W 0T3', 30, 10);

INSERT INTO Warehouse_Located 
(WID, CID, streetName, postalCode, numofEmployees, numOfForklift)
VALUES
(4002, 00000002, 'Aquafina', 'H3F 9V2', 10, 2);

INSERT INTO Warehouse_Located 
(WID, CID, streetName, postalCode, numofEmployees, numOfForklift)
VALUES
(4003, 00000003, 'Chestnut', 'V3D 0Z2', 50, 40);

INSERT INTO Warehouse_Located 
(WID, CID, streetName, postalCode, numofEmployees, numOfForklift)
VALUES
(4004, 00000004, 'Sundowner', 'F7P 3Y4', 125, 45);

INSERT INTO Warehouse_Located 
(WID, CID, streetName, postalCode, numofEmployees, numOfForklift)
VALUES
(4005, 00000005, 'Walnut', 'H3R 6V5', 82, 30);

INSERT INTO STORES
(WID, IID)
VALUES
(4001, 10000001);

INSERT INTO STORES
(WID, IID)
VALUES
(4002, 20000002);

INSERT INTO STORES
(WID, IID)
VALUES
(4003, 30000003);

INSERT INTO STORES
(WID, IID)
VALUES
(4004, 40000004);

INSERT INTO STORES
(WID, IID)
VALUES
(4005, 50000005);

INSERT INTO CONTAINS
(IID, CLID, OD)
VALUES
(10000001, 10000000, 32458745);

INSERT INTO CONTAINS
(IID, CLID, OD)
VALUES
(20000002, 20000000, 66984248);

INSERT INTO CONTAINS
(IID, CLID, OD)
VALUES
(30000003, 30000000, 98486248);

INSERT INTO CONTAINS
(IID, CLID, OD)
VALUES
(40000004, 40000000, 22258748);

INSERT INTO CONTAINS
(IID, CLID, OD)
VALUES
(50000005, 50000000, 96584125);








