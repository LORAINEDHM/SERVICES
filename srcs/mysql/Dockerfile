FROM alpine

# J'indique qui detient le dockerfile
LABEL lduhamel="lduhamel@student.s19.be"

# je mets a jour l'image
RUN apk update \
    && apk upgrade

RUN apk add openrc --no-cache

#exiRUN mkdir -p /var/lib/mysql

RUN apk add mysql mysql-client

RUN mkdir -p /run/mysqld 
RUN touch /run/mysqld/mysqld.sock

COPY ./srcs/my.cnf /etc/

COPY ./srcs/start.sh  .

COPY ./srcs/init.sql .

RUN adduser -D -g 'www' www

RUN mkdir -p /run/openrc/ \
    && touch /run/openrc/softlevel \
    && /etc/init.d/mariadb setup
  #  && rc-service mariadb restart

#ENTRYPOINT [./start.sh]

CMD /bin/sh ./start.sh

#COPY /srcs/mariadb-server.cnf /etc/my.cnf.d/mariadb-server.cnf

#RUN openrc mysql

#RUN mysql -u root \
#&& echo "CREATE DATABASE wordpress;" | mysql -u root \
#&& echo "CREATE USER 'user42'@'localhost' IDENTIFIED BY 'password';" | mysql -u root \
#&& echo "GRANT ALL PRIVILEGES ON wordpress.* TO 'user42'@'localhost' IDENTIFIED BY 'password';" | mysql -u root \
#&& echo "FLUSH PRIVILEGES;" | mysql -u root 




# FROM alpine

# # indicate dockerfile holder
# LABEL lduhamel="lduhamel@student.s19.be"

# # updating image
# RUN apk update \
#     && apk upgrade

# #installing nginx/php
# RUN apk add mysql mysql-client

# COPY ./srcs/my.cnf /etc/
# COPY start.sh .

# #COPY wordpress .
# COPY init.sql .

# #telegraf
# RUN mkdir -p /etc/telegraf
# COPY telegraf.conf /etc/telegraf/telegraf.conf

# CMD /bin/sh /start.sh
