<?php

class Employee {
    
    private int $id;
    private string $first_name;
    private string $last_name;
    private string $email;
    private string $department;
    private string $avatar;

	public function getId() {
		return $this->id;
	}

	public function setId(int $id) {
		$this->id = $id;
	}

	public function getFirstName() {
		return $this->first_name;
	}

	public function setFirstName(string $firstName) {
		$this->first_name = $firstName;
	}

	public function getLastName() {
		return $this->last_name;
	}

	public function setLastName(string $lastName) {
		$this->last_name = $lastName;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail(string $email) {
		$this->email = $email;
	}

	public function getDepartment() {
		return $this->department;
	}

	public function setDepartment(string $department) {
		$this->department = $department;
	}

	public function getAvatar() {
		return $this->avatar;
	}

	public function setAvatar(string $avatar) {
		$this->avatar = $avatar;
	}



}