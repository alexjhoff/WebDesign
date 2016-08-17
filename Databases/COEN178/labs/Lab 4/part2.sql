//Excercise 3

CREATE TABLE Projects_4(
  projectID char(5) PRIMARY KEY,
  projectName char(15), 
  resources number (10,2) NOT NULL,
  DNO char(5),
  CONSTRAINT proj_fkey FOREIGN KEY (DNO) references dept_4(deptNo) ON DELETE cascade
);

CREATE TABLE WORKS_4( 
  EmpNo integer, 
  projectNo char(5), 
  startdate date, 
  PRIMARY KEY(empNo, ProjectNo), 
  CONSTRAINT works_fkey1 FOREIGN KEY (EmpNo) references Emp_4(empNo), 
  CONSTRAINT works_fkey2 FOREIGN KEY (projectNo) references projects_4(projectId)
);

INSERT into DEPT_4 values ('D1', 'testing', 'SJ', 10000, 10000);
INSERT into EMP_4 values (1, 'Smith', 'D1', 60000.00, 'F');
INSERT into DEPT_4 values ('D3', 'testing', 'SFO', 10000, 10000);
INSERT into EMP_4 values (2, 'Jones', 'D2', 60000.00, 'M');
INSERT into DEPT_4 values ('D4', 'testing', 'SFO', 10000, 10000);
INSERT into EMP_4 values (3, 'Nelson', 'D3', 60000.00, 'F');
INSERT into DEPT_4 values ('D5', 'testing', 'SFO', 10000, 10000);
INSERT into EMP_4 values (4, 'Hoff', 'D1', 60000.00, 'M');
INSERT into DEPT_4 values ('D6', 'testing', 'SFO', 10000, 10000);
INSERT into EMP_4 values (6, 'Fay', 'D6', 60000.00, 'M');

INSERT INTO projects_4 VALUES ('P1', 'Project1', 4.0, 'D1');
INSERT INTO projects_4 VALUES ('P2', 'Project2', 5.0, 'D1');
INSERT INTO projects_4 VALUES ('P3', 'Proj3', 2.0, 'D2');
INSERT INTO projects_4 VALUES ('P4', 'Proj4', 6.0, 'D3');
INSERT INTO projects_4 VALUES ('P5', 'Proj4', 6.0, 'D4');
INSERT INTO projects_4 VALUES ('P6', 'Proj4', 6.0, 'D6');

Insert into Works_4 values (1,'P1',SYSDATE);
INSERT INTO works_4 VALUES (2, 'P2', SYSDATE);
INSERT INTO works_4 VALUES (3, 'P3', SYSDATE);
INSERT INTO works_4 VALUES (4, 'P4', SYSDATE);
INSERT INTO works_4 VALUES (1, 'P5', SYSDATE);
INSERT INTO works_4 VALUES (6, 'P6', SYSDATE);

Select empNo
From Works_4
Order by projectNo;




