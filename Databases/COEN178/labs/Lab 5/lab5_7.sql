CREATE OR REPLACE TRIGGER orders_cancelled
AFTER DELETE
   ON order_5
   FOR EACH ROW
BEGIN
  insert into DeletedOrder values(:old.orderno,:old.amount);

END;
/
show errors;