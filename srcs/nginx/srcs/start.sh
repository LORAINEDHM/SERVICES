# /usr/sbin/sshd && (telegraf conf &) && nginx -g "daemon off;"
(telegraf conf &) && /usr/sbin/sshd && nginx -g "daemon off;"