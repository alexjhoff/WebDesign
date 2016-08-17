-- A trigger to insert a tuple into the totals_6 table 
-- when a new customer is created.
 
CREATE or REPLACE TRIGGER insert_total_trig
   AFTER  INSERT on BANKCUST_6
   FOR EACH ROW	
   BEGIN
   -- insert the custno and totalamount into totals_6 table. 


   INSERT INTO  TOTALS_6 values (:new.custno, 00.00);

END insert_total_trig;
/
show errors;
