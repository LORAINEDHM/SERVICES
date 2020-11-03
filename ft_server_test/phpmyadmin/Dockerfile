FROM debian:buster

LABEL lduhamel="lduhamel@student.s19.be"

WORKDIR /srcs

RUN apt update \
    && apt upgrade -y

RUN apt install -y nginx \
    && service nginx start

# RUN apt install -y wget

# RUN apt install -y libnss3-tools
# RUN wget https://github.com/FiloSottile/mkcert/releases/download/v1.1.2/mkcert-v1.1.2-linux-amd64 \
#     && mv mkcert-v1.1.2-linux-amd64 mkcert \
# #    && chmod +x autorise l'exécution du fichier en tant que programme \
#     && chmod +x mkcert \
#    && cp mkcert /usr/local/bin/ \
#    && mkcert -install \
#    && mkcert localhost

# COPY ./srcs/nginx-config /etc/nginx/sites-available/default

# EXPOSE 80 443 5000

# RUN apt install -y php-fpm php-common php-mbstring php-xmlrpc php-soap php-gd php-xml php-intl php-mysql php-cli php-ldap php-zip php-curl

# WORKDIR /var/www
# RUN wget https://files.phpmyadmin.net/phpMyAdmin/4.9.0.1/phpMyAdmin-4.9.0.1-all-languages.tar.gz \
#     && tar xvf phpMyAdmin-4.9.0.1-all-languages.tar.gz \
#     && rm phpMyAdmin-4.9.0.1-all-languages.tar.gz \
#     && mv phpMyAdmin-4.9.0.1-all-languages/ /var/www/phpmyadmin

# COPY ./srcs/config.inc.php/ /var/www/phpmyadmin

# RUN chown -R www-data:www-data /var/www/*

# COPY ./srcs/phpstart.sh /var

CMD bash /var/phpstart.sh
