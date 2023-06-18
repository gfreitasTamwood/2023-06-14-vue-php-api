<?php

class EmployeeConverter {

    //To get From Database
    public static function convertToStd($employee) {
        if ( ! is_array($employee) ) {
            $stdObject = new stdClass;
            $stdObject->id = $employee->getId();
            $stdObject->firstName = $employee->getFirstName();
            $stdObject->lastName = $employee->getLastName();
            $stdObject->email = $employee->getEmail();
            $stdObject->department = $employee->getDepartment();
            $stdObject->avatar = $employee->getAvatar();

            return $stdObject;
        } else {
            $stdObjectList = [];
            foreach($employee as $newEmployee) {
                $stdObject = new stdClass;
                $stdObject->id = $newEmployee->getId();
                $stdObject->firstName = $newEmployee->getFirstName();
                $stdObject->lastName = $newEmployee->getLastName();
                $stdObject->email = $newEmployee->getEmail();
                $stdObject->department = $newEmployee->getDepartment();
                $stdObject->avatar = $newEmployee->getAvatar();
                $stdObjectList[] = $stdObject;
            }
            return $stdObjectList;
        }
    }

    //To post into Database
    public static function convertToObj($stdObject) {
        if ( ! is_array($stdObject) ) {
            $newEmployee = new Employee();
            $newEmployee->setFirstName($stdObject->firstName);
            $newEmployee->setLastName($stdObject->lastName);
            $newEmployee->setEmail($stdObject->email);
            $newEmployee->setDepartment($stdObject->department);
            $newEmployee->setAvatar($stdObject->avatar);
            
            return $newEmployee;
        } else {
            $employeeList = [];
            foreach($stdObject as $newstdObject) {
                $newEmployee = new Employee();
                $newEmployee->setFirstName($newstdObject->firstName);
                $newEmployee->setLastName($newstdObject->lastName);
                $newEmployee->setEmail($newstdObject->email);
                $newEmployee->setDepartment($newstdObject->department);
                $newEmployee->setAvatar($newstdObject->avatar);
                $employeeList[] = $newEmployee;
            }
            return $employeeList;
        }
    }
}
