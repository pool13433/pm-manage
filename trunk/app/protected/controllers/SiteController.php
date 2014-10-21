<?php

class SiteController extends Controller {

    public function actionIndex() {
        $criteria = new CDbCriteria();
        $criteria->order = "mem_createdate desc";
        $listMember = Member::model()->findAll($criteria);
        $this->render("//frontend/welcome", array(
            'listMember' => $listMember,
        ));
    }

}
