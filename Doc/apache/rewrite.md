RewriteLog "/var/log/apache2/rewrite.log"
RewriteLogLevel 3

RewriteEngine On
RewriteBase /
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php?__R__=$1 [L,QSA]
