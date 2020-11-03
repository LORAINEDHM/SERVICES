# J'indique l'image de base
FROM debian:buster

WORKDIR /srcs
# J'indique qui detient le dockerfile
LABEL lduhamel="lduhamel@student.s19.be"

# je mets a jour l'image
RUN apt update \
    && apt upgrade -y

# j'installe wget afin de pouvoir telecharger les services depuis leur source URL
# edit : pas besoin si on utilise ADD
RUN apt install -y wget

# INSTALL NGINX
RUN apt install -y nginx \
    && service nginx start

# INSTALL MYSQL
RUN apt install -y mariadb-server


# INSTALL PHP
RUN apt install -y php-fpm php-common php-mbstring php-xmlrpc php-soap php-gd php-xml php-intl php-mysql php-cli php-ldap php-zip php-curl 

# INSTALL MKCERT CERTIFICATE GENERATOR 
# package "certutil" necessaire pour generer certificats ssl avec mkcert
RUN apt install -y libnss3-tools
RUN wget https://github.com/FiloSottile/mkcert/releases/download/v1.1.2/mkcert-v1.1.2-linux-amd64 \
    && mv mkcert-v1.1.2-linux-amd64 mkcert \
#    && chmod +x autorise l'exécution du fichier en tant que programme \
    && chmod +x mkcert \
   && cp mkcert /usr/local/bin/ \
   && mkcert -install \
   && mkcert localhost

# SETUP NGINX
# example de fichier config dans /etc/nginx/sites-enabled/default
COPY ./srcs/nginx-config /etc/nginx/sites-available/default

# INSTALL PHPMYADMIN
WORKDIR /var/www
RUN wget https://files.phpmyadmin.net/phpMyAdmin/4.9.0.1/phpMyAdmin-4.9.0.1-all-languages.tar.gz \
    && tar xvf phpMyAdmin-4.9.0.1-all-languages.tar.gz \
    && rm phpMyAdmin-4.9.0.1-all-languages.tar.gz \
    && mv phpMyAdmin-4.9.0.1-all-languages/ /var/www/phpmyadmin
# config phpmyadmin => copier fichier de configuration minimal "config.sample.inc.php" situe dans var/www/phpmyadmin
# et le mettre dans un nouveau fichier cree (ici config.inc.php).
COPY ./srcs/config.inc.php/ /var/www/phpmyadmin

# INSTALL WORDPRESS
RUN wget https://wordpress.org/latest.tar.gz \
    && tar -xvzf latest.tar.gz \
    && rm latest.tar.gz
COPY /srcs/wp-config.php/ /wordpress

# SETUP MYSQL
#RUN mysql -u root permet de se connecter au shell mysql, pour ensuite creer la database\
RUN service mysql start \
&& mysql -u root -p \
&& echo "CREATE DATABASE wordpress;" | mysql -u root \
&& echo "CREATE USER 'user42'@'localhost' IDENTIFIED BY 'password';" | mysql -u root \
&& echo "GRANT ALL PRIVILEGES ON wordpress.* TO 'user42'@'localhost' IDENTIFIED BY 'password';" | mysql -u root \
&& echo "FLUSH PRIVILEGES;" | mysql -u root 

#ALLOW NGINX USER
RUN chown -R www-data:www-data /var/www/*

EXPOSE 80 443

COPY ./srcs/start.sh /var/

CMD bash /var/start.sh
