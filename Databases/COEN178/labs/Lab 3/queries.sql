//1a
SELECT DEPTID, COUNT(*)
FROM L_EMP
GROUP BY DEPTID;

//1b
SELECT DEPTID DEPTNO, COUNT(*) EMPCOUNT
FROM L_EMP
GROUP BY DEPTID;

//2a
SELECT DEPTNO, DEPTNAME, EMPCOUNT
FROM (SELECT DEPTID DEPTNO, COUNT(*) EMPCOUNT
	FROM L_EMP
	GROUP BY DEPTID), L_DEPT
WHERE DEPTNO = L_DEPT.DEPTID;

//2b
SELECT DEPTNO, DEPTNAME, EMPCOUNT
FROM (SELECT DEPTID DEPTNO, COUNT(*) EMPCOUNT
	FROM L_EMP
	GROUP BY DEPTID), L_DEPT
WHERE DEPTNO = L_DEPT.DEPTID
ORDER BY DEPTNO ASC;

//3b
Select deptid from L_EMP 
Group by deptid
Having count(*) >= all (Select count(*) from L_EMP 
Group by deptid);

//3c
Select deptid from (Select deptid, count(*) from L_EMP
  Group by deptid
  Order by count(*) desc)
Where rownum <=1;

//4
Select SNAME, CITY
From Supplier  
where supplier.sno in (
      Select sno
      From Shipment
      Where Shipment.pno in (
		   Select pno
		   From part
		   Where color = 'blue')
);

//5a
Select L_DEPT.deptId, L_DEPT.deptname, L_EMP.empname
From L_DEPT
Inner Join L_EMP
On L_DEPT.deptId = L_EMP.deptId;

//5b
Select L_DEPT.deptId, L_DEPT.deptname, L_EMP.empname
From L_DEPT
Left Outer Join L_EMP
On L_DEPT.deptId = L_EMP.deptId;