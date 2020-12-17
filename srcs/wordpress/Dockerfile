FROM alpine

LABEL lduhamel="lduhamel@student.s19.be"



#COPY FILES
COPY srcs/telegraf.conf /etc/telegraf/telegraf.conf



#PACKAGES
RUN apk update \
    && apk upgrade
RUN apk add openrc --no-cache
RUN apk add telegraf --repository http://dl-3.alpinelinux.org/alpine/edge/community/ --allow-untrusted --no-cache
#PHPMYADMIN
RUN apk add php7 php7-fpm php7-opcache php7-gd php7-mysqli php7-zlib php7-curl php7-mbstring php7-json php7-session --update --no-cache
COPY srcs/wp-config.php .
#NGINX
RUN apk add nginx
RUN mkdir -p /run/nginx /www
RUN adduser -D -g 'www' www
COPY /srcs/nginx-config /etc/nginx/conf.d/default.conf
RUN chown -R www:www /www
#WORDPRESS
RUN mkdir -p /run/
WORKDIR run
RUN wget https://wordpress.org/latest.zip -O wordpress.zip &&\
    unzip wordpress.zip
COPY srcs/wp-config.php ./wordpress/

#START
COPY srcs/start.sh/ /run
RUN chmod 777 /run/start.sh
CMD sh /run/start.sh
#ENTRYPOINT ["/run/start.sh"]