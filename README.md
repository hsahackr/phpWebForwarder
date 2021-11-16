# phpWebForwarder
Host any website in the WWW without port forwarding, using VPN (e.g. Hamachi) and a bridge server.

## Disclaimer ##

This software is built to make a host, which is not accessible from the world wide web, accessible from the world wide web.
But: It will work with nearly any host which is accessible from the bridge host, this means it will work with nearly any host in the world wide web.
So it can also be used for simple rehosting.

## Prerequisite ##

You need:
- A web hosting account. You will find one which is for free or very cheap. You could take a look at the German providers lima-city.de (free, some limits) or la-webhosting.de (2€/month, no limits) => read more about limits at 'Bux fixes & tricks' section

## Installation ## 



## Bug fixes & tricks ##

You are be able to bypass some PHP settings (disable_functions, memory_limit, ...), which are set on you web hosting account.
There might be some reasons you need more settings for:

If you want to start a PHP script in the background, which is taking a long time, but you don't need to wait for the result, then simply add these lines to the top of the specific script:

```php
ignore_user_abort(true);
set_time_limit(0);
```

#### For other purposes ####

If you try to use a host, which is already accessible from the world wide web, it might not work because the host detects the headers pointing to your bridge.
You might simply solve it by excluding some headers in the "Headers request" section.
