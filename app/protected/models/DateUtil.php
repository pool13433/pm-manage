<?php

class DateUtil {

    public static function formatDate($dateold, $format = null) {
        $formatDefault = 'dd-MM-yyyy';
        if (!empty($format)) {
            $formatDefault = $format;
        }
        return Yii::app()->dateFormatter->format($formatDefault, strtotime($dateold));
    }

    public static function calculateDate($date1, $date2) {
        $datetime1 = date_create($date1);
        $datetime2 = date_create($date2);
        $interval = date_diff($datetime1, $datetime2);
        return $interval->format('%R%a days');
    }

    public static function getDayOfWeeksEng($key = null) {
        $dayEng = array(
            'Sun' => 'Sunday',
            'Mon' => 'Monday',
            'Tues' => 'Tuesday',
            'Wed' => 'Wednesday',
            'Thu' => 'Thursday',
            'Fri' => 'Friday',
            'Sat' => 'Saturday'
        );
        if (!empty($key)) {
            $dayEng = $dayEng[$key];
        }
        return $dayEng;
    }

    public static function getDayOfWeeksThai($key = null) {
        $dayTh = array(
            'Sun' => 'วันอาทิตย์',
            'Mon' => 'วันจันทร์',
            'Tues' => 'วันอังคาร',
            'Wed' => 'วันพุธ',
            'Thu' => 'วันพฤหัสบดี',
            'Fri' => 'วันศุกร์',
            'Sat' => 'วันเสาร์'
        );
        return $dayTh;
    }

}
