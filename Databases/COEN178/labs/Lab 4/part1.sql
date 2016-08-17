//Excercise 1

Create table DEPT_4 (
  DeptNo CHAR(5) Primary Key,
  deptname CHAR(10),
  location CHAR(20),
  budget NUMBER(10,2),
  extra_funds NUMBER(10,2),
  CONSTRAINT DEPT_4cons1 CHECK(budget >= 0),
  CONSTRAINT DEPT_4cons2 CHECK(extra_funds <= budget)
);

insert into DEPT_4 values('D2','testing','SFO',20000.00,50000.00);

insert into DEPT_4 values('D2','testing','SFO',50000.00,20000.00);

insert into DEPT_4 values('D1','testing','SJ',NULL,NULL);

ALTER table DEPT_4
modify budget NUMBER(10,2) NOT NULL;

DELETE  from DEPT_4
Where budget IS NULL;

ALTER table DEPT_4
modify budget NUMBER(10,2) NOT NULL;

ALTER table DEPT_4
ADD CONSTRAINT DEPT_4_cons3 CHECK (location in ('SJ','SFO','LA'));

insert into DEPT_4 values('D9','testing','NY',10000,1000);

Select status from user_constraints
where constraint_name = UPPER('DEPT_4cons1');

//Excercise 2

Create table EMP_4 (
  empNo Integer Primary Key, 
  empname CHAR(20),
  deptId CHAR(5) NOT NULL,
  salary NUMBER(10,2), 
  gender CHAR(2),
  CONSTRAINT dept_fkey FOREIGN Key (deptId) REFERENCES Dept_4(DeptNo)ON DELETE CASCADE
);

ALTER table EMP_4
ADD CONSTRAINT EMP_4_cons1 CHECK (gender in ('M', 'F'));

insert into EMP_4 values(1,'Smith','D13',60000.00,'F');

insert into DEPT_4 values('D13','dev','SFO',50000.00,20000.00);

insert into EMP_4 values(1,'Smith','D13',60000.00,'F');

Select * from DEPT_4;

Select * from EMP_4;

DELETE from DEPT_4
Where DeptNo = 'D13';

Select * from EMP_4;












