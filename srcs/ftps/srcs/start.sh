#(telegraf conf &) && /usr/sbin/vsftpd -Y 2 -p 30000:30009 -P 192.168.99.114
# (telegraf conf &) && /usr/sbin/vsftpd -Y 2 -p 21000:21000 -P 192.168.99.114
# # /usr/sbin/pure-ftpd -Y 2 -p 30000:30009 -P 192.168.99.114
# tail -f /dev/null
# (telegraf conf &) && vsftpd /etc/vsftpd/vsftpd.conf
(telegraf conf &) && /usr/sbin/pure-ftpd -Y 2 -p 30000:30009 -P 192.168.99.114
tail -f /dev/null