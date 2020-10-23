FROM alpine

#WORKDIR /srcs
# J'indique qui detient le dockerfile
LABEL lduhamel="lduhamel@student.s19.be"

# je mets a jour l'image
RUN apk update

# INSTALL NGINX
RUN apk add nginx
 #   && service nginx start

RUN adduser -g 'Nginx www user' -h /home/www/ www

# SETUP NGINX
# example de fichier config dans /etc/nginx/sites-enabled/default
#COPY ./srcs/nginx-config /etc/nginx/sites-available/default

#EXPOSE 80 443

#RUN service nginx restart

#CMD ["nginx", "-g", "daemon off;"]
