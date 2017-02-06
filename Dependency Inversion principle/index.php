<?php

/*
** Dependency Inversion Principle
** Lower modules should be dependent to Higher One, not vise-versa
*/

Interface DBConnectionInterface {
	public function connect();
}

Class MySQLConnection implements DBConnectionInterface {
	public function connect() {
		return "Connect to MySQL Database";
	}
}

Class PasswordReminder{
	private $dbConnection;
	public function __construct(DBConnectionInterface $dbConnection) {
		$this->dbConnection = $dbConnection;
	}
}