# videoModules
Easily deploy a website housing videos within different modules


Currently in progress


Instructions
---
Installing an appropriate web server:

sudo apt-get update
sudo apt-get upgrade
sudo apt-get install apache2
sudo apt-get install mysql-server
sudo apt-get install php5
sudo apt-get install php5-mysql

Installing videoModules

sudo apt-get install git
cd /var/www/
sudo rm index.html
sudo git clone https://github.com/Prodge/videoModules.git
cd videoModules/
sudo mv * .[^.]* ..
cd ..
sudo rmdir videoModules/

or simply download as zip and extract to your webserver root

Configuring
---


Todo
---


Known Bugs
---
