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

RUN apk add openrc --no-cache \
    openssl openssh

# INSTALL NGINX
RUN apk add nginx

RUN mkdir -p /run/nginx /www

# -D pour no password / 1er argument = chemin dossier, 2eme argument = nom dossier
RUN adduser -D -g 'www' www

# COPY /srcs/nginx-config /etc/nginx/conf.d/default.conf
COPY srcs/nginx.conf /etc/nginx/nginx.conf
COPY ./srcs/index.html /www/
COPY srcs/start.sh /tmp/start.sh

RUN chown -R www:www /www
# RUN nginx -t

#CONFIG SSL
RUN adduser -D user
RUN echo "user:password" | chpasswd
RUN mkdir /etc/nginx/ssl
RUN ssh-keygen -A
RUN openssl req -x509 -nodes -days 365 -subj "/C=BE/ST=Brussels/O=20/OU=kiss/CN=www.localhost" -newkey rsa:2048 -keyout /etc/ssl/certs/localhost.key -out /etc/ssl/certs/localhost.crt

#START
RUN chmod 777 /tmp/start.sh
CMD sh ./tmp/start.sh


EXPOSE 80

#CMD ["bin/sh"]

#RUN ["nginx", "-g", "daemon off;"]
# ENTRYPOINT ["nginx", "-g", "daemon off;"]

