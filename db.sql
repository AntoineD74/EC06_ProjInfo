DROP DATABASE IF EXISTS database_project;
CREATE DATABASE projInfo_database;

USE projInfo_database;

CREATE TABLE Department
(
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50)
);

CREATE TABLE PositionEmployee
(
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    position_name VARCHAR(50)
);

CREATE TABLE MonthlySalary
(
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    salary INT UNSIGNED NOT NULL
);

CREATE TABLE BankDetails
(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name_owner VARCHAR(50),
    number_account VARCHAR(50),
    bic_code VARCHAR(20)
);

CREATE TABLE Country
(
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50)
);

CREATE TABLE City
(
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    countryID INT UNSIGNED,
    name VARCHAR(50),
    
	FOREIGN KEY (countryID) REFERENCES Country(id)
);

CREATE TABLE Adress
(
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    city INT UNSIGNED,
    house_number MEDIUMINT UNSIGNED,
    street_name VARCHAR(50),
    postal_code INT UNSIGNED,
    
    FOREIGN KEY (city) REFERENCES City(id)
);

CREATE TABLE Contact
(
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    phone_number BIGINT UNSIGNED,
    email_adress VARCHAR(320)
);

CREATE TABLE StatusEmployee
(
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    status VARCHAR(50)
);

CREATE TABLE Employee
(
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    bank_details INT UNSIGNED,
    adress INT UNSIGNED,
    contact INT UNSIGNED,
    monthly_salary INT UNSIGNED,
    status_employee INT UNSIGNED,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    date_entry DATE NOT NULL,
    
    FOREIGN KEY (bank_details) REFERENCES BankDetails(id),
	FOREIGN KEY (adress) REFERENCES Adress(id),
	FOREIGN KEY (contact) REFERENCES Contact(id),
	FOREIGN KEY (monthly_salary) REFERENCES MonthlySalary(id),
	FOREIGN KEY (status_employee) REFERENCES StatusEmployee(id)
);

CREATE TABLE WorkDetails
(
	department_id INT UNSIGNED,
    position_id INT UNSIGNED,
    employee_id INT UNSIGNED,
    
    FOREIGN KEY (department_id) REFERENCES Department(id),
    FOREIGN KEY (position_id) REFERENCES PositionEmployee(id),
    FOREIGN KEY (employee_id) REFERENCES Employee(id),
    
    PRIMARY KEY (department_id, position_id, employee_id)
);