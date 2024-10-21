<?php
/**
 * User: TamNguyen
 * Date: 8/17/16
 * Time: 11:34
 * File name: Baners.php
 * Project name: Singmark Hospital 
 */
namespace common\components;

use backend\modules\menus\models\MenusInformation;
use backend\modules\languages\models\Languages;

/**
 * 
 * @author TamNguyen
 *
 */
class MenuHelp {
    
    
    public static function subMenu($parent = false){
    	$parent				= intval($parent);
    	$currentLanguage	= \Yii::$app->language;
    	if(empty($currentLanguage)){
    		$language		= Languages::findOne(['default'=>1,'status'=>1]);
    	}
    	else{
    		$language		= Languages::findOne(['code'=>$currentLanguage,'status'=>1]);
    	}
    	
    	$menus 	= MenusInformation::find()->where(['parent'=>$parent, 'status' => 1, 'language_id' => $language->id])->all();    	
    	return $menus;
    }
}
