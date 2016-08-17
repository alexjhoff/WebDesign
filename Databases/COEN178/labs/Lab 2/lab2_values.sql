INSERT INTO Customers VALUES('c1','John','Smith','SJ');
INSERT INTO Customers VALUES('c2','Mary', 'Jones','SFO');
INSERT INTO Customers VALUES('a1','Vincent','Chen','SJ');
INSERT INTO Customers VALUES('a12','Greg', 'King','SJ');
INSERT INTO Customers VALUES('c7','James','Bond','LA');
INSERT INTO Customers VALUES('x10','Susan','Blogg','SFO');
INSERT INTO Customers VALUES('a3','Bernie','Sanders','SFO');
INSERT INTO Customers VALUES('b7','Donald','Trump','LA');

INSERT INTO DeliveryService VALUES('dsg1','grocery','SJ',25.0);
INSERT INTO DeliveryService VALUES('dsb1','books','SJ',10.0);
INSERT INTO DeliveryService VALUES('dsm2','movies','LA',10.0);
INSERT INTO DeliveryService VALUES('dby3','babygoods','SFO',15.0);
INSERT INTO DeliveryService VALUES('dsg2','grocery','SFO',20.0);
INSERT INTO DeliveryService VALUES('dg5','greengoods','SFO',30.0);
INSERT INTO DeliveryService VALUES('dm3','cars','SJ',50.0);
INSERT INTO DeliveryService VALUES('dgs7','toys','SFO',10.0);

INSERT INTO Schedule VALUES('dsg1','c1','m');
INSERT INTO Schedule VALUES('dsg1','a12','w');
INSERT INTO Schedule VALUES('dby3','x10','f');
INSERT INTO Schedule VALUES('dg5','c1','r');
INSERT INTO Schedule VALUES('dg5','c1','t');
INSERT INTO Schedule VALUES('dg5','c32','t');
INSERT INTO Schedule VALUES('dg6','c2','m');
INSERT INTO Schedule VALUES('ds3','a3','f');