<?php

class GetPOW
{

    public static function getPowerToday($IP){
        $url = "http://".$IP."/cm?cmnd=Status%208";
        $data = file_get_contents($url);
        $values = json_decode($data,true);
        return $values['StatusSNS']['ENERGY']['Today'];
    }

    public static function getAll($IP){
        $url = "http://".$IP."/cm?cmnd=Status%208";
        $data = file_get_contents($url);
        $values = json_decode($data,true);
        return
            "<h4>".
            $values['StatusSNS']['ENERGY']['Voltage']
            ."</h4><h4>".
            $values['StatusSNS']['ENERGY']['Current']
            ."</h4><h4>".
            $values['StatusSNS']['ENERGY']['Power']
            ."</h4><h4>".
            $values['StatusSNS']['ENERGY']['Factor']
            ."</h4><h4>".
            $values['StatusSNS']['ENERGY']['Today']
            ."</h4><h4>".
            $values['StatusSNS']['ENERGY']['Yesterday']
            ."</h4><h4>".
            $values['StatusSNS']['ENERGY']['Total']
            ."</h4><h4>"
            ;
    }
}