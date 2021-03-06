SELECT EMPNAME, DEPTNAME
FROM L_EMP, L_DEPT
WHERE L_EMP.DEPTID = L_DEPT.DEPTID AND DEPTNAME = 'Testing';

SELECT EMPNAME
FROM L_EMP
WHERE DEPTID in (SELECT DEPTID
		FROM L_DEPT
		WHERE DEPTNAME = 'Testing');

Select EMPNAME FROM L_EMP
WHERE EXISTS(SELECT * FROM L_DEPT
	    WHERE deptName = 'Testing'
	    AND L_EMP.deptID = L_DEPT.deptID);

SELECT DEPTNAME
FROM L_DEPT
WHERE DEPTID not in (SELECT DEPTID
		    FROM L_EMP);

SELECT DEPTNAME      
FROM L_DEPT
WHERE NOT EXISTS(SELECT * FROM L_EMP
		WHERE L_DEPT.DEPTID = L_EMP.DEPTID);
