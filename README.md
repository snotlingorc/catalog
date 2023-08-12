
# Catalog System
Description goes here 

## Setup and Installation

### What you need
 PHP, Mysql

### Database Setup
Create database called "catalog" with the same username
once created, use the sql/library.sql file to populate the database with some default values.

Copy source/include/config.php-orig to source/include/config.php
Edit the config.php file and enter the database username, password, etc



## Credits
Code Inspiration:
https://github.com/kumarpandule/Online-Library-Management-System-PHP


## TODO 

### Bug Fixes
- DONE - Add image should return to the stuff that was being added.
- DONE - add image to Edit stuff and ability to update from that page
- add ability to remove image from stuffEdit page
- DONE - Display images on edit page
- DONE - add new stuff should go to edit stuff page
- DONE - Display images on stuffView

### Items to complete
- Tags - impliment
    dbfunc/stuff.php - Do not forget to delete the tagAssociation for StuffID
- Image removal/update
    dbfunc/stuff.php - Do not forget to delete the image associated with this StuffID
- Admin - Logout, change password, index.php page
- CSS work - see if the css will allow for dynamic build of the table instead of forcing 5 cells wide
- Logo
- error_reporting(1) to 0 - and finish adding to pages
- Image system look and feel need to match the rest
- stuffView look and feel need to match the rest

### Feature Requests
- dbfund/image.php - figure out why this cannot be in the same format as the other DB calls
- Multi Image support - Ability to select primary image - perhaps rotate the various images
- Additional image types. Currently on png, gif and jpg are valid.
- Image from url - Need to move this to a function and add in some better error checking
- User signup/login - Do we need this?
- Owner adminstration? allow multiple owners to a single item (instead of duplicate items) - perhaps users as owners?
- Rating System??



