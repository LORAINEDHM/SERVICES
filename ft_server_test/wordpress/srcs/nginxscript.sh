RUN apt install -y nginx \
    && service nginx start

RUN apt install -y wget

RUN apt install -y libnss3-tools
RUN wget https://github.com/FiloSottile/mkcert/releases/download/v1.1.2/mkcert-v1.1.2-linux-amd64 \
    && mv mkcert-v1.1.2-linux-amd64 mkcert \
#    && chmod +x autorise l'exécution du fichier en tant que programme \
    && chmod +x mkcert \
   && cp mkcert /usr/local/bin/ \
   && mkcert -install \
   && mkcert localhost

COPY ./srcs/nginx-config /etc/nginx/sites-available/default

RUN chown -R www-data:www-data /var/www/*

EXPOSE 80 443