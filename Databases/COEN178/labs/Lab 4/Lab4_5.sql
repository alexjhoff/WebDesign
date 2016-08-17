-- A PLSQL block of code to extract Customer Name,city and display them.  
DECLARE 
	-- Variable Declarations
        l_name Cust_5.custname%type;
	l_city Cust_5.city%type;	
-- executable part from BEGIN to END

BEGIN
	Select custname,city into l_name,l_city  from CUST_5
	where custno = 'c1';
	-- output the result
	DBMS_OUTPUT.PUT_LINE('Customer Name = '|| l_name);
	DBMS_OUTPUT.PUT_LINE('City = '|| l_city);
END;
/
show errors;