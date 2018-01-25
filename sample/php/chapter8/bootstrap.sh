#!/usr/bin/env bash
rm -rf /var/www
ln -sf /vagrant /var/www
add-apt-repository -y ppa:ondrej/php
apt-get update
apt-get install -y apache2
apt-get install -y php7.0 php7.0-json php7.0-mysql libapache2-mod-php7.0
