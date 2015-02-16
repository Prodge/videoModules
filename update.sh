#Script for pulling the most recent version from github.
#This will overwrite the previous version.

sudo rm -rf !(update.sh)
sudo git clone https://github.com/Prodge/videoModules.git
cd videoModules/
sudo mv -f * .[^.]* ..
cd ..
sudo rmdir videoModules/

