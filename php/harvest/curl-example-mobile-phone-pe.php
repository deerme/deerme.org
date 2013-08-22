<?php
/**
 * Get the mobile company from de http://www.deperu.com/celulares/
 * This is just an example and is a possible solution to a question on my blog.. 
 *
 * @link			http://deerme.org/php/capturar-datos-de-otra-web-en-php
 * @author			deerme.org
 */

$phone = "959347173";

$raw_post = "&". http_build_query(array("btnB" => "1"));
$raw_post .= "&". http_build_query(array("txtnumero" => $phone ));

// Login
$ch = curl_init('http://www.deperu.com/celulares/');
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_POSTFIELDS , $raw_post );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
$buffer = curl_exec($ch);

if ( preg_match_all('|<p class="tcomentario">(.*?)</p>\s+<h3>(.*?)</h3>|is',$buffer,$cap) )
{
	echo "The phone ".$phone." is ".$cap[1][0]." from ".$cap[2][0];
}
