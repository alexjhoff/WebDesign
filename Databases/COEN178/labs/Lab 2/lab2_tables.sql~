CREATE TABLE Customers(
  custId char(3) PRIMARY KEY,
  first_name char(10),
  last_name char(15),
  city char(10)
);

CREATE TABLE DeliveryService(
  serviceId char(10) PRIMARY KEY,
  item char(15),
  location char(15),
  servicefee numeric(4,2)
);

CREATE TABLE Schedule(
  serviceId char(10),
  custId char(3),
  Sday char(2) CHECK (Sday in ('m','t','w','r','f')),
  FOREIGN KEY (serviceId) REFERENCES DeliveryService (serviceId),
  FOREIGN KEY (custId) REFERENCES Customers (custId)
);
