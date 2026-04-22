CREATE TABLE admin (
    id SERIAL PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE department (
    deptid SERIAL PRIMARY KEY,
    deptname VARCHAR(100) NOT NULL
);

CREATE TABLE employee (
    empid SERIAL PRIMARY KEY,
    empname VARCHAR(100) NOT NULL,
    gender VARCHAR(10),
    dob DATE,
    deptid INT REFERENCES department(deptid),
    designation VARCHAR(100),
    salary NUMERIC(10,2)
);

CREATE TABLE attendance (
    attendance_id SERIAL PRIMARY KEY,
    empid INT REFERENCES employee(empid) ON DELETE CASCADE,
    date DATE NOT NULL,
    status VARCHAR(20) NOT NULL
);

CREATE TABLE payroll (
    payroll_id SERIAL PRIMARY KEY,
    empid INT REFERENCES employee(empid),
    month VARCHAR(20),
    year INT,
    basic_salary NUMERIC(10,2),
    days_present INT,
    total_pay NUMERIC(10,2)
);

INSERT INTO admin (username,password) VALUES ('admin','admin123');
