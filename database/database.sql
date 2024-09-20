--table name - IMProject

--Create table for user
Create Table users(
    User_Id INT NOT NULL AUTO_INCREMENT,
    First_Name VARCHAR(255) NOT NULL,
    Last_Name VARCHAR(255) NOT NULL,
    Gender ENUM('Male', 'Female', 'Other') NOT NULL,
    Age INT NOT NULL,
    Contact_Number VARCHAR(255) NOT NULL,
    Address VARCHAR(255) NOT NULL,
    Email VARCHAR(255) UNIQUE NOT NULL,
    Date_Of_Birth DATE NOT NULL,
    Profile_Picture VARCHAR(255) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Create_At TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (User_Id)
)
--create Student Table
CREATE TABLE student(
	Student_Id INT NOT NULL AUTO_INCREMENT,
    Section VARCHAR(10) NOT NULL,
    YEAR_LEVEL VARCHAR(10) NOT NULL,
    EnrollmendDate DATE NOT NULL,
    STATUS VARCHAR(100) NOT NULL,
    PRIMARY KEY(Student_Id)
)

--create Instructor Table
CREATE TABLE instructor(
    Instructor_Id INT NOT NULL AUTO_INCREMENT,
    Department VARCHAR(100) NOT NULL,
    PRIMARY KEY(Instructor_Id)
)