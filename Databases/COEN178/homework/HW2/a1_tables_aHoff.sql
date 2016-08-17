CREATE TABLE MealItem(
  itemId char(6),
  name char(15),
  price number(5,2),
  calories int,
  CONSTRAINT calories CHECK (calories < 500 AND calories >= 0),
  PRIMARY KEY (itemId)
);

CREATE TABLE MealMenu(
  menuId char(6),
  itemId char(6),
  mealType char(8),
  CONSTRAINT mealType CHECK (mealType = 'B' OR mealType = 'L' OR mealType = 'D'),
  PRIMARY KEY (menuId),
  FOREIGN KEY (itemId) REFERENCES MealItem(itemId)
);

CREATE TABLE Customer(
  acctId char(6),
  name char(15),
  phone int,
  PRIMARY KEY (acctId)
);

CREATE TABLE MealOrder(
  acctId char(6),
  menuId char(6),
  startDate date,
  endDate date,
  PRIMARY KEY (acctId, menuId),
  FOREIGN KEY (acctId) REFERENCES Customer(acctId),
  FOREIGN KEY (menuId) REFERENCES MealMenu(menuId)
);
