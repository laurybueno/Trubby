FROM mariadb:5
MAINTAINER Laury Bueno <laury.bueno@gmail.com>

ENV MYSQL_ROOT_PASSWORD root
ENV MYSQL_DATABASE trubby
ENV MYSQL_USER trubby
ENV MYSQL_PASSWORD trubby

COPY resources/ /docker-entrypoint-initdb.d
