<?php

class Util {

    public static function payemtType() {
        return array(
            '1' => '1 เดือน',
            '2' => '2 เดือน',
            '3' => '3 เดือน',
            '4' => '4 เดือน',
        );
    }

    public static function convertDate($strdate) {
        $array = split("/", $strdate);
        return $array[2] . "-" . $array[1] . "-" . $array[0];
    }

    public static function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public static function explodStrFile($filename) {
        // ########## splite file ########
        return array(
            "type" => end(explode(".", strtolower($filename))),
            "name" => substr(strtolower($filename), strpos(strtolower($filename), '.') + 1),
        );
        // ########## splite file ########
    }

}
