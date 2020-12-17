FROM alpine

LABEL lduhamel="lduhamel@student.s19.be"

#COPY FILES
COPY srcs/nginx-config /etc/nginx/conf.d/default.conf
COPY srcs/telegraf.conf /etc/telegraf/telegraf.conf

RUN apk update \
    && apk upgrade
RUN apk add openrc --no-cache
RUN apk add telegraf --repository http://dl-3.alpinelinux.org/alpine/edge/community/ --allow-untrusted --no-cache
#NGINX
RUN apk add nginx 
RUN mkdir -p /run/nginx /www
RUN adduser -D -g 'www' www
RUN chown -R www:www /www
# PHPMYADMIN
RUN apk add php7 php7-fpm php7-opcache php7-gd php7-mysqli php7-zlib php7-curl php7-mbstring php7-json php7-session --update --no-cache
RUN mkdir -p /run/
WORKDIR run
RUN wget http://files.directadmin.com/services/all/phpMyAdmin/phpMyAdmin-5.0.2-all-languages.tar.gz \
   && tar zxvf phpMyAdmin-5.0.2-all-languages.tar.gz \
   && rm phpMyAdmin-5.0.2-all-languages.tar.gz
RUN mv phpMyAdmin-5.0.2-all-languages phpmyadmin
COPY srcs/config.inc.php/ /run/phpmyadmin

#START
COPY srcs/start.sh/ /run
RUN chmod 777 /run/start.sh
CMD sh /run/start.sh