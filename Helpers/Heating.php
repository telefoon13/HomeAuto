<?php
/**
 * Created by PhpStorm.
 * User: MikeD
 * Date: 04/05/2019
 * Time: 11:43
 */



class Heating
{
    var $baseURL = "https://smart.vaillant.com/mobile/api/v4/";

    public static function login(){
        $smartphoneId = "HomeAutoMike1";
        $username = "mikedhoore";
        $password = "********";
        //$token = (new self)->GetNewToken($smartphoneId,$username,$password);
        //(new self)->GetCookiesWithToken($smartphoneId,$username,$token);
        $sysInfo = (new self)->getMainSystemInfo();
        return $sysInfo;
    }

    //Function to get a token from Vaillant API
    private function GetNewToken($smartphoneId,$username,$password){
        //Set data in array
        $postData = array(
            "smartphoneId" => $smartphoneId,
            "username"=> $username,
            "password"=> $password
        );
        //Encode the array to JSON
        $data_string = json_encode($postData);
        //Extra URL for the new token
        $newTokeURL = $this->baseURL . "account/authentication/v1/token/new";
        $JSONreturn = $this->PostAPICallWithBodyAndReturn($newTokeURL, $data_string);
        $values = json_decode($JSONreturn,true);
        $token = $values['body']['authToken'];
        return $token;
    }

    private function GetCookiesWithToken($smartphoneId,$username,$token){
        //Set data in array
        $postData = array(
            "smartphoneId" => $smartphoneId,
            "username"=> $username,
            "authToken"=> $token
        );
        //Encode the array to JSON
        $data_string = json_encode($postData);
        //Extra URL for the cookies
        $getCookiesURL = $this->baseURL . "account/authentication/v1/authenticate";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt ($ch, CURLOPT_URL, $getCookiesURL);
        curl_setopt($ch, CURLOPT_COOKIEJAR, '/tmp/Vaillant_cookie.txt');
        curl_exec($ch);
        curl_close ($ch);
    }

    private function getMainSystemInfo(){
        $getSystemInfoURL = $this->baseURL . "facilities";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt ($ch, CURLOPT_URL, $getSystemInfoURL);
        curl_setopt ($ch, CURLOPT_COOKIEFILE, '/tmp/Vaillant_cookie.txt');
        $return = curl_exec($ch);
        curl_close ($ch);
        return $return;
    }

    private function PostAPICallWithBodyAndReturn($URL, $body){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$body);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt ($ch, CURLOPT_URL, $URL);
        $return = curl_exec($ch);
        curl_close ($ch);
        return $return;
    }

    private function PostAPICallWithBodyAndNoReturn($URL, $body){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$body);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt ($ch, CURLOPT_URL, $URL);
        curl_exec($ch);
        curl_close ($ch);
    }
}