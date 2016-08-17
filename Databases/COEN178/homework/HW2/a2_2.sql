CREATE OR REPLACE FUNCTION mostMealOrders
RETURN varchar IS
str varchar(50);
name_l Customer.name%type;
phone_l Customer.phone%type;

BEGIN
  Select name, phone into name_l,phone_l
  From Customer
  Where acctid in (Select * from (Select acctId
				  From mealorder
				  Group by acctId
				  Order by count(acctId) desc)
		    Where rownum <= 1);
  str := name_l || ' ' || phone_l;
  return str;
END;
/
show errors;