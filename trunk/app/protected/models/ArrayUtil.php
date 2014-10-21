<?php

class ArrayUtil {

    public static function payemtType($params = null) {
        $array = array(
            '1' => '1 งวด',
            '2' => '2 งวด',
            '3' => '3 งวด',
            '4' => '4 งวด',
        );
        if (!empty($params)):
            foreach ($array as $key => $value):
                if ($key == $params):
                    $array = $value;
                endif;
            endforeach;
        endif;
        return $array;
    }

    public static function memberStatus($params = null) {
        $array = array(
            '0' => 'Genaral User',
            '1' => 'Admin',
            '2' => 'Member',
            '3' => 'DisCredit',
            '4' => 'Othre'
        );
        if (!empty($params)):
            foreach ($array as $key => $value):
                If ($key == $params):
                    $array = $value;
                endif;
            endforeach;
        endif;
        return $array;
    }

    public static function priorityEvent($params = null) {
        $array = array(
            '0' => 'ธรรมดา',
            '1' => 'เร่งด่วน',
            '2' => 'ด่วนที่สุด',
        );
        if (!empty($params)):
            foreach ($array as $key => $value):
                if ($key == $params):
                    $array = $value;
                endif;
            endforeach;
        endif;
        return $array;
    }

    public static function fixStatus($params = null) {
        $array = array(
            '0' => 'ยังไมไ่ด้แก้',
            '1' => 'กำลังแก้ไข',
            '2' => 'แก้ไขแล้ว'
        );
        if (!empty($params)):
            foreach ($array as $key => $value):
                if ($key == $params):
                    $array = $value;
                endif;
            endforeach;
        endif;
        return $array;
    }

    public static function umlGroup($params = null) {
        $array = array(
            '1' => 'แผนภาพประเภทโครงสร้าง',
            '2' => 'แผนภาพประเภทพฤติกรรม',
            '3' => 'แผนภาพประเภทการโต้ตอบ'
        );
        if (!empty($params)):
            foreach ($array as $key => $value):
                if ($key == $params):
                    $array = $value;
                endif;
            endforeach;
        endif;
        return $array;
    }

}
