CREATE DATABASE IF NOT EXISTS schemaDB;

USE schemaDB;

CREATE TABLE IssuesTable (
   id INT AUTO_INCREMENT,
   title VARCHAR,
   description TEXT,
   type INT,
   priority VARCHAR,
   status VARCHAR,
   assigned_to INT,
   created_by INT,
   created DATETIME,
   updated DATETIME);

CREATE TABLE UserTable (
   id INT AUTO_INCREMENT,
   firstname VARCHAR,
   lastname VARCHAR,
   password VARCHAR,
   email VARCHAR,
   date_joined DATETIME);

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, INDEX, ALTER ON schemaDB.* TO 'admin'@'localhost' IDENTIFIED BY 'UserAdmin1';
