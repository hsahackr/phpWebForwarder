# phpWebForwarder
Host any website in the WWW without port forwarding, using VPN (e.g. Hamachi) and a bridge server.

## Disclaimer ##

This software is built to make a host, which is not accessible from the world wide web, accessible from the world wide web.
But: It will work with nearly any host which is accessible from the bridge host, this means it will work with nearly any host in the world wide web.
So it can also be used for simple rehosting.

## Installation ## 



## Bug fix for other purposes ##

If you try to use a host, which is already accessible from the world wide web, it might not work because the host detects the headers pointing to your bridge.
You might simply solve it by excluding some headers in the "Headers request" section.
