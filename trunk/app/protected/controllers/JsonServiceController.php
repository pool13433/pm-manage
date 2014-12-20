<?php

class JsonServiceController extends Controller {

    public function actionJsonCalendar($start = null, $end = null,$_ = null) {
        $calendar = Project::model()->findAll();
        $list = [];
        foreach ($calendar as $data) :
            $list[] = array(
                'title' => (String) $data['pro_nameth'],
                'start' => $data['pro_startdate'],
                'end' => $data['pro_enddate'],
                'allDay' => false
            );
        endforeach;
        echo CJSON::encode($list);
    }

}
