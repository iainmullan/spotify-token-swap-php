# PHP Spotify token-swap service for iOS

This is an example token swap and token refresh service written in PHP for use with the Spotify iOS SDK to authenticate a user.

- You will need to replace the details with your own client ID, client secret and client callback URL:
```PHP
//swap.php
define('k_client_id', "spotify-ios-sdk-beta");
define('k_client_secret', "ba95c775e4b39b8d60b27bcfced57ba473c10046");
define('k_client_callback_url', "spotify-ios-sdk-beta://callback");
```

- Next, upload this php file to your web server.

- You can then update your iOS project by changing kTokenSwapServiceURL and kTokenRefreshServiceURL to call this php script:
```Swift
//Swift - config.h in sample project (see below)
#define kTokenSwapServiceURL "http://www.domain.com/swap.php"
#define kTokenRefreshServiceURL "http://www.domain.com/swap.php"
```


(You can get the latest Spotify SDK and sample project [here](https://github.com/spotify/ios-sdk).)

(Updated to include the token refresh swap and the latest changes from Spotify.)
