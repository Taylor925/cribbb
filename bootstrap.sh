#!/usr/bin/env bash

# Update the box
# --------------
# Downloads the package
apt-get Update

#Install vim (if you really want to)
apt-get install -y vim
apt-get install -y nano

#Apache
#-----
apt-get install -y apache2

#Remove /var/www default
rm -rf /var/www

#Symlink /vagrant to /var/www
ln -fs /vagrant /var/www

# Add ServerName to httpd.conf
echo "ServerName localhost" > /etc/apache2/httpd.conf

#Setup hosts file
VHOST=$(cat <<EOF
<VirtualHost *:80>
	DocumentRoot "/vagrant/public"
	ServerName localhost
	<Directory "/vagrant/public">
		AllowOverride All
	</Directory>
</VirtualHost>
EOF
)
echo "${VHOST}" > /etc/apache2/sites-enabled/000-default

#enable mod Rewrite
a2enmod rewrite

#Restart Apache
service apache2 restart

#PHP 5.4
#-----
apt-get install -y libapache2-mod-php5

#Add apt-repo binary
apt-get install -y python-software-properties

#Install PHP 5.4
add-apt-repository ppa:ondrej/php5

#Update
apt-get update

apt-get install -y php5
#PHP More stuff
# Command line
apt-get install -y php5-cli
# PHP mysql
apt-get install -y php5-mysql
# cURL
apt-get install -y php5-curl
#MCrypt
apt-get install -y php5-mcrypt

#cURL
#----
apt-get install -y curl

#mysql
#-----
#ignore post install questions
export DEBIAN_FRONTEND=noninteractive
#install mysql quietly

sudo debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password password ghu89ijkm'
sudo debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password_again password ghu89ijkm'
apt-get -y install mysql-server-5.5

#Git
#----
apt-get install git-core

#Install Composer
#-----
curl -s https://getcomposer.org/installer | php
# Make Composer available globally
mv composer.phar /usr/local/bin/composer

#Laravel stuff
#----
cd /var/www
composer install --dev
# Set up the database
if [ ! -f /var/log/databasesetup ];
then	
	echo "CREATE DATABASE IF NOT EXISTS cribbb" | mysql -uroot -pghu89ijkm
	echo "CREATE USER 'cribbbU'@'localhost' IDENTIFIED BY 'cribbbuser0point0'" | mysql -uroot -pghu89ijkm
	echo "GRANT ALL PRIVILEGES ON cribbb.* TO 'cribbbU'@'localhost' IDENTIFIED BY 'cribbbuser0point0'" | mysql -uroot -pghu89ijkm
	echo "flush privileges" | mysql -uroot -pghu89ijkm
fi
	

# Run artisan migrate to setup the databse and schema, then seed install
php artisan migrate --env=development
php artisan db:seed --env=development


