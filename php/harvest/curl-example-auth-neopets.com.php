<?php
/**
 * Get a value from a auth site (neopets.com)
 * This is just a example.
 *
 * @link			http://deerme.org/php/descargando-archivos-con-php-curl
 * @author			deerme.org
 */

// Data for the login
$raw_post = "&". http_build_query(array("username" => "	ateismoilustrado"));
$raw_post .= "&". http_build_query(array("password" => "33213321"));
$raw_post .= "&". http_build_query(array("destination" => "%2Finventory.phtml"));


// Login
$ch = curl_init('http://www.neopets.com/login.phtml');
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_POSTFIELDS , $raw_post );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
$buffer = curl_exec($ch);

// Get the NP Value
$ch = curl_init("http://www.neopets.com/inventory.phtml");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
$buffer = curl_exec($ch);

if ( preg_match("|<a id='npanchor' href=\"/inventory\.phtml\">(.*?)</a>|is",$buffer,$cap) )
{
	echo "The site contain a NP: ".$cap[1];
}


