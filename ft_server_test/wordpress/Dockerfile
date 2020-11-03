FROM debian:buster

LABEL lduhamel="lduhamel@student.s19.be"

RUN apt update \
    && apt upgrade -y

RUN apt install -y wget

RUN wget https://wordpress.org/latest.tar.gz \
    && tar -xvzf latest.tar.gz \
    && rm latest.tar.gz
COPY /srcs/wp-config.php/ /wordpress

