FROM httpd
RUN apt-get update
RUN apt install php -y
EXPOSE 80
