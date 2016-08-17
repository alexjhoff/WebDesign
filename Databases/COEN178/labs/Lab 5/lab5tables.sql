Drop table ORDER_5;
DROP table CUST_5;
Drop table DeletedOrder;

Create table CUST_5 (
  CUSTNo VARCHAR(5) Primary Key, 
  custname VARCHAR(20),
  city VARCHAR(20)
);

Create table ORDER_5 (
  OrderNo VARCHAR(5) Primary Key,
  amount NUMBER(10,2),
  custno VARCHAR(5),
  CONSTRAINT order_fkey FOREIGN Key (custno)REFERENCES CUST_5(custno)
);

Create table DeletedOrder (
  OrderNo VARCHAR(5),
  amount NUMBER(10,2)
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