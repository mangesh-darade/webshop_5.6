<?php

/*
 * Include Top Header Section As Per Settings
 */

include_once('headers/header_strip.php');



/*
 * For header style refer view files as per settings.
 * 
 * Ex. 1) headers/header_fixed_menubar.php 
 *     2) headers/header_fixed_searchbar.php 
 *     3) headers/header_theme_default.php
 * 
 */

include_once("headers/" . $webshop_settings->header_style . ".php");

?> 