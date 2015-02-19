# videoModules
videoModules is a simple php based website that presents videos grouped into modules. The website is designed to be very easy to install (instructions below) and configure. A SQL based database server is required however asside from creating a username and password, videoModules will perform all of the interactions with the database on the users behalf. An admin page is avalible for adding, editing and removing videos and modules as well as some general website settings. Other than adding in login information, no editing of the source is required to fully customize the website. However if you wish, the content portion of the website is arranged in a fairly modular way that should make it easy to make deeper modifications.
See the screenshots below for more information.


###Instructions

####Installing an appropriate web server
This will work with most linux distributions.
```
sudo apt-get update
sudo apt-get upgrade
sudo apt-get install apache2
sudo apt-get install mysql-server
sudo apt-get install php5
sudo apt-get install php5-mysql
```
####Installing videoModules
The hard way:
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
- Modify admin.php to have the username and password you desire.
- You can now add modules, videos and configure settings at http://yoursite.com/admin.php

###Known Bugs
- Adding ' to any input fields will cause a SQL error.

###Screenshots

#####Home Page
![alt text](https://github.com/Prodge/videoModules/raw/master/screenshots/home.png "Home Page")
#####Module Page
![alt text](https://github.com/Prodge/videoModules/raw/master/screenshots/module.png "Module Page")
#####Video Page
![alt text](https://github.com/Prodge/videoModules/raw/master/screenshots/video.png "Video Page")
#####Admin Home Page
![alt text](https://github.com/Prodge/videoModules/raw/master/screenshots/admin-home.png "Admin Home Page")
#####Admin Website Settings
![alt text](https://github.com/Prodge/videoModules/raw/master/screenshots/admin-settings.png "Admin Website Settings")
#####Admin Edit Video
![alt text](https://github.com/Prodge/videoModules/raw/master/screenshots/admin-editVideo.png "Admin Edit Video")
#####Admin Remove Video
![alt text](https://github.com/Prodge/videoModules/raw/master/screenshots/admin-removeVideo.png "Admin Remove Video")
