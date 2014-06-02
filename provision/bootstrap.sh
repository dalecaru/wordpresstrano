#!/usr/bin/env bash
set -e
sudo apt-get -qq update
sudo env DEBIAN_FRONTEND=noninteractive apt-get upgrade -y
sudo apt-get install -y software-properties-common python-software-properties wget curl
sudo apt-get autoremove -y
sudo apt-key adv --keyserver keys.gnupg.net --recv-keys 1C4CBDCDCD2EFD2A
echo "deb http://repo.percona.com/apt $(lsb_release -sc) main" | sudo tee /etc/apt/sources.list.d/percona.list
echo "deb-src http://repo.percona.com/apt $(lsb_release -sc) main" | sudo tee -a /etc/apt/sources.list.d/percona.list
sudo apt-get -qq update
sudo env DEBIAN_FRONTEND=noninteractive apt-get install -q -y percona-server-server-5.6
sudo apt-get install -y php5-cli php5-mcrypt php5-mysql php5-fpm
sudo apt-get install -y php-pear
sudo apt-get install -y nginx sendmail
sudo cp -pv /vagrant/provision/vhost.conf /etc/nginx/sites-available/default
sudo service nginx restart
sudo sed -i -e 's/error_log =.*/error_log = \/var\/log\/php5-fpm.log/' /etc/php5/fpm/php-fpm.conf
sudo sed -i -e 's/user =.*/user = vagrant/' /etc/php5/fpm/pool.d/www.conf
sudo sed -i -e 's/group =.*/group = vagrant/' /etc/php5/fpm/pool.d/www.conf
sudo sed -i -e 's/listen =.*/listen = \/var\/run\/php5-fpm.sock/' /etc/php5/fpm/pool.d/www.conf
sudo /etc/init.d/php5-fpm restart
curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
mysql -uroot -e "CREATE DATABASE IF NOT EXISTS wordpress DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_unicode_ci;"
