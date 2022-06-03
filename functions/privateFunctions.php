<?php

    function removeSpacesBetwen($str){
        $words = explode(' ',$str);
        $stringArray = [];
        $tmpString = " ";
    
        foreach ($words as $word) {
            if ($word != '') {
                $tmpString = $word;
                $stringArray[] = $tmpString;
            }      
        }
        
        $newString = join(' ',$stringArray);  

        return $newString;
    } 

    function checkSpecialCharacters($str){
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $str)){
            return true;       
        }else{
            return false;
        }
    }

    function clean($string) {
        $string = str_replace(' ', '-', $string); 
     
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
     }

     function cleanInt($string) {
        $string = str_replace(' ', '-', $string); 
     
        return preg_replace('/[^0-9]/', '', $string);
     }

     function checkCuiLength($str){
        if(strlen($str) == 14){
            return 1;
        }else{
            return 0;
        }
     }
    
     function recaptchaValidate($secret, $grecaptcharesponse){
        if(isset($grecaptcharesponse)){
            $captcha=$grecaptcharesponse;
        }
        if(!$captcha){
            echo 'Please check the the captcha form.';
            exit;
        }
    
        $secretKey = $secret;
        $ip = $_SERVER['REMOTE_ADDR'];
        // post request to server
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);
        // should return JSON with success as true
        if($responseKeys["success"]) {
                echo 'Thanks for posting commen';
        } else {
                echo 'You are spammer ! Get the @$%K out';
        }
     }