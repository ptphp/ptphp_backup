6 October 2013                           Apache Lounge Distribution

                                    mod_fcgid 2.3.9 for Apache 2.2.x Win32


# Original Home: http://httpd.apache.org/mod_fcgid/
#
# Win32 VC10 binary by: Steffen
# Mail: info@apachelounge.com
# Home: http://www.apachelounge.com/


Build with Visual Studio� 2010 SP1 (VC10) x86
--------------------------------------------

Be sure you have installed the Visual C++ 2010 SP1 Redistributable Package x86,
download and install, if you not have it already, from:

  http://www.microsoft.com/download/en/details.aspx?id=8328


# Install:

- Copy mod_fcgid.so to your apache/modules folder


# Add to your httpd.conf:

  LoadModule fcgid_module modules/mod_fcgid.so

# Configuration:

- Configuration, see http://httpd.apache.org/mod_fcgid/mod/mod_fcgid.html

# Upgrading:

  from mod_fcgid 2.2 see  http://httpd.apache.org/mod_fcgid/mod/mod_fcgid.html#upgrade


# Example configuration for php installed in c:\php :

FcgidInitialEnv PATH "c:/php;C:/WINDOWS/system32;C:/WINDOWS;C:/WINDOWS/System32/Wbem;"
FcgidInitialEnv SystemRoot "C:/Windows"
FcgidInitialEnv SystemDrive "C:"
FcgidInitialEnv TEMP "C:/WINDOWS/Temp"
FcgidInitialEnv TMP "C:/WINDOWS/Temp"
FcgidInitialEnv windir "C:/WINDOWS"
FcgidIOTimeout 64
FcgidConnectTimeout 16
FcgidMaxRequestsPerProcess 1000 
FcgidMaxProcesses 50 
FcgidMaxRequestLen 8131072
# Location php.ini:
FcgidInitialEnv PHPRC "c:/php"
FcgidInitialEnv PHP_FCGI_MAX_REQUESTS 1000

<Files ~ "\.php$>"
  AddHandler fcgid-script .php
  FcgidWrapper "c:/php/php-cgi.exe" .php
</Files>

Enjoy,

Steffen


