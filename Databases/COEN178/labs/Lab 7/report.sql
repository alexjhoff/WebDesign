SET PAGESIZE 100
SET LINESIZE 79 
PROMPT **************************************************************** 

PROMPT Generating the Report 

SET TERMOUT OFF 

COLUMN curdate NEW_VALUE report_date 
SELECT TO_CHAR(SYSDATE,'dd-Mon-yyyy') curdate
 FROM DUAL; 
SET TERMOUT ON 

PROMPT &report_date 

TTITLE skip 2 CENTER 'Suppliers in a City' skip 2
 

COLUMN SNAME HEADING 'Supplier Name' FORMAT A18
 
COLUMN city HEADING 'CITY' FORMAT A10 

select SNAME, City  from Supplier where city = 'SJ';


