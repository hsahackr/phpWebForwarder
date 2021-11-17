# phpWebForwarder
Host any website in the WWW without port forwarding, using VPN (e.g. Hamachi) and a bridge vServer.

#### Currently supported features ####

- Full support for request & response headers, including status codes, redirects, hostname and cookies
- Full support for text POST requests
- Full support for subdirectories and URL parameters

#### Currently not supported features ####

- POST requests containing files
- Responses containing anything except text

## Disclaimer ##

This software is made to make a host, which is not accessible from the world wide web, accessible from the world wide web.
But: It will work with nearly any host which is accessible from the bridge host, this means it will work with nearly any host in the world wide web.
So it can also be used for simple rehosting.

## Prerequisites & Installation ##

You need ...

#### A host ####
Any computer running a HTTP server with your web project. Can be Windows, Linux, MacOS. ARM Linux is also supported.

#### A logMeIn Hamachi account ####
(Or any other VPN service which allows HTTP connections.)

Register for Hamachi. Then create a new network and download the client on your host (the PC your are running your website). Join your network.
On Windows, you might disable the firewall for Hamachi.

#### A vServer ####
(If you already have another server with root permissions, which is accessible from the WWW, you can take this one).

You need a vServer running Linux (as it is the cheapest, it would also work with Windows). I recommend Ubuntu or Debian, but it will work from any other distribution. 
You can go to ionos.de, there you can buy one for 1€ / month. You can also go to Google Cloud Console and use your free credits for 6 months, but then you need to switch.
If you use another site, make sure the server is accessible from the world wide web.

Then, install the following things:
- PHP 8 with curl + Apache2. You can use this tutorial: https://www.linode.com/docs/guides/install-php-8-for-apache-and-nginx-on-ubuntu/. Make sure to chose Apache and not nginx!
- LogMeIn Hamachi. Install it, then join your network. Then reboot.
- Make a wget request to your host using the IP provided by Hamachi to check if the connection is established.

After that...
- Grab the index.php file and the .htaccess file from this repository with your vServer
- Move them to your Apache root directory
- Edit the index.php file and add the Hamachi IP address of the host

THAT'S IT!

## Bug fixes ##

#### For other purposes ####

If you try to use a host, which is already accessible from the world wide web, it might not work because the host detects the headers pointing to your bridge.
You might simply solve it by excluding some headers in the "Headers request" section.
