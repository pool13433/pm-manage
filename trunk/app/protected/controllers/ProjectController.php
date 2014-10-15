<?php

class ProjectController extends Controller {

    public function actionRegisterProject($id = null) {
        $criteria = new CDbCriteria();
        $criteria->compare('pro_id', $id);
        $disabled = "";
        if (empty($id)) { // new           
            $project = new Project();
            $project_lang = ProjectLang::model()->findAll();
            $project_uml = ProjectUml::model()->findAll();
        } else { // edit
            $project = Project::model()->findByPk($id);
            if ($project['pro_status'] > 0 && $project['pro_status'] < 3) {
                $disabled = " readonly ";
            }
            /* $project_lang = ProjectLang::model()->findAll($criteria);
              $project_uml = ProjectUml::model()->findAll($criteria); */
            $project_lang = ProjectLang::model()->findAll();
            $project_uml = ProjectUml::model()->findAll();
        }
        $uml = Uml::model()->findAll();
        $tools_dev = ToolsDeveloper::model()->findAll();
        $tools_data = ToolsDatabase::model()->findAll();
        $programming = ProgrammingLanguage::model()->findAll();
        $this->render('//frontend/form-project', array(
            'disabled' => $disabled,
            'uml' => $uml,
            'programming' => $programming,
            'tools_data' => $tools_data,
            'tools_dev' => $tools_dev,
            'project' => $project,
            'project_lang' => $project_lang,
            'project_uml' => $project_uml,
        ));
    }

    public function actionSaveProject() {
        if (!empty($_POST)) {
            if (empty($_POST['id'])) {
                $project = new Project();
            } else {
                $project = Project::model()->findByPk($_POST['id']);
            }
            $project->pro_nameeng = $_POST['nameeng'];
            $project->pro_nameth = $_POST['nameth'];
            $project->mem_id = Yii::app()->session['member']['mem_id'];
            $project->pro_descrition = $_POST['detail'];
            $project->pro_prices = $_POST['price'];
            $project->pro_startdate = DateUtil::formatDate($_POST['startdate'], 'yyyy-MM-dd');
            $project->pro_enddate = DateUtil::formatDate($_POST['enddate'], 'yyyy-MM-dd');
            $project->pro_createdate = new CDbExpression('NOW()');
            $project->pro_paytype = $_POST['payment'];
            //$project->pro_id = $_POST[''];
            $project->pro_tooldevelop = $_POST['tool_dev'];
            $project->pro_tooldatabase = $_POST['tool_data'];
            $project->pro_applicationtype = $_POST['applicationtype'];
            $project->pro_process = "0";
            $project->pro_status = 0;
            $project->pro_pay_step = 0;
            if (empty($_POST['require_uml'])) {
                $project->prouml_use = 0;
            } else {
                $project->prouml_use = $_POST['require_uml'];
            }
            $pro_save = $project->save();
            if ($pro_save) {
                // ################## insert array uml #############
                if (!empty($_POST['uml'])) {

                    // ################ clear uml #################
                    ProjectUml::model()->deleteAllByAttributes(array('pro_id' => $_POST['id']));
                    // ################end clear uml ##############

                    $arrayUml = array();
                    $arrayUml = $_POST['uml'];
                    for ($i = 0; $i < count($arrayUml); $i++) {
                        $projectUml = new ProjectUml();
                        $projectUml->prouml_status = 0;
                        $projectUml->uml_id = $arrayUml[$i];
                        $projectUml->pro_id = $project->pro_id;
                        $projectUml->save();
                    }
                }
                // ##################end insert array uml ##########
                //################## insert language #############
                if (!empty($_POST['programming'])) {

                    // ################ clear language #################
                    ProjectLang::model()->deleteAllByAttributes(array('pro_id' => $_POST['id']));
                    // ################end clear language ##############

                    $arrayLang = array();
                    $arrayLang = $_POST['programming'];
                    for ($j = 0; $j < count($arrayLang); $j ++) {
                        $projectLang = new ProjectLang();
                        $projectLang->pro_id = $project->pro_id;
                        $projectLang->prolan_id = $arrayLang[$j];
                        $projectLang->prolang_createdate = new CDbExpression('NOW()');
                        $projectLang->save();
                    }
                }
                //##################end insert language ##########

                echo JavascriptUtil::returnJsonArray('1', 'ลงทะเบียนสำเร็จ', 'index.php?r=FrontEnd/Home');
            } else {
                echo JavascriptUtil::returnJsonArray('0', 'ลงทะเบียนสำเร็จ เกิดข้อผิดพลาด กรุณาติดต่อเจ้าหน้าที่', '');
            }
        } else {
            echo JavascriptUtil::returnJsonArray('0', 'ไม่มีข้อมูล สำหรับการบันทึก', '');
        }
    }

