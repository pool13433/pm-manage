<?php

class DropdownController extends Controller {

    // ##################### ToolsDatabase ###################
    public function actionListDatabase() {
        $listDatabase = ToolsDatabase::model()->findAll();
        $this->render('//backend/list-database', array(
            'listDatabase' => $listDatabase,
        ));
    }

    public function actionNewDatabase($id = null) {
        if (empty($id)) {
            $database = new ToolsDatabase();
        } else {
            $database = ToolsDatabase::model()->findByPk($id);
        }
        $this->render('//backend/form-database', array(
            'database' => $database
        ));
    }

    public function actionSaveDatabase() {
        if (empty($_POST['id'])) {
            $database = new ToolsDatabase();
        } else {
            $database = ToolsDatabase::model()->findByPk($_POST['id']);
        }
        $database->tooldata_name = $_POST['name'];
        $database->tooldata_desc = $_POST['desc'];
        $database->tooldata_createdate = new CDbExpression('NOW()');
        if ($database->save()) {
            echo JavascriptUtil::returnJsonArray('1', 'บันทึกสำเร็จ', 'index.php?r=Dropdown/ListDatabase');
        } else {
            echo JavascriptUtil::returnJsonArray('0', 'บันทึก ไม่ได้', '');
        }
    }

    public function actionDeleteDatabase($id) {
        if (ToolsDatabase::model()->deleteByPk($id)) {
            echo JavascriptUtil::returnJsonArray('1', 'ลบสำเร็จ', '');
        } else {
            echo JavascriptUtil::returnJsonArray('0', 'ลบไม่ได้', '');
        }
    }

    // #####################End ToolsDatabase ##############
    //##################### ToolsDeveloper    ###############
    public function actionListDeveloper() {
        $listDeveloper = ToolsDeveloper::model()->findAll();
        $this->render('//backend/list-developer', array(
            'listDeveloper' => $listDeveloper,
        ));
    }

    public function actionNewDeveloper($id = null) {
        if (empty($id)) {
            $developer = new ToolsDeveloper();
        } else {
            $developer = ToolsDeveloper::model()->findByPk($id);
        }
        $this->render('//backend/form-developer', array(
            'developer' => $developer,
        ));
    }

    public function actionSaveDeveloper() {
        if (empty($_POST['id'])) {
            $developer = new ToolsDeveloper();
        } else {
            $developer = ToolsDeveloper::model()->findByPk($_POST['id']);
        }
        $developer->tooldev_name = $_POST['name'];
        $developer->tooldev_desc = $_POST['desc'];
        $developer->tooldev_createdate = new CDbExpression('NOW()');
        if ($developer->save()) {
            echo JavascriptUtil::returnJsonArray('1', 'บันทึกสำเร็จ', 'index.php?r=Dropdown/ListDeveloper');
        } else {
            echo JavascriptUtil::returnJsonArray('0', 'บันทึก ไม่ได้', '');
        }
    }

    public function actionDeleteDeveloper($id) {
        if (ToolsDeveloper::model()->deleteByPk($id)) {
            echo JavascriptUtil::returnJsonArray('1', 'ลบสำเร็จ', '');
        } else {
            echo JavascriptUtil::returnJsonArray('0', 'ลบไม่ได้', '');
        }
    }

    //#####################End ToolsDeveloper    #############
}
