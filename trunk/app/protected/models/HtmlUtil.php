<?php

class HtmlUtil {

    public static function dropdownList($name, $value, $array, $prefix, $class, $other = null) {
        $html = "<select class='form-control " . $class . "' name='" . $name . "' ";
        if (!empty($other)) {
            $html .= $other;
        }
        $html .= " >";
        foreach ($array as $data):
            if ($data['' . $prefix . '_id'] == $value) {
                $html .= "<option value='" . $data['' . $prefix . '_id'] . "' selected>" . $data['' . $prefix . '_name'] . "</option>";
            } else {
                $html .= "<option value='" . $data['' . $prefix . '_id'] . "'>" . $data['' . $prefix . '_name'] . "</option>";
            }
        endforeach;
        $html .= "</select>";
        return $html;
    }

    public static function dropdownArray($name, $value, $array, $class, $other = null) {
        $html = "<select class='form-control " . $class . "' name='" . $name . "' ";
        if (!empty($other)) {
            $html .= $other;
        }
        $html .= " >";
        foreach ($array as $key => $data):
            if ($key == $value) {
                $html .= "<option value='" . $key . "' selected>" . $data . "</option>";
            } else {
                $html .= "<option value='" . $key . "'>" . $data . "</option>";
            }
        endforeach;
        $html .= "</select>";
        return $html;
    }

    public static function radiobox($name, $value, $checked, $class = null) {
        $html = "<input type='radio' ";
        $html.= " name='" . $name . "' ";
        $html.="  value='" . $value . "' ";
        if ($checked == $value) {
            $html .=" checked ";
        }
        if (!empty($class)) {
            $html .= " class='" . $class . "'";
        }
        $html .= " />";
        return $html;
    }

    public static function checkbox($name, $value, $check, $class) {
        $html = "<input type='checkbox' ";
        $html .= " name='" . $name . "'";
        $html .= " value='" . $value . "'";
        if ($check == $value) {
            $html .= 'checked ';
        }
        $html.=" class='" . $class . "' ";
        $html .= " />";
        return $html;
    }

}
