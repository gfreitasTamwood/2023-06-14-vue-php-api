<?php

class EmployeeDAO {
    private static $db;

    public static function startDb() {
        self::$db = new PDOAgent("Employee");
    }

    public static function getAllEmployees() {
        $sql = "SELECT * FROM employee ORDER BY id DESC";

        self::$db->query($sql);
        self::$db->execute();

        return self::$db->resultSet();
    }

    public static function insertEmployee(Employee $newEmployee) {
        $sql = "INSERT INTO employee (first_name,last_name,email,department,avatar) VALUES (:fName,:lName,:email,:department,:avatar)";

        self::$db->query($sql);
        self::$db->bind(":fName",$newEmployee->getFirstName());
        self::$db->bind(":lName",$newEmployee->getLastName());
        self::$db->bind(":email",$newEmployee->getEmail());
        self::$db->bind(":department",$newEmployee->getDepartment());
        self::$db->bind(":avatar",$newEmployee->getAvatar());

        self::$db->execute();
        return self::$db->lastInsertId();
    }

    public static function deleteEmployee(int $id) {
        $sql = "DELETE FROM employee WHERE id = :id";
        
        self::$db->query($sql);
        self::$db->bind(":id", $id);

        self::$db->execute();

        return self::$db->rowCount();
    }
}
