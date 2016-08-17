CREATE TABLE branch(
	      BranchNo VARCHAR(5) PRIMARY KEY,
              ManagerId NUMBER(10),
              phone NUMBER(10),
              street VARCHAR(20),
	      city VARCHAR(15),
              zip NUMBER(5)
);

CREATE TABLE employees (
BranchNo VARCHAR(5),
EmpId NUMBER(10) PRIMARY KEY,
            Name VARCHAR(20),
            Phone NUMBER(10),
            Role VARCHAR(10),
            startDate date,
            prop1 VARCHAR(10) DEFAULT 'None',
            prop2 VARCHAR(10) DEFAULT 'None',
            prop3 VARCHAR(10) DEFAULT 'None',
            FOREIGN KEY (branchNo) REFERENCES branch (branchNo)
);

CREATE TABLE property (
idNum NUMBER(10) PRIMARY KEY,
              supervisorId NUMBER(10),
              owner VARCHAR(10),
              city VARCHAR(20),
              street VARCHAR(10),
              zip NUMBER(5),
              rooms NUMBER(2),
              rent NUMBER(5),
              status VARCHAR(10) CHECK (status in ('available', 'not-available', 'leased')),
              startOfAvail date,
              FOREIGN KEY (supervisorId) REFERENCES employees (EmpId)
);

CREATE TABLE owner (
name VARCHAR(20),
            address VARCHAR(50),
            phone NUMBER(10)
);

CREATE TABLE leaseAgreement (
leaseId NUMBER(5) PRIMARY KEY,
            propId NUMBER(10),
                  renterName VARCHAR(10),
                  homePhone NUMBER(10),
                  workPhone NUMBER(10),
                  friendName VARCHAR(20),
                  friendPhone NUMBER(10),
                  startDate date,
                  endDate date,
                  deposit NUMBER(5),
                  rent NUMBER(5)
);
