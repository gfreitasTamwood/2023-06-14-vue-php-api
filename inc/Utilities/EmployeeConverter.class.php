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
}