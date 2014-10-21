<?php

class FrontEndController extends Controller {

    public function actionHome() {
        if (empty(Yii::app()->session['member'])) {
            $listMember = Member::model()->findAll();
            $this->render("//frontend/welcome",array(
                'listMember' => $listMember,
            ));
        } else {
            $criteria = new CDbCriteria();
            //$criteria->compare('news_startdate', date('Y-m-d'), false, '>');
            $criteria->addCondition('news_startdate <= "' . date('Y-m-d') . '" ');
            $criteria->order = 'news_startdate desc';
            $listNews = News::model()->findAll($criteria);

            $criteria = new CDbCriteria();
            $criteria->addCondition("file_size > 0");
            $listFile = File::model()->findAll($criteria);

            $this->render("//frontend/dashboard-user", array(
                'listNews' => $listNews,
                'listFile' => $listFile,
            ));
        }
    }

    public function actionJsonEventCalendar() {
        $listEvent = ProjectHistory::model()->findAll();
        $listJson = array();
        for ($i = 0; $i < count($listEvent); $i++) {
            $data = $listEvent[$i];
            $listJson[$i] = array(
                'id' => $i,
                'title' => $data['prohis_topic'],
                'start' => $data['prohis_startdate'],
                'end' => $data['prohis_enddate'],
                'allDay' => false
            );
        }
        echo CJSON::encode($listJson);
    }

}
