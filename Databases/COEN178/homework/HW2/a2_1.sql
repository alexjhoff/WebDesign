CREATE OR REPLACE PROCEDURE addMealOrder(
  acct_pro IN MealOrder.acctId%type, 
  menu_pro IN MealOrder.menuId%type, 
  start_pro IN MealOrder.startDate%type,
  end_pro IN MealOrder.endDate%type)
AS
BEGIN
  INSERT INTO MealOrder (acctId, menuId, startDate, endDate) 
		 VALUES (acct_pro, menu_pro, start_pro, end_pro);
END;
/
show errors;