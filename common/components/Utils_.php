<?php
/**
 * User: TamNguyen
 * Date: 7/17/15
 * Time: 11:34
 * File name: Utils.php
 * Project name: omniweb
 */
namespace common\components;

use Yii;
use common\models\EmailQueue;
use backend\modules\languages\models\Languages;
use backend\modules\settings\models\Settings;


/**
 * 
 * @author TamNguyen
 *
 */
class Utils {
    
    public static function getIDURLTitle($url_title) {
        $num = strpos($url_title, '-');
        if ($num) {
            return substr($url_title, 0, $num);
        }
        else {
            if (is_numeric($url_title)) {
                return $url_title;
            }
        }
        return 0;
    }
    
    public static function create_slug($string){
    	$unicode = array(
    			'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
	            'd'=>'đ',
	            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
	            'i'=>'í|ì|ỉ|ĩ|ị',
	            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
	            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
	            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
				'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
	            'D'=>'Đ',
	            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
	            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
	            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
	            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
	            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    	);
    	$string	= trim($string);
    	foreach($unicode as $nonUnicode=>$uni){
    		$string = preg_replace("/($uni)/i", $nonUnicode, $string);
    	}
    	$string = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
    	return strtolower(trim($string));
    }
    
    public static function createURLTitle($id, $title_string) {
    	//        return $id.'-'.url_title($title_string);
    	return $id.'-'.Utils::create_slug($title_string);
    }
    

	
    /**
     * @author TamNguyen
     * @param integer $length
     * @param boolean $character
     */
    
    public static function randomGen($length,$character = true) {
        $random= "";
        srand((double)microtime()*1000000);
       
        $char_list  = "1234567890";
        
        if($character){
            $char_list .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $char_list .= "abcdefghijklmnopqrstuvwxyz";
        }
        
        for($i = 0; $i < $length; $i++)  
        {    
         $random .= substr($char_list,(rand()%(strlen($char_list))), 1);  
        }  
        return $random;
    }
    
    /**
     * @author TamNguyen
     * @param string $phone
     * @return boolean
     */
    public static function isValidPhoneNumber($phone)
    {
        if(empty($phone))
            return false;
        
        if (preg_match("/^[+][0-9]{9,12}$/", $phone))
            return true;
        return false;
    }
    
    /**
     * @author TamNguyen
     * @param string $string
     * @return boolean
     */
    public static function isValidateNumber($string){
        if(empty($string))
            return false;
        if (preg_match_all("/[A-z!@#$%^&*()\-_=+{};:,<.>]/", $string) === 0 )
            return true;
        return false;
    }

    public static function isValidateNumberLanLine($phone){
        if (preg_match("/\+1[0-9]{10}/", $phone))
            return true;
        return false;
    }
    /**
     * @author TamNguyen
     * @param string $string
     * @return boolean
     */
    public static function isValidateUserName($string){
        if(empty($string))
            return false;
        if (preg_match("/[A-Z!@#$%^&*()\=+{};:,<>]/", $string)=== 0)
            return true;
        return false;
    }
   
    
   
    /**   
     * @author TamNguyen 
     * @param array $param
     * @return array
     */
    public static function getArrayValueParam($param = []){
        $out = [];
        foreach ($param as $key=>$value){
            $out[] = $value;
        }
        return $out;
    }
    
	
  
   
   public static function sendEmail($emailTo, $subject, $content, $bcc = false){
	   	$supportEmail	= Yii::$app->params['supportEmail'];
	   	$supportFrom	= Yii::$app->params['supportEmailFrom'];
	   //	$content		.= '<p>'.Yii::t('app','Locally yours').'</p>'; 
	   	$html			= Yii::$app->controller->renderPartial('@common/mail/layouts/html',['content'=>$content]);
//    		$message = Yii::$app->mailer->compose();
//    		$message->setTo($emailTo);
//    		$message->setFrom([$supportEmail => $supportFrom]);
//    		$message->setSubject($subject);
//    		$message->setHtmlBody($html);
//    		if($bcc) $message->setBcc([$supportEmail => $supportFrom]);
//    		@$message->send();
		$email = new EmailQueue();
		$email->email_to 	= $emailTo;
		$email->email_from 	= json_encode([$supportEmail => $supportFrom]);
		$email->email_bcc 	= $bcc ? 1 : 0;
		$email->subject		= $subject;
		$email->message		= $html;
		$email->sent		= 0;
		$email->save(false);
   }
   
