INSERT INTO MealItem VALUES('1', 'oatmeal', 3.00, 120);
INSERT INTO MealItem VALUES('2', 'fruit_plate', 7.50, 220);
INSERT INTO MealItem VALUES('3', 'steak', 20.99, 420);
INSERT INTO MealItem VALUES('4', 'chicken pie', 12.50, 350);
INSERT INTO MealItem VALUES('5', 'broccoli pie', 10.00, 200);
INSERT INTO MealItem VALUES('6', 'pasta', 12.00, 250);
INSERT INTO MealItem VALUES('7', 'sandwich', 8.00, 200);

INSERT INTO MealMenu VALUES('M1', '1', 'B');
INSERT INTO MealMenu VALUES('M2', '2', 'L');
INSERT INTO MealMenu VALUES('M3', '1', 'L');
INSERT INTO MealMenu VALUES('M4', '4', 'D');
INSERT INTO MealMenu VALUES('M5', '5', 'D');
INSERT INTO MealMenu VALUES('M6', '6', 'D');
INSERT INTO MealMenu VALUES('M7', '7', 'D');

INSERT INTO Customer VALUES('A1', 'Smith', '4085551212');
INSERT INTO Customer VALUES('A4', 'Jones', '4085554444');
INSERT INTO Customer VALUES('A2', 'Clark', '4083331212');
INSERT INTO Customer VALUES('A6', 'Chen', '4086661212');
INSERT INTO Customer VALUES('A9', 'Mayer', '4086661212');
INSERT INTO Customer VALUES('A10', 'Smith', '4085551212');
INSERT INTO Customer VALUES('A3', 'Hernandez', '4087771212');
INSERT INTO Customer VALUES('A8', 'Hill', '4082221212');

INSERT INTO MealOrder VALUES('A1', 'M1', date '2016-01-10', date '2016-01-16');
INSERT INTO MealOrder VALUES('A1', 'M2', date '2016-01-10', date '2016-01-16');
INSERT INTO MealOrder VALUES('A2', 'M3', date '2016-02-10', date '2016-02-26');
INSERT INTO MealOrder VALUES('A2', 'M1', date '2016-03-11', date '2016-03-26');
INSERT INTO MealOrder VALUES('A4', 'M5', date '2016-04-07', date '2016-05-07');
INSERT INTO MealOrder VALUES('A6', 'M4', date '2016-05-10', date '2016-06-16');
INSERT INTO MealOrder VALUES('A8', 'M6', date '2016-06-15', date '2016-06-23');

SELECT * FROM MealItem;
SELECT * FROM MealMenu;
SELECT * FROM Customer;
SELECT * FROM MealOrder;