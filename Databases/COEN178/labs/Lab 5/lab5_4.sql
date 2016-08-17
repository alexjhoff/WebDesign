CREATE OR REPLACE PROCEDURE showCustWithLargeOrders(amount_param IN ORDER_5.amount%type) 
AS
   CURSOR large_cur IS 
   /* Get the custname and city of customers with amount > amount_param in
      ORDER_5 table */
   SELECT custname, city
   FROM cust_5, order_5
   WHERE cust_5.custno = order_5.custno
   AND order_5.amount > amount_param;

   result_rec large_cur%rowtype; 
BEGIN
     /* Open large_cur */
     OPEN large_cur;
LOOP 
	FETCH large_cur INTO result_rec; 
	EXIT WHEN large_cur%NOTFOUND; 
      /* Print the custname and city */
	dbms_output.put_line(result_rec.custname || ' ' || result_rec.city);
END LOOP; 
close large_cur;
END;
/
show errors;