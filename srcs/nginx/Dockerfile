FROM alpine

LABEL lduhamel="lduhamel@student.s19.be"

#COPY FILE
COPY srcs/nginx.conf /etc/nginx/nginx.conf
COPY srcs/index.html /www/
COPY srcs/start.sh /tmp/start.sh
COPY srcs/telegraf.conf /etc/telegraf/telegraf.conf

#PACKAGES
RUN apk update \
    && apk upgrade
RUN apk add telegraf --repository http://dl-3.alpinelinux.org/alpine/edge/community/ --allow-untrusted --no-cache
RUN apk add openrc --no-cache \
    openssl openssh
#NGINX
RUN apk add nginx
RUN mkdir -p /run/nginx /www
RUN adduser -D -g 'www' www
RUN chown -R www:www /www
#CONFIG SSL
RUN adduser -D user
RUN echo "user:password" | chpasswd
RUN mkdir /etc/nginx/ssl
RUN ssh-keygen -A
RUN openssl req -x509 -nodes -days 365 -subj "/C=BE/ST=Brussels/O=20/OU=lolo/CN=www.localhost" -newkey rsa:2048 -keyout /etc/ssl/certs/localhost.key -out /etc/ssl/certs/localhost.crt

#START
RUN chmod 777 /tmp/start.sh
CMD sh ./tmp/start.sh
