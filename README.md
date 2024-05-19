# SQL_Injection

## Overview
This project demonstrates a simple login system vulnerable to SQL injection attacks and a secured version using prepared statements to prevent SQL injection.

## Prerequisites
- Apache or XAMPP installed on your local machine
- PHP and MySQL installed

## Installation

### Setting up Apache or XAMPP

#### Using XAMPP
1. Download and install XAMPP from [https://www.apachefriends.org/index.html](https://www.apachefriends.org/index.html).
2. Start the XAMPP control panel and ensure Apache and MySQL services are running.

#### Using Apache
1. Ensure Apache and MySQL are installed and running on your system.
2. Configure Apache to serve PHP files and connect to MySQL.

### Project Setup
1. Clone this repository or download the project files.
2. Copy the project files to the `htdocs` directory in your XAMPP installation (e.g., `C:\xampp\htdocs\SQLInjectionProject`).
3. Create a database named `test_db` in MySQL.
4. Create a `users` table in `test_db` using the following SQL script:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
);
```
5. Insert some test data into the users table:

```
INSERT INTO users (username, password) VALUES ('testuser', 'testpassword');
```

##Usage
1. Open a web browser and navigate to http://localhost/SQLInjectionProject/index.php.
2. Use the following credentials to log in:
   - Username: testuser
   - Password: testpassword
3. After successful login, you will be redirected to the welcome page.

###Testing SQL Injection
1. Go to the login page (http://localhost/SQLInjectionProject/index.php).
2. Enter the following SQL injection payload in the username field:
   - Username: testuser' OR '1'='1
   - Password: anything
3. The application is vulnerable, you will be logged in without needing a valid password.
   
###Secured Version
To test the secured version:

1. Replace login.php with Sec_login.php.
2. Follow the same login steps. The SQL injection attack will fail, demonstrating the effectiveness of prepared statements.
