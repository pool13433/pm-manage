<?php

class FrontEndController extends Controller {

    public function actionHome() {
        if (empty(Yii::app()->session['member'])) {
            $this->render("//frontend/welcome");
        } else {
            $criteria = new CDbCriteria();
            //$criteria->compare('news_startdate', date('Y-m-d'), false, '>');
            $criteria->addCondition('news_startdate <= "' . date('Y-m-d') . '" ');
            $criteria->order = 'news_startdate desc';
            $listNews = News::model()->findAll($criteria);
            $this->render("//frontend/dashboard-user", array(
                'listNews' => $listNews
            ));
        }
    }

}
