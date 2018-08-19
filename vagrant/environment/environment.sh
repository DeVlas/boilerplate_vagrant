#!/usr/bin/env bash
#update box
yum -y update

#install repos
yum install -y epel-release
rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm
yum -y install https://download.postgresql.org/pub/repos/yum/9.6/redhat/rhel-7-x86_64/pgdg-redhat96-9.6-3.noarch.rpm

#exclude default postgresql repos
sed -i '/name=CentOS-$releasever - Base/a exclude=postgresql*' /etc/yum.repos.d/CentOS-Base.repo
sed -i '/name=CentOS-$releasever - Updates/a exclude=postgresql*' /etc/yum.repos.d/CentOS-Base.repo

#install packages
yum -y install mc nginx redis memcached httpd-tools cronie
yum -y install php72w-common php72w-devel php72w-cli php72w-fpm php72w-mbstring php72w-gd php72w-pecl-imagick
yum -y install php72w-opcache php72w-sodium php72w-xml php72w-pgsql
yum -y install postgresql96 postgresql96-server postgresql96-contrib

#init services
/usr/pgsql-9.6/bin/postgresql96-setup initdb

#stop services
systemctl stop php-fpm
systemctl stop nginx
systemctl stop redis
systemctl stop memcached
systemctl stop postgresql-9.6

#PHP configuration
sed -i 's/^;date.timezone.*=.*$/date.timezone = UTC/' /etc/php.ini
sed -i 's/^;upload_max_filesize.*=.*$/upload_max_filesiza=20M/' /etc/php.ini
sed -i 's/^;post_max_size.*=.*/post_max_size=20M/' /etc/php.ini

#disabled selinux for nginx, reload need
sed -i 's/SELINUX=enforcing/SELINUX=disabled/g' /etc/selinux/config

#POSTGRESQL configuration
sed -i "^#listen_addresses.*=.*$/listen_addresses.*= '*'/" /var/lib/pgsql/9.6/data/postgresql.conf

#copy configs
\cp /home/vagrant/htdocs/vagrant/postgresql/* /var/lib/pgsql/9.6/data
\cp /home/vagrant/htdocs/vagrant/php-fpm/* /etc/php-fpm.d
\cp /home/vagrant/htdocs/vagrant/nginx/conf.d/* /etc/nginx/conf.d

#start services
systemctl start php-fpm
systemctl start nginx
systemctl start redis
systemctl start memcached
systemctl start postgresql-9.6

#autostart services
systemctl enable php-fpm
systemctl enable nginx
systemctl enable redis
systemctl enable memcached
systemctl enable postgresql-9.6

#install composer
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
chmod +x /usr/local/bin/composer
