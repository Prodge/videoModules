#!/bin/bash

#Script for pulling the most recent version from github.
#This will overwrite the previous version.

#Run with 'sudo bash update.sh' in your website root dir.

shopt -s extglob
sudo rm -rf !(update.sh)
shopt -u extglob
sudo git clone https://github.com/Prodge/videoModules.git
cd videoModules/
sudo rm -rf .git/
sudo mv -f * .[^.]* ..
cd ..
sudo rmdir videoModules/

