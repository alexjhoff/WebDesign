CREATE OR REPLACE PROCEDURE changeCity
AS
   total_rows number(2);
BEGIN
   UPDATE CUST_5
      SET city = 'SJ'
      WHERE city = 'LA';

   IF sql%notfound THEN
      dbms_output.put_line('no orders selected');
   ELSIF sql%found THEN
      total_rows := sql%rowcount;
      dbms_output.put_line( total_rows || ' orders selected and updated');
   END IF; 
END;
/
show errors;