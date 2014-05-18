# ubuntu 13.10 / php 5.5.10

axel -n 10 http://cn2.php.net/get/php-5.5.10.tar.gz/from/a/mirror
cd /data/tgz/


./configure \
--prefix=/data/ptserver/php/ubuntu/1310/5510 \
--with-config-file-path=/data/ptserver/php/ubuntu/1310/5510/etc \
--with-config-file-scan-dir=/data/ptserver/php/ubuntu/1310/5510/etc/conf.d \
--with-fpm-user=www-data \
--with-fpm-group=www-data \
--with-pdo-mysql=mysqlnd \
--with-mysqli=mysqlnd \
--with-mysql=mysqlnd \
--with-iconv-dir \
--with-freetype-dir \
--with-jpeg-dir \
--with-png-dir \
--with-zlib \
--with-libxml-dir \
--enable-xml \
--disable-rpath \
--enable-bcmath \
--enable-shmop \
--enable-sysvsem \
--enable-inline-optimization \
--with-curl \
--enable-mbregex \
--enable-fpm \
--enable-mbstring \
--with-mcrypt \
--with-gd \
--enable-gd-native-ttf \
--with-openssl \
--with-mhash \
--with-pear \
--enable-pcntl \
--enable-sockets \
--with-xmlrpc \
--enable-zip \
--enable-soap \
--enable-opcache \
--enable-maintainer-zts \
--enable-cli
make
make install

cp php.ini-development /data/ptserver/php/ubuntu/1310/5510/etc/php.ini




sudo pecl install pthreads
git clone https://github.com/krakjoe/pthreads.git
cd pthreads
/data/ptserver/php/ubuntu/1310/5510/bin/phpize
./configure --with-php-config=/data/ptserver/php/ubuntu/1310/5510/bin/php-config
make
make install

sudo ln -s /data/ptserver/php/ubuntu/1310/5510/bin/php /usr/bin/php5510

/usr/bin/php5510 -m
/usr/bin/php5510 --ini


# php fpm 重启、停止、平滑重载命令

INT, TERM 立刻终止
QUIT 平滑终止
USR1 重新打开日志文件
USR2 平滑重载所有worker进程并重新载入配置和二进制模块


kill -USR2 `cat /data/ptserver/php/ubuntu/1310/5510/var/run/php-fpm.pid`
sudo /data/ptserver/php/ubuntu/1310/5510/sbin/php-fpm


/data/ptserver/php/ubuntu/1310/538/bin/phpize
./configure --with-php-config=/data/ptserver/php/ubuntu/1310/538/bin/php-config
make
make install

echo 'extension = memcache.so' > /data/ptserver/php/ubuntu/1310/538/etc/conf.d/memcache.ini



wget http://pecl.php.net/get/redis-2.2.5.tgz
cd redis-2.2.5
/data/ptserver/php/ubuntu/1310/538/bin/phpize
./configure --with-php-config=/data/ptserver/php/ubuntu/1310/538/bin/php-config
make & make install
echo 'extension = redis.so' > /data/ptserver/php/ubuntu/1310/538/etc/conf.d/redis.ini





cp sapi/fpm/init.d.php-fpm /etc/init.d/php538-fpm 
sudo update-rc.d -f php538-fpm  defaults




shell# tar -xzvf js-1.70.tar-gz
shell# cd js/src

shell# make -f Makefile.ref
Manually install the compiled libraries as below (based on these instructions):

shell# mkdir -p /usr/local/include/js/ 
shell# cp *.{h,tbl} /usr/local/include/js/ 

shell# cd Linux_All_DBG.OBJ
shell# cp *.h /usr/local/include/js/ 
shell# cp js /usr/local/bin/ 
shell# cp libjs.so /usr/local/lib/
shell# ldconfig
Once this is done, download, compile and install the latest revision of the SpiderMonkey extension from SVN with the phpize command (this article uses revision 51):

shell# cd sm-51/
shell# phpize
shell# ./configure
shell# make

shell# make install






kill -USR2 `cat /var/run/php5-fpm.pid`









Installing shared extensions:     /data/ptserver/php/ubuntu/1310/5510/lib/php/extensions/no-debug-zts-20121212/
Installing PHP CLI binary:        /data/ptserver/php/ubuntu/1310/5510/bin/
Installing PHP CLI man page:      /data/ptserver/php/ubuntu/1310/5510/php/man/man1/
Installing PHP FPM binary:        /data/ptserver/php/ubuntu/1310/5510/sbin/
Installing PHP FPM config:        /data/ptserver/php/ubuntu/1310/5510/etc/
Installing PHP FPM man page:      /data/ptserver/php/ubuntu/1310/5510/php/man/man8/
Installing PHP FPM status page:      /data/ptserver/php/ubuntu/1310/5510/php/fpm/
Installing PHP CGI binary:        /data/ptserver/php/ubuntu/1310/5510/bin/
Installing PHP CGI man page:      /data/ptserver/php/ubuntu/1310/5510/php/man/man1/
Installing build environment:     /data/ptserver/php/ubuntu/1310/5510/lib/php/build/
Installing header files:          /data/ptserver/php/ubuntu/1310/5510/include/php/
Installing helper programs:       /data/ptserver/php/ubuntu/1310/5510/bin/
  program: phpize
  program: php-config
Installing man pages:             /data/ptserver/php/ubuntu/1310/5510/php/man/man1/
  page: phpize.1
  page: php-config.1
Installing PEAR environment:      /data/ptserver/php/ubuntu/1310/5510/lib/php/
[PEAR] Archive_Tar    - already installed: 1.3.11
[PEAR] Console_Getopt - already installed: 1.3.1
[PEAR] PEAR           - already installed: 1.9.4
Warning! a PEAR user config file already exists from a previous PEAR installation at '/home/joseph/.pearrc'. You may probably want to remove it.
Wrote PEAR system config file at: /data/ptserver/php/ubuntu/1310/5510/etc/pear.conf
You may want to add: /data/ptserver/php/ubuntu/1310/5510/lib/php to your php.ini include_path
[PEAR] Structures_Graph- already installed: 1.0.4
[PEAR] XML_Util       - already installed: 1.2.1
/data/tgz/php-5.5.10/build/shtool install -c ext/phar/phar.phar /data/ptserver/php/ubuntu/1310/5510/bin
ln -s -f /data/ptserver/php/ubuntu/1310/5510/bin/phar.phar /data/ptserver/php/ubuntu/1310/5510/bin/phar
Installing PDO headers:          /data/ptserver/php/ubuntu/1310/5510/include/php/ext/pdo/







