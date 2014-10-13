<?php

class ArrayUtil {

    public static function payemtType() {
        return array(
            '1' => '1 งวด',
            '2' => '2 งวด',
            '3' => '3 งวด',
            '4' => '4 งวด',
        );
    }

    public static function memberStatus() {
        return array(
            '0' => 'Genaral User',
            '1' => 'Admin',
            '2' => 'Member',
            '3' => 'DisCredit',
            '4' => 'Othre'
        );
    }

    public static function priorityEvent() {
        return array(
            '0' => 'ธรรมดา',
            '1' => 'เร่งด่วน',
            '2' => 'ด่วนที่สุด',
        );
    }

}