   public static function doSendMail($emailTo, $subject, $html, $bcc = false){
	   	$supportEmail	= Yii::$app->params['supportEmail'];
	   	$supportFrom	= Yii::$app->params['supportEmailFrom'];
   		$message = Yii::$app->mailer->compose();
   		$message->setTo($emailTo);
   		$message->setFrom([$supportEmail => $supportFrom]);
   		$message->setSubject($subject);
   		$message->setHtmlBody($html);
   		if($bcc) $message->setBcc([$supportEmail => $supportFrom]);
   		@$message->send();   	
   }
   
   public static function checkLength($text, $maxchars = 0, $def = null) {
   
   	$newtext = Utils::safeStrip($text);
   	$strlen = strlen($newtext);
   
   	if ($maxchars > 0 && $maxchars < $strlen) {
   		$text = substr($newtext, 0, $maxchars);
   
   		$text1 = substr($text, 0, strripos($text, ' ', 0));
   		if (strlen($text1) == 0) {
   			$text1 = $text;
   		}
   		if ($def == 'none_ext') {
   			$text = $text1;
   		} else {
   			$text = $text1 . "...";
   		}
   
   	} else {
   		$text = Utils::safeStrip($text);
   	}
   
   	return $text;
   }
   
   /**
    * Strips tags without removing possible white space between words.
    *
    * @param string String to strip tags from.
    */
   public static function safeStrip($text) {
   
   	$text = preg_replace('/</', ' <', $text);
   	$text = preg_replace('/>/', '> ', $text);
   	$desc = strip_tags($text);
   	$desc = preg_replace('/  /', ' ', $desc);
   
   	return $desc;
   }
   
   public static function reloadLanguage(){
	   	$session = new Session();
	   	$session->open();
	   	$language = !empty($session['language']) ? $session['language'] : 'vi';
	   	\Yii::$app->language = $language;
   }
   
   
   public static function loadImage($image){
   		$assetURL 	= Yii::$app->params['assets-url'];
   		$rootImgURL	= $assetURL.'images/';
   		return $rootImgURL.$image;
   }
   
   function getImage($text){
	   	if (preg_match_all("|src[\s\v]*=[\s\v]*['\"](.*)['\"]|Ui",$text,$matches,PREG_PATTERN_ORDER) == 0){
	   		if (preg_match_all("|src[\s\v]*=[\s\v]*([\S]+)[\s\v]|Ui",$text,$matches,PREG_PATTERN_ORDER) == 0) return 0;
	   	}
	   	$image_link = $matches[1][0];
	   	return empty($image_link) ? false : $image_link;
   }
  
	
	public static function ogpTag($title = false, $description = false, $image = false){
		$assetURL		= Yii::$app->params['assets-url'];
		$directoryAsset = $assetURL.'themes/'.Yii::$app->params['theme'].'/';
		
		$defaultTitle			= Utils::loadSetting('website-title');
		$defaultDescription		= Utils::loadSetting('website-description');
		$defaultKeyword			= Utils::loadSetting('website-keyword');
		$defaultImage			= $directoryAsset.'img/image.jpg';
		
		$title 			= empty($title) ? $defaultTitle : $defaultTitle.' - '.$title;
		$title			= Utils::safeStrip($title);
		$description 	= empty($description) ? $defaultDescription : $description;
		$description	= Utils::safeStrip($description);
		$url 			= Yii::$app->urlManager->createAbsoluteUrl(Yii::$app->request->url); 
		$image 			= empty($image) ? $defaultImage : $image;
		
		\Yii::$app->view->registerMetaTag([
    		'name' => 'title',
    		'content' => $title,
		]);
		\Yii::$app->view->registerMetaTag([
    		'name' => 'description',
    		'content' => $description,
		]);
		\Yii::$app->view->registerMetaTag([
				'name' => 'og:title',
				'content' => $title,
		]);
		\Yii::$app->view->registerMetaTag([
				'name' => 'og:description',
				'content' => $description,
		]);
		\Yii::$app->view->registerMetaTag([
				'name' => 'og:image',
				'content' => $image,
		]);
		\Yii::$app->view->registerMetaTag([
				'name' => 'og:url',
				'content' => $url,
		]);
		\Yii::$app->view->registerMetaTag([
				'name' => 'og:site_name',
				'content' => 'SingMark Hospital',
		]);
		\Yii::$app->view->registerMetaTag([
				'name' => 'og:type',
				'content' => 'website',
		]);
		
	}
	
