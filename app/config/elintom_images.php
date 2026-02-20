<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * ElintOm Image Configuration
 * 
 * This config file defines where product images are served from.
 * Since webshop and ElintOm share the same database but have separate deployments,
 * images are served from ElintOm's deployment.
 * 
 * For multi-tenant setup:
 * - Each customer is identified by subdomain (e.g., customer1.yourdomain.com)
 * - Images are stored in: assets/mdata/{customer_subdomain}/uploads/
 * - Webshop will fetch images from ElintOm's domain with the same customer folder
 */

// Base URL where ElintOm is deployed (change this to your actual ElintOm URL)
// Examples:
// - Same domain: 'https://yourdomain.com/ElintOm'
// - Subdomain: 'https://admin.yourdomain.com'
// - Different domain: 'https://elintom.yourdomain.com'
// $config['elintom_base_url'] = 'https://dineintesting.elintpos.in'; // Updated to your ElintOm subdomain
$config['elintom_base_url'] = 'https://herbinnmicromedicines.elintpos.in'; // ElintOm URL where product images are served from

// If ElintOm is on a different domain/subdomain, set the full URL
// If empty, will try to auto-detect from current domain
$config['elintom_image_domain'] = ''; // e.g., 'https://admin.yourdomain.com' or leave empty for auto-detect

// Specific customer folder name in assets/mdata/
// If set, this overrides the default behavior of using the current subdomain
$config['elintom_customer_folder'] = 'herbinnmicromedicines';


// Image path relative to ElintOm base (usually doesn't need to change)
$config['elintom_image_path'] = 'assets/mdata';
