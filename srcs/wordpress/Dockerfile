FROM alpine

# J'indique qui detient le dockerfile
LABEL lduhamel="lduhamel@student.s19.be"

# je mets a jour l'image
RUN apk update \
    && apk upgrade

RUN apk add openrc --no-cache

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