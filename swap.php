<?php
	
/**

 This is an example token swap service written
 in PHP. This is required by
 the iOS SDK to authenticate a user.

 The service requires the Sinatra gem be installed:

 To run the service, enter your client ID, client
 secret and client callback URL below and place the file on a web server.

 Pass the public URI of this script (eg. http://localhost/swap.php) to the
 token swap method in the iOS SDK:

 NSURL *swapServiceURL = [NSURL urlWithString:@"http://localhost/swap.php"];

 -[SPAuth handleAuthCallbackWithTriggeredAuthURL:url
                   tokenSwapServiceEndpointAtURL:swapServiceURL
                                        callback:callback];


*/

define('k_client_id', "spotify-ios-sdk-beta");
define('k_client_secret', "ba95c775e4b39b8d60b27bcfced57ba473c10046");
define('k_client_callback_url', "spotify-ios-sdk-beta://callback");

if (isset($_POST['code'])) {

	$auth_code = $_POST['code'];

	$params = array(
		"grant_type" => "authorization_code",
		"client_id" => k_client_id,
		"client_secret" => k_client_secret,
		"redirect_uri" => k_client_callback_url,
		"code" => $auth_code		
	);
	
	$ch = curl_init("https://ws.spotify.com/oauth/token"); 

	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($params));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

	$response = curl_exec($ch); 

	curl_close($ch); 

	echo $response;		
}
