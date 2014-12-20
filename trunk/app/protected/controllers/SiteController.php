<?php

class SiteController extends Controller {

    public function actionIndex() {
        $criteria = new CDbCriteria();
        $criteria->order = "mem_lastlogindate desc";
        $listMember = Member::model()->findAll($criteria);
        $this->render("//frontend/welcome", array(
            'listMember' => $listMember,
        ));
    }

    public function actionWelcomeDetail($cmd) {
        $this->render('//frontend/welcome-detail', array(
            'cmd' => $cmd
        ));
    }

    public function actionCalendarSchedule() {
        //$listProjects = Project::model()->findAll();
        $sql = " SELECT `pro_nameth`,";
        $sql .= " `pro_startdate`,`pro_enddate`,DATE_FORMAT(`pro_startdate`,'%m') AS date_start_color,";
        $sql .= " DATE_FORMAT(`pro_enddate`,'%m') AS date_end_color";
        $sql .= " FROM `project` WHERE 1 ORDER BY pro_startdate,pro_enddate";

        $listProjects = Yii::app()->db->createCommand($sql)->queryAll();
        $this->render('//frontend/calendar_schedule', array(
            'listProject' => $listProjects,
        ));
    }

}
