
# Catalog System
A catalog/library type system to catalog your "stuff". This is designed to catalog almost anything. 

## Setup and Installation

Please see <a href=rpi.md>rpi.md</a> for instructions on setting it up on a Raspberry Pi type device

### What you need
 PHP, Mysql

### Database Setup
Create database called "catalog" with the same username
once created, use the sql/library.sql file to populate the database with some default values.

Copy source/includes/config.php-orig to source/includes/config.php
Edit the config.php file and enter the database username, password, etc

## Logging in
browse over to your host, for example http://localhost/catalog/dashboard.php to log in. Clicking on the Admin Login link at the top, you will use "admin" as the username and "testpassword" as the password.

## Credits
Code Inspiration:
https://github.com/kumarpandule/Online-Library-Management-System-PHP



