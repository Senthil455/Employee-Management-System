<?php
require_once __DIR__ . '/../../db_config.php';

function addEmployee($id, $name, $gender, $dob, $deptid, $designation, $salary) {
    global $conn;
    $query = "INSERT INTO employee (empname, gender, dob, deptid, designation, salary) VALUES ($1, $2, $3, $4, $5, $6)";
    $result = pg_query_params($conn, $query, [$name, $gender, $dob, $deptid, $designation, $salary]);
    return $result !== false;
}

function viewAllEmployees() {
    global $conn;
    $query = "SELECT e.empid, e.empname, e.gender, e.dob, e.designation, e.salary, d.deptname 
              FROM employee e 
              JOIN department d ON e.deptid = d.deptid 
              ORDER BY e.empid";
    $res = pg_query($conn, $query);
    return $res ? pg_fetch_all($res) : [];
}

function getEmployeeById($id) {
    global $conn;
    $query = "SELECT * FROM employee WHERE empid = $1";
    $res = pg_query_params($conn, $query, [$id]);
    return $res ? pg_fetch_assoc($res) : null;
}

function updateEmployee($id, $name, $deptid, $designation, $salary) {
    global $conn;
    $query = "UPDATE employee SET empname = $1, deptid = $2, designation = $3, salary = $4 WHERE empid = $5";
    $result = pg_query_params($conn, $query, [$name, $deptid, $designation, $salary, $id]);
    return $result !== false;
}

function deleteEmployee($id) {
    global $conn;
    $query = "DELETE FROM employee WHERE empid = $1";
    $result = pg_query_params($conn, $query, [$id]);
    return $result !== false;
}
?>
