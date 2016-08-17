Create Or Replace Trigger Total_By_Cust_trig
AFTER INSERT ON Accounts_6
DECLARE
	/* Declare a cursor to
	Get the Custno and the total amount (sum of amount)
	by Customer no. from ACCOUNTS_6 table
	Complete cursor

	*/
	CURSOR S_stats IS
	  Select custno, sum(amount) as total
	  from Accounts_6
	  group by custno;
	
BEGIN
	FOR v_rec in S_stats LOOP
		Update Totals_6
		/* Update the totalAmount */
		  Set totalAmount = v_rec.total
		  where custno = v_rec.custno;
		
	END Loop;
END Total_By_Cust_trig;
/