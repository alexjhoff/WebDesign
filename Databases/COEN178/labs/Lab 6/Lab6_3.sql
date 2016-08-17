Create Or Replace Trigger Display_Acct_Trig
AFTER INSERT ON Accounts_6
DECLARE
	CURSOR display_cur IS
	    Select * from Accounts_6 Natural Join Bankcust_6;
BEGIN
/* Using a for loop, you can access the records fetched 
	By the cursor. No activation, or exiting the loop is
	Necessary with a for loop.
*/
	FOR v_rec in display_cur LOOP
		DBMS_OUTPUT.put_line(v_rec.custname || ','||v_rec.city||','||v_rec.accountno||','||v_rec.amount);
	END Loop;
END Display_Acct_Trig;
/
Show Errors;