    public function actionListProject($status = null) {
        $criteria = new CDbCriteria();
        if (Yii::app()->session['member']['mem_status'] != 1):
            $criteria->compare('mem_id', Yii::app()->session['member']['mem_id']);
        endif;
        if (isset($status)):
            $criteria->compare('pro_status', $status);
        endif;
        $listProject = Project::model()->findAll($criteria);
        $this->render('//frontend/list-project', array(
            'listProject' => $listProject,
        ));
    }

    public function actionViewProject($id) {

        // #################### sql builder ###############
        /* $dashboard = Yii::app()->db->createCommand()
          ->select('count()')
          ->from('tbl_user u')
          ->join('tbl_profile p', 'u.id=p.user_id')
          ->where('id=:id', array(':id' => $id))
          ->queryRow(); */
        // #################### sql builder ###############


        $criteriaProject = new CDbCriteria();
        $criteriaProject->alias = 'p';
        $criteriaProject->join = 'LEFT JOIN tools_database tb ON tb.tooldata_id = p.pro_tooldatabase';
        $criteriaProject->join = 'LEFT JOIN tools_developer td ON td.tooldev_id = p.pro_tooldevelop';
        $criteriaProject->compare('pro_id', $id);
        $project = Project::model()->find($criteriaProject);

        $criteriaLang = new CDbCriteria();
        $criteriaLang->alias = 'i';
        $criteriaLang->join = 'LEFT JOIN project pj ON pj.pro_id = i.pro_id';
        $criteriaLang->join = 'LEFT JOIN programming_language pl ON pl.prolan_id = i.prolan_id';
        $criteriaLang->compare('pro_id', $id);

        $criteriaUml = new CDbCriteria();
        $criteriaUml->alias = 'i';
        $criteriaUml->join = 'LEFT JOIN project pj ON pj.pro_id = i.pro_id';
        $criteriaUml->join = 'LEFT JOIN uml u ON u.uml_id = i.uml_id';
        $criteriaUml->compare('pro_id', $id);

        $project_uml = ProjectUml::model()->findAll($criteriaUml);
        $project_lang = ProjectLang::model()->findAll($criteriaLang);
        $this->render('//frontend/view-project', array(
            'project' => $project,
            'project_lang' => $project_lang,
            'project_uml' => $project_uml
        ));
    }

    public function actionChangeUmlStatus($id, $status) {
        $project = ProjectUml::model()->findByPk($id);
        $project->prouml_status = $status;
        $status = $project->save();
        if ($status) {
            echo JavascriptUtil::returnJsonArray('1', 'เปลี่ยนสถานะ สำเร็จ', '');
        } else {
            echo JavascriptUtil::returnJsonArray('0', 'เปลี่ยนสถานะไม่ได้', '');
        }
    }

    public function actionGetToolsDev() {
        $tools = ToolsDeveloper::model()->findAll();
        echo CJSON::encode($tools);
    }

    public function actionGetToolsData() {
        $tools = ToolsDatabase::model()->findAll();
        echo CJSON::encode($tools);
    }

    public function actionGetProgramming() {
        $programming = ProgrammingLanguage::model()->findAll();
        echo CJSON::encode($programming);
    }

    public function actionGetProjectUmlChekced($id = null, $pro_id = null) {
        $criteria = new CDbCriteria();
        $criteria->compare('uml_id', $id);
        $criteria->compare('pro_id', $pro_id);
        $proUml = ProjectUml::model()->find($criteria);
        //var_dump($proUml);
        if ($proUml) {
            echo 'OK';
        }
    }

    public function actionGetProjectLanguageChecked($id = null, $pro_id = null) {
        $criteria = new CDbCriteria();
        $criteria->compare('prolan_id', $id);
        $criteria->compare('pro_id', $pro_id);
        $proLang = ProjectLang::model()->find($criteria);
        if ($proLang) {
            echo 'OK';
        }
    }

    public function actionListProjectLog($id = null, $proid = null) {
        if (empty($id)) {
            $project_log = new ProjectLog();
        } else {
            $project_log = ProjectLog::model()->findByPk($id);
        }
        $project_log->pro_id = $proid;

        $criteria = new CDbCriteria();
        $criteria->alias = 'l';
        $criteria->join = ' LEFT JOIN project p ON p.pro_id = l.pro_id';
        $criteria->compare('l.pro_id', $proid);

        $model = ProjectLog::model()->findAll($criteria);
        $this->render('//front/list_project_log', array(
            'project_log' => $project_log,
            'listProjectLog' => $model,
        ));
    }

