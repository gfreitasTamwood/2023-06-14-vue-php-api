<?php
//localhost:80/vue-class-03/rest/api/V1/employee.php
//htdocs/vue-class-03/rest/api/V1/employee.php

require_once("../../../inc/config.inc.php");
require_once("../../../inc/Entities/Employee.class.php");
require_once("../../../inc/Utilities/PDOAgent.class.php");
require_once("../../../inc/Utilities/DAO/EmployeeDAO.class.php");
require_once("../../../inc/Utilities/EmployeeConverter.class.php");

EmployeeDAO::startDb();

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET,POST,HEAD,OPTIONS,POST,PUT,DELETE ");
header('Content-Type: application/json; charset=utf-8');


$method = $_SERVER["REQUEST_METHOD"];

switch($method) {
    case "GET":
        echo json_encode(
            EmployeeConverter::convertToStd(
                EmployeeDAO::getAllEmployees()
                )
            );
    break;
    case "POST":
        $data = json_decode(file_get_contents('php://input'));
        EmployeeDAO::insertEmployee(
            EmployeeConverter::convertToObj($data)
        );
        header("Location: http://localhost:8080");
    break;

    case "DELETE":
        $employee = json_decode(file_get_contents('php://input'));
        EmployeeDAO::deleteEmployee($employee);
        echo "Employee Deleted!";
        // header("Location: http://localhost:8080");
    break;
}
