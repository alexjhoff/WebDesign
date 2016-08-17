CREATE TABLE supplier (
    sno varchar(5) PRIMARY KEY,
    sname varchar(15),
    city varchar(10)
);

CREATE TABLE part (
    pno varchar(5) PRIMARY KEY,
    pname varchar(15),
    color varchar(10),
    price numeric(5,2)
);

CREATE TABLE shipment (
    sno varchar(5),
    pno varchar(5),
    quantity integer,
    PRIMARY KEY(sno,pno),
    FOREIGN KEY(sno) REFERENCES supplier(sno),
    FOREIGN KEY(pno) REFERENCES part(pno)
);
