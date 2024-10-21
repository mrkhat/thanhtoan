<?php
/**
 * User: TamNguyen
 * Date: 7/17/15
 * Time: 11:34
 * File name: Utils.php
 * Project name: omniweb
 */
namespace common\components;

use backend\modules\banners\models\Banners;

/**
 * 
 * @author TamNguyen
 *
 */
class BannerHelp {
    
    public static function items($module = false, $type = 0){
    	$pageID = 0;    	
    	
    	switch($module){
    		case 'home':
    			$page = 0;
    			break;
    			
    		case 'galleries':
    			$page = 4;
    			break;
    		
    		case 'news':
    			$page = 2;
    			break;
    			
    		case 'careers':	
    			$page = 8;
    			break;
    			
    		case 'schedules':
    			$page = 1;
    			break;
    				
    		case 'departments':
    			$page = 5;
    			break;
    				
    		case 'doctors':
    			$page = 6;
    			break;
    						
    		case 'faqs':
    			$page = 7;
    			break;
    							
    		case 'contact':
    			$page = 3;
    			break;
    			
    		default:
    			$page = 1;
    			break;
    	}
    	
    	$banners	= Banners::findAll(['status'=>1,'page'=>intval($page), 'type'=> $type]);
    	return $banners;
    }
}
