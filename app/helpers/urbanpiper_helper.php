<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if(!function_exists('UrbanpiperIncludedPlatform')){
	function UrbanpiperIncludedPlatform() {
		return array(
                    'zomato',
                    'swiggy',
                    'urbanpiper',
                    'ubereats',
                    'scootsy',
                    'dunzo',
                    'dotpe',
                    'foodpanda',
                    'amazon',
                    'talabat',
                    'deliveroo',
                    'jahez',
                    'magicpin',
                    'eazydiner',
                    'swiggystore',
                    'zomatomarket'
                    );
    }
}

if(!function_exists('UrbanpiperExcludedPlatform')){
	function UrbanpiperExcludedPlatform() {
		return array(
                    'zomato',
                    'swiggy',
                    'urbanpiper',
//                    'ubereats',
//                    'scootsy',
                    'dunzo',
                    'dotpe',
//                    'foodpanda',
                    'amazon',
//                    'talabat',
//                    'deliveroo',
//                    'jahez',
//                    'magicpin',
//                    'eazydiner',
                    'swiggystore',
                    'zomatomarket'
                    );
    }
}


if(!function_exists('UrbanpiperPlatformUrl')){
    function UrbanpiperPlatformUrl($platform,$city , $storename, $storeId){
        $storename = str_replace(" ", "-", $storename);
    
        switch ($platform){
            case 'zomato':
                      $url = 'https://www.zomato.com/'.$city.'/'.$storename.'/order';  
                break;
            
            case 'swiggy':
                    $url = 'https://www.swiggy.com/restaurants/'.$storename.'-'.$storeId;
                break;
            
            default:
                    $url ='';
                break;
        }
        
        return $url;
    }
}