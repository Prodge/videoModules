#!/bin/bash

#Script for pulling the most recent version from github.
#This is intended only for development use, it could break your setup.
#This will overwrite the previous version.

#Run with 'sudo bash update.sh' in your website root dir.

shopt -s extglob
echo "=======  Deleting current install"
sudo rm -rvf !(update.sh)
shopt -u extglob
echo "=======  Cloning GitHub Repository"
sudo git clone https://github.com/Prodge/videoModules.git
cd videoModules/
echo "=======  Removing .git dir"
sudo rm -rf .git/
echo "=======  Moving up a folder"
sudo mv -vf * .[^.]* ..
cd ..
echo "=======  Removing the repository folder"
sudo rmdir -v videoModules/

