<?php

class LightSwitch
{

    public static function switchLight($IP, $PORT, $STATUS, $RETURN){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, "http://".$IP."/cm?cmnd=Power".$PORT."%20".$STATUS."");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $result = curl_exec($ch);
        curl_close($ch);
        if ($RETURN){
            return $result;
        }
    }

}