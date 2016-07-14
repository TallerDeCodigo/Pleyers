<?php
	require_once('inc/TwitterAPIExchange.php');

	/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
	$settings = array(
	    'oauth_access_token' => "69086460-TKNqrf4KESiOrzpe9O6b9XsNk5ujp11Iq1PgpsHFn",
	    'oauth_access_token_secret' => "sZVx4RLrfoHDGObKWUE6gA345qoeDKW8c9NccYnmAEGeV",
	    'consumer_key' => "p1sCAJAO1NVJiAlS4lSE2gYD3",
	    'consumer_secret' => "8lFrgVNAvhtlTOJdX4FPydDsrJwp8UtbJXmaOmgk9OnX2REjy9"
	);

	$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
	$getfield = '?username=cova_kid';
	$requestMethod = 'GET';


	/** Perform the request and echo the response **/
	$twitter = new TwitterAPIExchange($settings);
	echo $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();