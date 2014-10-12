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

}
