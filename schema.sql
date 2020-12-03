USE schemaDB;

CREATE TABLE IssuesTable (
   id INT AUTO_INCREMENT,
   title VARCHAR(255),
   issue_description TEXT,
   issue_type VARCHAR(255),
   issue_priority VARCHAR(255),
   issue_status VARCHAR(255),
   assigned_to INT,
   created_by INT,
   created DATETIME,
   updated DATETIME,
   PRIMARY KEY(id));

CREATE TABLE UserTable (
   id INT AUTO_INCREMENT,
   firstname VARCHAR(255),
   lastname VARCHAR(255),
   user_password VARCHAR(255),
   email VARCHAR(255),
   date_joined DATETIME,
   PRIMARY KEY(id));
