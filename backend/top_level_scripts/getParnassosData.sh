#!/bin/sh

cd /home/bitnami/htdocs/SkiGreece_201415/backend/livenews/data_parser/

# move the log into the backup folder
cp parnassos.log /home/bitnami/htdocs/SkiGreece_201415/backend/livenews/data_log/parnassos/parnassos_backup_$(date +%Y%m%d)_$(date +%H:%M:%S).log
rm -rf parnassos.log
php parnassos_data.php