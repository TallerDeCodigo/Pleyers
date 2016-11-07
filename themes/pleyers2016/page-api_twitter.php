<?php
	require_once('inc/TwitterAPIExchange.php');

	/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
	$settings = array(
	    'oauth_access_token' => "3167965476-WTWSXzyCogektu0YSwbbffGLrrkoVTw8IwnosKl",
	    'oauth_access_token_secret' => "je2651FolOPU9keGqo2FgUIC6Y81VNycATLEp4gYbvAtU",
	    'consumer_key' => "Xcey3zZJOlElb9SVngDCTTTe7",
	    'consumer_secret' => "qA4Q7XMrq9mXUqVw6Pe3Ro8vYpIIi9XYRqYuYqFbklg0OwAxYx"
	);

	$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
	$getfield = '?username=los_pleyers';
	$requestMethod = 'GET';


	/** Perform the request and echo the response **/
	$twitter = new TwitterAPIExchange($settings);
	echo $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();