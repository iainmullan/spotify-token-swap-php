# Spotify token-swap service for PHP

(Based on [Paul Lamere's python script](https://github.com/plamere/spotify_token_swap))

This is an example token swap service written in PHP. This is required by
the Spotify iOS SDK to authenticate a user.
To run the service, enter your client ID, client
secret and client callback URL below and place the file on a web server.
Pass the full URL of this script (eg. `http://localhost/swap.php`) to the
token swap method in the iOS SDK:
	
	NSURL *swapServiceURL = [NSURL urlWithString:@"http://localhost/swap.php"];
	-[SPAuth handleAuthCallbackWithTriggeredAuthURL:url
	               tokenSwapServiceEndpointAtURL:swapServiceURL
	                                    callback:callback];

Note: For the beta 1 release of the iOS SDK Spotify provides the
below beta values you can use in your Token Exchange Service code; later,
these values will be invalidated and will need to be replaced by your
own unique values.

