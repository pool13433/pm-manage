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

    public static function getMonthFullEng() {
        $months = array();
        $ArrayMonths = array("-- Select --",
            "January", "February", "March",
            "April", "May", "June",
            "July", "August", "September",
            "October", "Novemeber", "December"
        );
        for ($i = 0; $i < count($ArrayMonths); $i++):
            if ($i < 10):
                $months["0" . $i] = $ArrayMonths[$i];
            else:
                $months[$i] = $ArrayMonths[$i];
            endif;
        endfor;
        return $months;
    }

    public static function getMonthFullThai() {
        $months = array();
        $ArrayMonths = array('-- Select --', 'มกราคม', 'กุมภาพันธ์',
            'มีนาคม',
            'เมษายน',
            'พฤษภาคม',
            'มิถุนายน',
            'กรกฎาคม',
            'สิงหาคม',
            'กันยายน ',
            'ตุลาคม',
            'พฤศจิกายน',
            'ธันวาคม');
        for ($i = 0; $i < count($ArrayMonths); $i++):
            if ($i > 0) {
                if ($i < 10):
                    $months["0" . $i] = $ArrayMonths[$i];
                else:
                    $months[$i] = $ArrayMonths[$i];
                endif;
            }else {
                $months[''] = '-- Select --';
            }
        endfor;
        return $months;
    }

    public static function getMonthShortEng() {
        return array('-- Select --', 'Jan', 'Feb', 'Mar',
            'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
    }

    public static function getYearAD($length = null) {
        $years = array();
        $years[''] = '-- Select --';
        $currentyear = date('Y');
        if (empty($length)) {
            $length = 10;
        }
        for ($i = 0; $i < $length; $i++):
            $year = ($currentyear - $i);
            $years[$year] = $year;

        endfor;
        return $years;
    }

    public static function getYearBC() {
        $years = array();
        $currentyear = date('Y');
        if (empty($length)) {
            $length = 10;
        }
        for ($i = 0; $i < $length; $i++):
            $years[$i] = ($currentyear - $i) + 543;
        endfor;
        return $years;
    }

    public static function calculateTime($time1, $time2) {
        /* $to_time = strtotime($time1);   //"2008-12-13 10:42:00"
          $from_time = strtotime($time2);  //"2008-12-13 10:21:00"
          echo round(abs($to_time - $from_time) / 60, 2) . " minute"; */
        $datetime1 = new DateTime($time1);
        $datetime2 = new DateTime($time2);
        $interval = $datetime1->diff($datetime2);
        $hours = $interval->format('%h');
        $minutes = $interval->format('%i');
        echo $hours . ":" . $minutes . ":00";
    }

    public static function getDay() {
        $days = array();
        $days[''] = '-- Select --';
        for ($i = 0; $i < 31; $i++):
            if ($i < 9):
                $days["0" . ($i + 1)] = "0" . ($i + 1);
            else:
                $days[($i + 1)] = ($i + 1);
            endif;
        endfor;
        return $days;
    }

}
