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
    User_Id Int NOT NULL,
    Section VARCHAR(10) NOT NULL,
    Program VARCHAR(100) NOT NULL,
    Year_Level VARCHAR(10) NOT NULL,
    Enrollment_Date DATE NOT NULL,
    Status VARCHAR(100) NOT NULL,
    PRIMARY KEY(Student_Id),
    FOREIGN KEY(User_Id) REFERENCES users(User_Id)
)

--create Instructor Table
CREATE TABLE instructor(
    Instructor_Id INT NOT NULL AUTO_INCREMENT,
    User_Id Int NOT NULL,
    Department VARCHAR(100) NOT NULL,
    PRIMARY KEY(Instructor_Id),
    FOREIGN KEY(User_Id) REFERENCES users(User_Id)
)
CREATE TABLE department(
    Department_Id INT NOT NULL,
    Department_Name VARCHAR(100) NOT NULL,
    PRIMARY KEY(Department_Id);
)
CREATE TABLE program(
    Program_Id INT NOT NULL AUTO_INCREMENT,
    Program_Name VARCHAR(100) NOT NULL,
    Department_Id INT NOT NULL,
    PRIMARY KEY(Program_Id),
    FOREIGN KEY(Department_Id) REFERENCES department(Department_Id)
)
CREATE TABLE year_level(
    Year_Level_Id INT NOT NULL AUTO_INCREMENT,
    Year_Level VARCHAR(100) NOT NULL,
    PRIMARY KEY(Year_Level_Id)
)
CREATE TABLE sections (
    Section_Id INT NOT NULL AUTO_INCREMENT,
    Year INT NOT NULL,
    Program_Id INT,
    Year_Level_Id INT,
    Section_Name VARCHAR(100) NOT NULL,
    FOREIGN KEY (Program_Id) REFERENCES program(Program_Id),
    FOREIGN KEY (Year_Level_Id) REFERENCES year_level(Year_Level_Id),
    PRIMARY KEY (Section_Id)
);

-- Insert data into sections
INSERT INTO sections (Year, Section_Name, Program_Id, Year_Level_Id) VALUES
(2024, 'A', 1, 1), (2024, 'A', 2, 1), (2024, 'A', 3, 1), (2024, 'A', 4, 1), (2024, 'A', 5, 2), (2024, 'A', 6, 2), (2024, 'A', 7, 3), (2024, 'A', 8, 3), (2024, 'A', 9, 4),
(2023, 'B', 1, 1), (2024, 'B', 2, 1), (2024, 'B', 3, 2), (2024, 'B', 4, 2), (2024, 'B', 5, 3), (2024, 'B', 6, 3), (2024, 'B', 7, 4), (2024, 'B', 8, 4), (2024, 'B', 9, 4),
(2024, 'C', 1, 1), (2024, 'C', 2, 2), (2024, 'C', 3, 3), (2024, 'C', 4, 4),
(2024, 'D', 1, 1), (2024, 'D', 2, 2), (2024, 'D', 3, 3);


INSERT INTO year_level (Year_Level) VALUES
('First Year'), 
('Second Year'), 
('Third Year'), 
('Fourth Year');

INSERT INTO department (Department_Name) VALUES
('CCS'),
('CAS'),
('CEA');

INSERT INTO program (Program_Name, Department_Id) VALUES
('BSIT', 1),
('BSCS', 1),
('AB ENGLISH', 2),
('AB MATH', 2),
('BSED', 2),
('BSCE', 3),
('BSME', 3),
('BSIS', 1),
('BLIS', 1);