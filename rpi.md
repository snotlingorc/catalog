# Installation on Raspbery PI (Libre Potato) - running Raspbian

Installation of the OS is not covered here.

Installation of myphpadmin, php, apache2, mysql will be needed

## Installing the core services and libraries
sudo apt-get install mariadb-server mariadb-client
sudo apt-get install apache2
sudo apt-get install phpmyadmin
* when prompted for webserver to reconfigure automatically, choose apache2 
* when prompted to configure database for phpmyadmin with dbconfig-common, select Yes
* enter a password for the default database :  myTestDBPass     ** Plese select your down password, this is use for example
sudo apt-get install php

## Initial setup of mysql/mariadb
sudo mysql
grant all privileges on *.* to 'admin'@'localhost' identified by 'myAdminDBPass' with grant option;
quit

## configuring phpmyadmin with apache2
edit /etc/apache2/apache2.conf
add the following line to the bottom of the file:
Include /etc/phpmyadmin/apache.conf

sudo systemctl restart apache2
sudo ln -s /usr/share/phpmyadmin /var/www/html

You should now be able to go to your raspberry pi from your network at get to the phpmyadmin console: 
http://10.0.0.100/phpmyadmin/

## configuring the database with phpmyadmin
Using the username created in the initial setup of mysql step above, log into the phpmyadmin console.

Select "User accounts" from the top menu bar
click "Add user account"
Username: catalog
password: yourpasswordhere
check the box "Create database with same name and grant all pivileges"
check the boxes "Data" and "Structure"
click "Go"

# Install and configuring catalog
from your home directory.
cd
git clone https://github.com/snotlingorc/catalog.git
cd /var/www/html
sudo ln -s ~/catalog/source/ catalog

cd catalog/includes
sudo cp config.php-orig config.php
edit he password line to match your password that you entered into the previous step.


Next, populate the tables
from the phpmyadmin console, click on "catalog" from the left hand menu
click on the "SQL" tab and cut and paste the data from the sql/library.sql file

You can now go to http://10.0.0.100/catalog and use the application


