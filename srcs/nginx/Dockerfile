FROM alpine

# J'indique qui detient le dockerfile
LABEL lduhamel="lduhamel@student.s19.be"

# je mets a jour l'image
RUN apk update \
    && apk upgrade

# INSTALL NGINX
RUN apk add nginx

# -D pour no password / 1er argument = chemin dossier, 2eme argument = nom dossier
RUN adduser -D -g 'www' www

COPY /srcs/nginx-config /etc/nginx/conf.d/default.conf

#WORKDIR /etc/nginx/conf.d/

RUN mkdir -p /run/nginx

RUN nginx -t

#RUN chown -R www:www /home/www
#RUN chown -R www:www /www

EXPOSE 80

#CMD ["bin/sh"]

CMD ["nginx", "-g", "daemon off;"]

# SETUP NGINX
# example de fichier config dans /etc/nginx/sites-enabled/default
#COPY ./srcs/nginx-config /etc/nginx/sites-available/default

#EXPOSE 80 443

#RUN service nginx restart

#CMD ["nginx", "-g", "daemon off;"]
