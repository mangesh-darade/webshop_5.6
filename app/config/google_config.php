<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
| 
| To get API details you have to create a Google Project
| at Google API Console (https://console.developers.google.com)
| 
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['google_client_id']        =''; //'959075288949-0oera37kjrd5907nucqth8lvncqvj2ps.apps.googleusercontent.com';
$config['google_client_secret']    =''; //'5_NS9HCdpf0wpR7dc06h9loc';
$config['google_redirect_url']    = 'https://' . $_SERVER['HTTP_HOST'] . '/shop/google_login';
//$config['google']['application_name'] = 'Eshop Simplypos';
//$config['google']['api_key']          = '';
//$config['google']['scopes']           = array();
