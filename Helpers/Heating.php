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

    public static function getMainSystemInfo(){
        $getSystemInfoURL = (new self)->baseURL . "facilities";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt ($ch, CURLOPT_URL, $getSystemInfoURL);
        curl_setopt ($ch, CURLOPT_COOKIEFILE, '/tmp/Vaillant_cookie.txt');
        $return = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        (new self)->debug_to_console($httpcode);
        if($httpcode != "200"){
            (new self)->debug_to_console('not 200');
            (new self)->login();
            $return = curl_exec($ch);
            $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        (new self)->debug_to_console($httpcode);
        }
        curl_close ($ch);
        $values = json_decode($return,true);
        $sysInfoArray = array(
            "serialNumber"=>$values['body']['facilitiesList'][0]['serialNumber'],
            "name"=>$values['body']['facilitiesList'][0]['name'],
            "responsibleCountryCode"=>$values['body']['facilitiesList'][0]['responsibleCountryCode'],
            "supportedBrand"=>$values['body']['facilitiesList'][0]['supportedBrand'],
            "capabilities"=>$values['body']['facilitiesList'][0]['capabilities'][0] . " + ". $values['body']['facilitiesList'][0]['capabilities'][1],
            "macAddressEthernet"=>$values['body']['facilitiesList'][0]['networkInformation']['macAddressEthernet'],
            "macAddressWifiAccessPoint"=>$values['body']['facilitiesList'][0]['networkInformation']['macAddressWifiAccessPoint'],
            "macAddressWifiClient"=>$values['body']['facilitiesList'][0]['networkInformation']['macAddressWifiClient'],
            "firmwareVersion"=>$values['body']['facilitiesList'][0]['firmwareVersion']
        );
        return $sysInfoArray;
    }

    public static function getAllDevices(){
        $serial = self::getMainSystemInfo()["serialNumber"];
        $getDevicesURL = (new self)->baseURL . "facilities/".$serial."/rbr/v1/rooms";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt ($ch, CURLOPT_URL, $getDevicesURL);
        curl_setopt ($ch, CURLOPT_COOKIEFILE, '/tmp/Vaillant_cookie.txt');
        $return = curl_exec($ch);
        //$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close ($ch);
        $values = json_decode($return,true);
        //(new self)->logout();
        return $values;

    }


    function debug_to_console( $data ) {
        $output = $data;
        if ( is_array( $output ) )
            $output = implode( ',', $output);

        echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
    }


    private function login(){
        $smartphoneId = "HomeAutoMike1";
        $username = "mikedhoore";
        $password = "****";
        $token =  self::GetNewToken($smartphoneId,$username,$password);
        self::GetCookiesWithToken($smartphoneId,$username,$token);
    }

    private function logout(){
        $logOutURL = $this->baseURL . "account/authentication/v1/logout";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_POST, true);
        curl_setopt ($ch, CURLOPT_URL, $logOutURL);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/Vaillant_cookie.txt');
        curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close ($ch);
        unlink("/tmp/Vaillant_cookie.txt");
        $this->debug_to_console('logout'.$httpcode);
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