    public function actionSaveProjectLog() {
        if (!empty($_POST)) {
            if (empty($_POST['id'])) {
                $project_log = new ProjectLog();
            } else {
                $project_log = ProjectLog::model()->findByPk($_POST['id']);
            }
            $project_log->prolog_name = $_POST['name'];
            $project_log->pro_id = $_POST['proid'];
            $project_log->prolog_createdate = new CDbExpression('NOW()');
            $project_log->prolog_fixdate = new CDbExpression('NOW()');
            $project_log->prolog_status = 0;
            $project_log->save();

            $this->redirect(array('Project/ListProjectLog', 'proid' => $_POST['proid']));
        }
    }

    public function actionDeleteProjectLog($id) {
        if (ProjectLog::model()->deleteByPk($id)) {
            echo 'success';
        }
        //$this->redirect(array('Project/ListProjectLog', 'proid' => $proid));
    }

    public function actionChangeProjectStatus($id, $status) {
        $project = Project::model()->findByPk($id);
        $project->pro_status = $status;
        if ($project->save()) {
            echo JavascriptUtil::returnJsonArray('1', 'ปรับสถานะสำเร็จ', '');
        } else {
            echo JavascriptUtil::returnJsonArray('0', 'ปรับสถานะ ไม่ได้', '');
        }
    }

    public function actionChangeProjectProperties() {
        $project = Project::model()->findByPk($_POST['id']);
        $project->pro_pay1 = $_POST['pay1'];
        $project->pro_pay2 = $_POST['pay2'];
        $project->pro_pay3 = $_POST['pay3'];
        $project->pro_process = $_POST['process'];
        if ($project->save()) {
            echo JavascriptUtil::returnJsonArray('1', 'ปรับสถานะสำเร็จ', '');
        } else {
            echo JavascriptUtil::returnJsonArray('0', 'ปรับสถานะ ไม่ได้', '');
        }
    }

    // ############################## History #############################################
    public function actionListProjectHistory() {
        $criteria = new CDbCriteria();
        $criteria->alias = 'h';
        $criteria->join = 'LEFT JOIN project p ON p.pro_id = h.pro_id';
        $listProjectHistory = ProjectHistory::model()->findAll();
        $this->render('//backend/list-history', array(
            'listProjectHistory' => $listProjectHistory,
        ));
    }

    public function actionNewProjectHistory($id = null) {
        if (empty($id)) {
            $history = new ProjectHistory();
        } else {
            $history = ProjectHistory::model()->findByPk($id);
        }
        $this->render('//backend/form-history', array(
            'history' => $history,
        ));
        /*
          $criteria = new CDbCriteria();
          $criteria->alias = 'h';
          $criteria->join = 'JOIN project p ON p.pro_id = h.pro_id';
          $criteria->compare('h.pro_id', $_POST['id']);
         */
    }

    public function actionSaveProjectHistory() {
        if (empty($_POST['id'])) {
            $history = new ProjectHistory();
        } else {
            $history = ProjectHistory::model()->findByPk($_POST['id']);
        }
        $history->prohis_topic = $_POST['topic'];
        $history->pro_id = $_POST['pro_id'];
        $history->prohis_detail = $_POST['detail'];
        $history->prohis_getdate = DateUtil::formatDate($_POST['getdate'], 'yyyy-MM-dd');
        $history->prohis_starttime = $_POST['starttime'];
        $history->prohis_endtime = $_POST['endtime'];
        if ($history->save()) {
            echo JavascriptUtil::returnJsonArray('1', 'บันทึกสำเร็จ', 'index.php?r=Project/ListProjectHistory');
        } else {
            echo JavascriptUtil::returnJsonArray('0', 'บันทึก ไม่ได้', '');
        }
    }

    public function actionSearchProjectByWord($word) {
        $criteria = new CDbCriteria();
        if (!empty($word)) {
            $criteria->compare('pro_nameth', $word, true, 'OR');
            $criteria->compare('pro_nameeng', $word, true, 'OR');
        }
        $listData = Project::model()->findAll($criteria);
        echo CJSON::encode($listData);
    }

    public function actionDeleteProjectHistory($id) {
        if (ProjectHistory::model()->deleteByPk($id)) {
            echo JavascriptUtil::returnJsonArray('1', 'ลบสำเร็จ', '');
        } else {
            echo JavascriptUtil::returnJsonArray('0', 'ลบไม่ได้', '');
        }
    }

    // ############################## History #############################################
}
