FROM debian:buster

LABEL lduhamel="lduhamel@student.s19.be"

WORKDIR /srcs

RUN apt update \
    && apt upgrade -y

RUN apt install -y mariadb-server

RUN service mysql start \
&& mysql -u root -p \
&& echo "CREATE DATABASE wordpress;" | mysql -u root \
&& echo "CREATE USER 'user42'@'localhost' IDENTIFIED BY 'password';" | mysql -u root \
&& echo "GRANT ALL PRIVILEGES ON wordpress.* TO 'user42'@'localhost' IDENTIFIED BY 'password';" | mysql -u root \
&& echo "FLUSH PRIVILEGES;" | mysql -u root 


COPY ./srcs/mysqlstart.sh /var/

CMD  bash /var/mysqlstart.sh
