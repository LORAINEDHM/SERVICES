FROM alpine

# J'indique qui detient le dockerfile
LABEL lduhamel="lduhamel@student.s19.be"

# je mets a jour l'image
RUN apk update \
    && apk upgrade

#COPY srcs/telegraf.conf /etc/telegraf/telegraf.conf
#RUN apk add telegraf --repository http://dl-3.alpinelinux.org/alpine/edge/testing/ --allow-untrusted --no-cache
RUN wget https://dl.influxdata.com/telegraf/releases/telegraf-1.16.3_linux_amd64.tar.gz
RUN tar xf telegraf-1.16.3_linux_amd64.tar.gz \
   && rm telegraf-1.16.3_linux_amd64.tar.gz
RUN mv telegraf-1.16.3 telegraf
COPY srcs/telegraf.conf /telegraf/etc/telegraf/telegraf.conf

RUN apk add openrc --no-cache

RUN apk add php7 php7-fpm php7-opcache php7-gd php7-mysqli php7-zlib php7-curl php7-mbstring php7-json php7-session --update --no-cache

#RUN mkdir -p /var/lib/mysql


RUN apk add nginx

# NGINX
RUN mkdir -p /run/nginx /www

RUN adduser -D -g 'www' www

COPY /srcs/nginx-config /etc/nginx/conf.d/default.conf
#COPY ./srcs/index.html /run

RUN chown -R www:www /www

COPY	./srcs/wp-config.php .

RUN mkdir -p /run/

WORKDIR run

RUN wget https://wordpress.org/latest.zip -O wordpress.zip &&\
    unzip wordpress.zip

COPY ./srcs/wp-config.php ./wordpress/

COPY ./srcs/start.sh/ /run

RUN chmod 777 /run/start.sh

#RUN ["/run/start.sh"]
ENTRYPOINT ["/run/start.sh"]