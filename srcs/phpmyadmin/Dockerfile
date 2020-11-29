FROM alpine

# J'indique qui detient le dockerfile
LABEL lduhamel="lduhamel@student.s19.be"

# je mets a jour l'image
RUN apk update \
    && apk upgrade

COPY srcs/telegraf.conf /etc/telegraf/telegraf.conf
RUN apk add telegraf --repository http://dl-3.alpinelinux.org/alpine/edge/testing/ --allow-untrusted --no-cache

RUN apk add openrc --no-cache

#exiRUN mkdir -p /var/lib/mysql


RUN apk add nginx

# NGINX 
RUN mkdir -p /run/nginx /www

RUN adduser -D -g 'www' www

COPY /srcs/nginx-config /etc/nginx/conf.d/default.conf
#COPY ./srcs/index.html /run

RUN chown -R www:www /www

# PHPMYADMIN

RUN apk add php7 php7-fpm php7-opcache php7-gd php7-mysqli php7-zlib php7-curl php7-mbstring php7-json php7-session --update --no-cache

RUN mkdir -p /run/

WORKDIR run

RUN wget http://files.directadmin.com/services/all/phpMyAdmin/phpMyAdmin-5.0.2-all-languages.tar.gz \
   && tar zxvf phpMyAdmin-5.0.2-all-languages.tar.gz \
   && rm phpMyAdmin-5.0.2-all-languages.tar.gz

RUN mv phpMyAdmin-5.0.2-all-languages phpmyadmin


COPY ./srcs/config.inc.php/ /run/phpmyadmin


#RUN ln -s /usr/share/webapps/phpmyadmin/ /var/www/localhost/htdocs/phpmyadmin

#RUN rc-service phpmyadmin start

COPY ./srcs/start.sh/ /run

RUN chmod 777 /run/start.sh

#RUN php7 -S 0.0.0.0:5000 -t /run/phpmyadmin

ENTRYPOINT ["/run/start.sh"]

EXPOSE 5000