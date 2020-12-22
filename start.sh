#!/bin/bash
emptyness=$(ls -qAL -- /var/www/html/)
if  [  "$emptyness" == "lost+found" ]
then  cp  -r /root/test/*.php /var/www/html/      
else  echo somedir is not empty
fi
touch /root/test/test5.php
pwd
ls /var/www/html/
