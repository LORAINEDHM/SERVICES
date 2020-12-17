#!/bin/sh
mysql_install_db --user=root > /dev/null
usr/bin/mysqld --user=root --bootstrap --verbose=0 < init.sql
(telegraf conf &) && mysqld --user=root --console