<?php
/**
 * Download a image from IP Camera
 * It's just a small example.
 *
 * @link			http://deerme.org/php/descargando-archivos-con-php-curl
 *				http://deerme.org/php/capturar-datos-de-otra-web-en-php
 * @author			deerme.org
 */

$camera_url = "http://192.168.1.120:8080/jpg/image.jpg";
#$camera_url = "http://beta.appvision.cl/download.php";
$camera_user = "admin";
$camera_passwd = "123456";

// Download the file
$fp = fopen("image.jpg", 'w+');
$ch = curl_init($camera_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_USERPWD, $camera_user . ":" . $camera_passwd);
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_exec($ch);
