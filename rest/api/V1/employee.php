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
header('Content-Type: application/json; charset=utf-8');

$method = $_SERVER["REQUEST_METHOD"];

$fileHandle = fopen("../../../data/data_1.txt","w+");
fwrite($fileHandle,$method);
fclose($fileHandle);

switch($method) {
    case "GET":
        echo json_encode(
            EmployeeConverter::convertToStd(
                EmployeeDAO::getAllEmployees()
                )
            );
    break;
    case "POST":
        $fileHandle = fopen("../../../data/data.txt","w");
        fwrite($fileHandle,var_dump($_POST));
        fclose($fileHandle);
        Location("http://localhost:8080");
    break;
}