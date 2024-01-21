
# Catalog System
A catalog/library type system to catalog your "stuff". This is designed to catalog almost anything. 

## Setup and Installation

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


## TODO 

### Bug Fixes
- None

### Items to complete
- Tagging support
- CSS work - see if the css will allow for dynamic build of the table instead of forcing 5 cells wide
- Logo
- error_reporting(1) to 0 - and finish adding to pages
- Image system look and feel need to match the rest
- stuffView look and feel need to match the rest

### Feature Requests
#### Images
- dbfunc/image.php - figure out why this cannot be in the same format as the other DB calls
- Multi Image support - Ability to select primary image - perhaps rotate the various images
- Additional image types. Currently on png, gif and jpg are valid.  webp is pretty common.
- Image from url - Need to move this to a function and add in some better error checking and gracefully error out if invalid type
#### Owner
- User signup/login - Do we need this? (google login/Oauth support?)
- Owner adminstration? allow multiple owners to a single item (instead of duplicate items) - perhaps users as owners?
-- move owner flags to it's own table (condition, status, owner)
#### Stuff
- date field for publications - DONE
- ISBN number - DONE
- format (hardcover, softcover, pdf)
- remove condition, status, owner
#### Misc
- Rating System??
