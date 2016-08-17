CREATE OR REPLACE FUNCTION mostCancelled
Return varchar2 is
str_l varchar(50);
name_l cancelledOrders.name%type;
phone_l cancelledOrders.phone%type;

BEGIN
    Select name, phone into name_l, phone_l
    From customer
    Where acctID in (Select * from (Select acctID from cancelledorders
	    Group by acctID
	    Order by count(acctID) desc)
	Where rownum<=1);
    str_l := name_l || ' ' || phone_l;
    RETURN str_l;
END;
/
show errors;