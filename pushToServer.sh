#!/bin/bash

#Script for pushing the working directory to a test server.
#This is intended only for development use but could be used to install on a server.
#This will overwrite the previous version.

scp -prq . root@192.168.1.14:/var/www/
