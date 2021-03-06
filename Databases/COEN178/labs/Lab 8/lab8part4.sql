CREATE OR REPLACE TRIGGER SuperTest
FOR INSERT OR UPDATE
ON SUPERVISOR
COMPOUND TRIGGER
  
   /* Declaration Section*/
  v_MAX_Rental CONSTANT INTEGER := 3;
       v_CurNum INTEGER := 1;
 	 v_sup VARCHAR(5);
  
   --ROW level
  BEFORE EACH ROW IS
  BEGIN
  	v_sup := :NEW.EmpNo;
  END BEFORE EACH ROW;
  
   --Statement level
  AFTER STATEMENT IS
  BEGIN
  SELECT COUNT(*) INTO v_CurNum FROM SUPERVISOR
  		WHERE EmpNo = v_sup Group by EmpNo;
  
  		IF v_CurNum  > v_MAX_Rental THEN
  			RAISE_APPLICATION_ERROR(-20000,'Only 3 rentals for supervisor');
  		END IF;
  END AFTER STATEMENT;
  
   END ;
  /