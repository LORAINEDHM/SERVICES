FROM alpine

# J'indique qui detient le dockerfile
LABEL lduhamel="lduhamel@student.s19.be"

# je mets a jour l'image
RUN apk update \
    && apk upgrade

RUN apk add openrc --no-cache

# INSTALL NGINX
RUN apk add nginx

RUN mkdir -p /run/nginx /www

# -D pour no password / 1er argument = chemin dossier, 2eme argument = nom dossier
RUN adduser -D -g 'www' www

COPY /srcs/nginx-config /etc/nginx/conf.d/default.conf
COPY ./srcs/index.html /www/

RUN chown -R www:www /www
RUN nginx -t

EXPOSE 80

#CMD ["bin/sh"]

#RUN ["nginx", "-g", "daemon off;"]
ENTRYPOINT ["nginx", "-g", "daemon off;"]

