<?php

$url = 'https://findmyfbid.com/'; // receiving service
$url_profile = 'https://www.facebook.com/pogodin1975'; // specify the link to the profile
$data = array('action' => '/','url' => $url_profile); // create an array of data to send to the site in $url

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'user_agent' => 'Mozilla/5.0 (Windows NT 6.0; rv:26.0) Gecko/20100101 Firefox/26.0', // we imitate client request from the browser
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n", // pass the headers
        'method'  => 'POST', // specify the type of request
        'content' => http_build_query($data) // we insert fields for an image on demand and we transform them through http_build_query
    )
);

$context  = stream_context_create($options); // write the reference to the variable
$result = file_get_contents($url, false, $context); // make a request to the server and record the answer to the new variable
if ($result === FALSE) { /* Handle error */ }

var_dump($result); // view answer