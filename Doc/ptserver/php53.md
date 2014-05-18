
# ubuntu 13.10 / php 5.3.8

sudo apt-get install libjpeg-dev libpng-dev
sudo apt-get install libmcrypt-dev

mkdir -p /data/ptserver/php/538/etc/conf.d

./configure --prefix=/data/ptserver/php/538 \
--with-config-file-path=/data/ptserver/php/538/etc \
--with-config-file-scan-dir=/data/ptserver/php/538/etc/conf.d \
--enable-fpm \
--with-fpm-user=www-data \
--with-fpm-group=www-data \
--with-curl \
--with-pear \
--with-mcrypt \
--enable-mbstring \
--enable-mbregex \
--enable-pdo \
--with-pdo-mysql=mysqlnd \
--with-mysqli=mysqlnd \
--with-mysql=mysqlnd \
--with-openssl \
--with-imap-ssl \
--with-gd \
--with-jpeg-dir \
--with-png-dir \
--enable-exif \
--enable-zip \
--enable-xml \
--disable-rpath \
--enable-bcmath \
--enable-shmop \
--enable-gd-native-ttf \
--with-mhash \
--enable-pcntl \
--enable-sockets \
--with-xmlrpc \
--enable-zip \
--enable-soap \
--with-zlib \
--with-freetype-dir \
--with-gettext \
--enable-dba \
--enable-cli

make 
make install



cp php.ini-development /data/ptserver/php/538/etc/php.ini

sudo ln -s /data/ptserver/php/538/bin/php /usr/bin/php53
cd ..


# php安装错误 (node.c:1953:error) 解决办法

	curl -o php-5.3.8.patch https://mail.gnome.org/archives/xml/2012-August/txtbgxGXAvz4N.txt
	patch -p0 -b < ./php-5.3.8.patch 
	
	patching file ext/dom/node.c
	patching file 
    ext/dom/documenttype.c
    patching file ext/simplexml/simplexml.c


kill -USR2 `cat /data/ptserver/php/538/var/run/php-fpm.pid`
sudo /data/ptserver/php/538/sbin/php-fpm



wget http://pecl.php.net/get/redis-2.2.5.tgz
cd redis-2.2.5
/data/ptserver/php/538/bin/phpize
./configure --with-php-config=/data/ptserver/php/538/bin/php-config
make & make install
echo 'extension = redis.so' > /data/ptserver/php/538/etc/conf.d/redis.ini


git clone git://github.com/xdebug/xdebug.git
cd xdebug
/data/ptserver/php/538/bin/phpize
./configure --with-php-config=/data/ptserver/php/538/bin/php-config
make & make install
echo 'zend_extension = /data/ptserver/php/538/lib/php/extensions/no-debug-non-zts-20090626/xdebug.so' > /data/ptserver/php/538/etc/conf.d/xdebug.ini
vim /data/ptserver/php/538/etc/conf.d/xdebug.ini


xdebug.remote_enable=1
xdebug.remote_handler=dbgp
xdebug.remote_host=localhost
xdebug.remote_port=9001


/data/ptserver/php/538/bin/phpize
./configure --with-php-config=/data/ptserver/php/538/bin/php-config
./configure --with-php-config=/data/ptserver/php/538/bin/php-config
make & make install
echo 'extension = memcache.so' > /data/ptserver/php/538/etc/conf.d/memcache.ini
