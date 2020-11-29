#!/bin/sh

#mysql_install_db --user=root --datadir=/var/lib/mysql
#/usr/bin/mysqld --user=root --datadir=/var/lib/mysqld --bootstrap <<EOF

#FLUSH PRIVILEGES;
#CREATE DATABASE wordpress;
#CREATE USER 'root'@'%' IDENTIFIED BY 'root';
#GRANT ALL PRIVILEGES ON wordpress.* TO 'root'@'%' IDENTIFIED BY 'root';
#FLUSH PRIVILEGES;
#EOF

#rc-service mariadb restart


mysql_install_db --user=root > /dev/null
# cat > /tmp/sql << eof
# CREATE DATABASE wordpress;
# FLUSH PRIVILEGES;
# GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'password' WITH GRANT OPTION;
# FLUSH PRIVILEGES;
# eof

usr/bin/mysqld --user=root --bootstrap --verbose=0 < init.sql
# (telegraf conf &) && mysqld --user=root --console
mysqld --user=root --console