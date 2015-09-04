<?php

/*
@author Iain Mullan (@iainmullan)
@date 14/05/2014

Updated swap.php to add refresh token and changes Spotify have made with their api location etc.
In iOS app update your kTokenSwapServiceURL and kTokenRefreshServiceURL to call this script.
*/

//Change these details to match your own (these are from Spotify sample):
define('k_client_id', "spotify-ios-sdk-beta");
define('k_client_secret', "ba95c775e4b39b8d60b27bcfced57ba473c10046");
define('k_client_callback_url', "spotify-ios-sdk-beta://callback");

if (isset($_POST['code'])) {
	//Exchange authorization code for access token to access API
	$auth_code = $_POST['code'];
	$params = array(
		"grant_type" => "authorization_code",
		"client_id" => k_client_id,
		"client_secret" => k_client_secret,
		"redirect_uri" => k_client_callback_url,
		"code" => $auth_code		
	);
	
	$ch = curl_init("https://accounts.spotify.com/api/token"); 
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($params));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	$response = curl_exec($ch); 
	curl_close($ch); 
	echo $response;		

} else if(isset($_POST['refresh_token'])) {
	//Renew expired access token from refresh token
	$refresh_token = $_POST['refresh_token'];
	$params = array(
		"grant_type" => "refresh_token",
		"client_id" => k_client_id,
		"client_secret" => k_client_secret,
		"refresh_token" => $refresh_token		
	);
	
	$ch = curl_init("https://accounts.spotify.com/api/token"); 
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($params));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	$response = curl_exec($ch); 
	curl_close($ch); 
	echo $response;		
}

?>
