Create table CUST_5 (
  CUSTNo CHAR(5) Primary Key,
  custname CHAR(20),
  city CHAR(20)
);

Create table ORDER_5 (
  OrderNo CHAR(5) Primary Key,
  amount NUMBER(10,2),
  custno char(5),
CONSTRAINT order_fkey FOREIGN Key (custno)REFERENCES CUST_5(custno)
);

insert into CUST_5 values('c1','Smith','SJ');
insert into CUST_5 values('c2','Jones','SJ');
insert into CUST_5 values('c3','Peters','SFO');
insert into CUST_5 values('c20','Chen','LA');
insert into CUST_5 values('c33','Williams','SFO');

insert into ORDER_5 values('o90',2000.00,'c1');
insert into ORDER_5 values('o91',4000.00,'c1');
insert into ORDER_5 values('o92',12000.00,'c1');
insert into ORDER_5 values('o55',1000.00,'c2');
insert into ORDER_5 values('o56',2000.00,'c2');
insert into ORDER_5 values('o77',44000.00,'c20');
