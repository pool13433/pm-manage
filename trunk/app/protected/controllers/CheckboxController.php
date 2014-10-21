<?php

class CheckboxController extends Controller {

    // ###################### UML #####################
    public function actionListUml() {
        $listUml = Uml::model()->findAll();
        $this->render('//backend/list-uml', array(
            'listUml' => $listUml,
        ));
    }

    public function actionNewUml($id = null) {
        if (empty($id)) {
            $uml = new Uml();
        } else {
            $uml = Uml::model()->findByPk($id);
        }
        $this->render('//backend/form-uml', array(
            'uml' => $uml
        ));
    }

    public function actionSaveUml() {
        // ########### Form ##########
        if (empty($_POST['id'])) {
            // ########### New ##########
            $uml = new Uml();
        } else {
            // ########### Edit ##########
            $uml = Uml::model()->findByPk($_POST['id']);
        }
        $uml->uml_name = $_POST['name'];
        $uml->uml_desc = $_POST['desc'];
        $uml->uml_group = $_POST['group'];
        $uml->uml_createdate = new CDbExpression('NOW()');
        if ($uml->save()) {
            echo JavascriptUtil::returnJsonArray('1', 'บันทึกสำเร็จ', 'index.php?r=Checkbox/ListUml');
        } else {
            echo JavascriptUtil::returnJsonArray('0', 'บันทึก ไม่ได้', '');
        }
    }

    public function actionDeleteUml($id) {
        if (Uml::model()->deleteByPk($id)) {
            echo JavascriptUtil::returnJsonArray('1', 'ลบสำเร็จ', '');
        } else {
            echo JavascriptUtil::returnJsonArray('0', 'ลบไม่ได้', '');
        }
    }

    // ######################End UML #####################

    // ######################Language #####################
    public function actionListLanguageProgramming() {
        $listLanguage = ProgrammingLanguage::model()->findAll();
        $this->render('//backend/list-language', array(
            'listLanguage' => $listLanguage,
        ));
    }

    public function actionNewLanguage($id = null) {
        if (empty($id)) {
            $language = new ProgrammingLanguage();
        } else {
            $language = ProgrammingLanguage::model()->findByPk($id);
        }
        $this->render('//backend/form-language', array(
            'language' => $language,
        ));
    }
    
    public function actionSaveLanguage(){
        if(empty($_POST['id'])){
            $language = new ProgrammingLanguage();
        }else{
            $language = ProgrammingLanguage::model()->findByPk($_POST['id']);
        }
        $language->prolan_name = $_POST['name'];
        $language->prolan_desc = $_POST['desc'];
        $language->prolan_createdate = new CDbExpression('NOW()');
        if($language->save()){
            echo JavascriptUtil::returnJsonArray('1', 'บันทึกสำเร็จ', 'index.php?r=Checkbox/ListLanguageProgramming');
        }else{
            echo JavascriptUtil::returnJsonArray('0', 'บันทึก ไม่ได้', '');
        }
    }
     public function actionDeleteLanguage($id) {
        if (ProgrammingLanguage::model()->deleteByPk($id)) {
            echo JavascriptUtil::returnJsonArray('1', 'ลบสำเร็จ', '');
        } else {
            echo JavascriptUtil::returnJsonArray('0', 'ลบไม่ได้', '');
        }
    }
    // ######################End Language ################
}
