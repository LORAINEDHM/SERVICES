FROM alpine

LABEL lduhamel="lduhamel@student.s19.be"

#COPY FILES
COPY srcs/telegraf.conf /etc/telegraf/telegraf.conf
COPY srcs/my.cnf /etc/
COPY srcs/wordpress.sql .
COPY srcs/start.sh  .
COPY srcs/init.sql .


#PACKAGES

RUN apk update \
    && apk upgrade
RUN apk add openrc --no-cache
RUN apk add telegraf --repository http://dl-3.alpinelinux.org/alpine/edge/community/ --allow-untrusted --no-cache
#MYSQL
RUN apk add mysql mysql-client
RUN mkdir -p /run/mysqld 
RUN touch /run/mysqld/mysqld.sock
RUN adduser -D -g 'www' www
RUN mkdir -p /run/openrc/ \
    && touch /run/openrc/softlevel \
    && /etc/init.d/mariadb setup


#START
CMD /bin/sh ./start.sh
