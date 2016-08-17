Create Or Replace Trigger UpdateAccounts_Trig
AFTER INSERT ON BillPay_6
FOR EACH ROW
BEGIN
    Update Accounts_6
	set amount = amount - :NEW.amount
	where accountNo = :NEW.accountNo;

END UpdateAccounts_Trig;
/
Show Errors;