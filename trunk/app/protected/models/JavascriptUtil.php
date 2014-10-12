<?php

class JavascriptUtil {

    public static function echoJavascript($function) {
        echo "<script type=\"text/javascript\">" . $function . "</script>";
    }

    public static function returnMessageArray($status, $msg, $url) {
        return array(
            'status' => $status,
            'msg' => $msg,
            'url' => $url
        );
    }

    public static function returnJsonArray($status, $msg, $url) {
        return CJSON::encode(array(
                    'status' => $status,
                    'msg' => $msg,
                    'url' => $url
        ));
    }

}
