# videoModules
Easily deploy a website housing videos within different modules


Currently in progress


###Instructions

####Installing an appropriate web server:
```
sudo apt-get update
sudo apt-get upgrade
sudo apt-get install apache2
sudo apt-get install mysql-server
sudo apt-get install php5
sudo apt-get install php5-mysql
```
####Installing videoModules
```
sudo apt-get install git
cd /var/www/
sudo rm index.html
sudo git clone https://github.com/Prodge/videoModules.git
cd videoModules/
sudo rm -rf .git/
sudo mv * .[^.]* ..
cd ..
sudo rmdir videoModules/
```
Or simply download as zip and extract to your webserver root

###Configuring
- Modify config.php to include the login information for your database
- Run the install script on the database to create the required tables
    - Do this by visiting http://yoursite.com/install.php
    - If you don't see any errors then you are good to go
    - It is recomended that you now delete 'install.php'
    - While you're at it, you should probably also delete both the '.sh' scripts (unless you want to use them)
- You can now add modules, videos and configure settings at http://yoursite.com/admin.php

###Todo



###Known Bugs

