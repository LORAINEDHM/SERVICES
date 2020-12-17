#!/bin/bash
(telegraf conf &) && /usr/sbin/pure-ftpd -Y 2 -p 30000:30009 -P 192.168.99.110
tail -f /dev/null