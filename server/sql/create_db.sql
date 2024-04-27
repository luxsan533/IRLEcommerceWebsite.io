-- Create Database
CREATE DATABASE IF NOT EXISTS assignment_2_database;

-- Create User
CREATE USER 'cst8285_user'@'%SERVER_NAME%' IDENTIFIED BY 'a2_password';

-- Grant Privileges
GRANT ALL PRIVILEGES ON my_database.* TO 'cst8285_user'@'%SERVER_NAME%';
FLUSH PRIVILEGES;