	public static function loadDeafaultLanguage(){
		$language = Languages::findOne(['status'=>1,'default'=>1]);
		return $language;
	}
	
	public static function loadSetting($key = false){
		if(empty($key))return false;
		$item = Settings::findOne(['key'=>strval($key)]);
		return !empty($item->value) ? $item->value : false;
	}
        
       public static  function convert_number_to_words($number) {



        $hyphen = ' ';

        $conjunction = '  ';

        $separator = ' ';

        $negative = 'âm ';

        $decimal = ' phẩy ';

        $dictionary = array(
            0 => 'không',
            1 => 'một',
            2 => 'hai',
            3 => 'ba',
            4 => 'bốn',
            5 => 'năm',
            6 => 'sáu',
            7 => 'bảy',
            8 => 'tám',
            9 => 'chín',
            10 => 'mười',
            11 => 'mười một',
            12 => 'mười hai',
            13 => 'mười ba',
            14 => 'mười bốn',
            15 => 'mười năm',
            16 => 'mười sáu',
            17 => 'mười bảy',
            18 => 'mười tám',
            19 => 'mười chín',
            20 => 'hai mươi',
            30 => 'ba mươi',
            40 => 'bốn mươi',
            50 => 'năm mươi',
            60 => 'sáu mươi',
            70 => 'bảy mươi',
            80 => 'tám mươi',
            90 => 'chín mươi',
            100 => 'trăm',
            1000 => 'ngàn',
            1000000 => 'triệu',
            1000000000 => 'tỷ',
            1000000000000 => 'nghìn tỷ',
            1000000000000000 => 'ngàn triệu triệu',
            1000000000000000000 => 'tỷ tỷ'
        );



        if (!is_numeric($number)) {

            return false;
        }



        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {

// overflow

            trigger_error(
                    'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX, E_USER_WARNING
            );

            return false;
        }



        if ($number < 0) {

            return $negative .Utils::convert_number_to_words(abs($number));
        }



        $string = $fraction = null;



        if (strpos($number, '.') !== false) {

            list($number, $fraction) = explode('.', $number);
        }



        switch (true) {

            case $number < 21:

                $string = $dictionary[$number];

                break;

            case $number < 100:

                $tens = ((int) ($number / 10)) * 10;

                $units = $number % 10;

                $string = $dictionary[$tens];

                if ($units) {

                    $string .= $hyphen . $dictionary[$units];
                }

                break;

            case $number < 1000:

                $hundreds = $number / 100;

                $remainder = $number % 100;

                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];

                if ($remainder) {

                    $string .= $conjunction . Utils::convert_number_to_words($remainder);
                }

                break;

            default:

                $baseUnit = pow(1000, floor(log($number, 1000)));

                $numBaseUnits = (int) ($number / $baseUnit);

                $remainder = $number % $baseUnit;

                $string = Utils::convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];

                if ($remainder) {

                    $string .= $remainder < 100 ? $conjunction : $separator;

                    $string .= Utils::convert_number_to_words($remainder);
                }

                break;
        }



        if (null !== $fraction && is_numeric($fraction)) {

            $string .= $decimal;

            $words = array();

            foreach (str_split((string) $fraction) as $number) {

                $words[] = $dictionary[$number];
            }

            $string .= implode(' ', $words);
        }

        $string = str_replace("mươi năm", "mươi lăm", $string);
        $string = str_replace("mười năm", "mười lăm", $string);
        $string = str_replace("mươi một", "mươi mốt", $string);
        return ucfirst($string);
    }

}
