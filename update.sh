#!/bin/bash

#Script for pulling the most recent version from github.
#This will overwrite the previous version.

#Run with 'sudo bash update.sh' in your website root dir.

shopt -s extglob
sudo rm -rvf !(update.sh)
shopt -u extglob
sudo git clone https://github.com/Prodge/videoModules.git
cd videoModules/
sudo rm -rvf .git/
sudo mv -vf * .[^.]* ..
cd ..
sudo rmdir -v videoModules/

