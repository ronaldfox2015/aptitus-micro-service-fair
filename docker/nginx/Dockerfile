FROM ronaldgcr/apt_fair_backend:base

RUN yum install -y \
    nginx \
    php70-fpm \
    acl \
    &&  yum clean all

# Config Infra

COPY ./www.conf /etc/php-fpm.d/www.conf
COPY ./nginx.conf /etc/nginx/nginx.conf

EXPOSE 80

COPY ./entrypoint.sh /init/entrypoint.sh
RUN chmod 755 /init/entrypoint.sh
ENTRYPOINT ["/init/entrypoint.sh"]
