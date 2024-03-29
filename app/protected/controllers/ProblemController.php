<?php

class ProblemController extends Controller {

    public function actionListProblem($view = null) {

        if (!isset($view)):
            // ########### SqlBilder ###############
            $listProblem = Yii::app()->db->createCommand()
                    ->select(" p.prob_id,p.prob_name,p.prob_detail,p.prob_createdate,p.mem_id,count(*) count_ans")
                    ->from("problem p")
                    ->leftJoin("problem_answer pa", "p.prob_id = pa.prob_id") //
                    ->group(" pa.prob_id")
                    ->queryAll();        
        // ###############
        else:
            // ########### SqlBilder ###############
            $listProblem = Yii::app()->db->createCommand()
                    ->select(" p.prob_id,p.prob_name,p.prob_detail,p.prob_createdate,p.mem_id,count(*) count_ans")
                    ->from("problem p")
                    ->leftJoin("problem_answer pa", "p.prob_id = pa.prob_id") //
                    ->where(" p.prob_view = " . $view)
                    ->group(" pa.prob_id")
                    ->queryAll();
        // ###############
        endif;

        $this->render('//frontend/list-problem', array(
            'listProblem' => $listProblem,
        ));
    }

    public function actionViewProblem($id) {
        // ############# update view problem ############
        if (Yii::app()->session['member']['mem_status'] == 1) {
            Problem::model()->updateByPk($id, array(
                'prob_view' => 1
            ));
        }
        // ############# update view problem ############
        $criteria_ = new CDbCriteria();
        $criteria_->alias = 'p';
        $criteria_->join = 'LEFT JOIN member m ON m.mem_id = p.mem_id';
        $criteria_->compare('prob_id', $id);
        $problem = Problem::model()->find($criteria_);

        $criteria = new CDbCriteria();
        $criteria->alias = 'p';
        $criteria->join = 'LEFT JOIN problem pb ON pm.prob_id = p.prob_id';
        $criteria->join = 'LEFT JOIN member m ON m.mem_id = p.mem_id';
        $criteria->compare('p.prob_id', $id);

        $listProblemAnswer = ProblemAnswer::model()->findAll($criteria);
        $this->render('//frontend/view-problem', array(
            'problem' => $problem,
            'listProblemAnswer' => $listProblemAnswer
        ));
    }

    public function actionNewProblem($id = null) {
        if (empty($id)) {
            $problem = new Problem();
        } else {
            $problem = Problem::model()->findByPk($id);
        }
        $this->render('//frontend/form-problem', array(
            'problem' => $problem
        ));
    }

    public function actionSaveProblem() {
        If (empty($_POST['id'])) {
            $problem = new Problem();
        } else {
            $problem = Problem::model()->findByPk($_POST['id']);
        }
        $problem->mem_id = Yii::app()->session['member']['mem_id'];
        $problem->prob_detail = $_POST['detail'];
        $problem->prob_name = $_POST['name'];
        $problem->prob_createdate = $_POST['getdate'];
        $problem->prob_priority = $_POST['priority'];
        if ($problem->save()) {
            echo JavascriptUtil::returnJsonArray('1', 'บันทึกสำเร็จ', 'index.php?r=Problem/ListProblem');
        } else {
            echo JavascriptUtil::returnJsonArray('0', 'บันทึกไม่ได้', '');
        }
    }

    public function actionSaveProblemAnswer() {
        if (empty($_POST['id'])) {
            $problemAnswer = new ProblemAnswer();
        } else {
            $problemAnswer = ProblemAnswer::model()->findByPk($_POST['id']);
        }
        $problemAnswer->mem_id = Yii::app()->session['member']['mem_id'];
        $problemAnswer->proa_bad = 0;
        $problemAnswer->proa_createdate = new CDbExpression('NOW()');
        $problemAnswer->proa_good = 0;
        $problemAnswer->proa_detail = $_POST['detail'];
        $problemAnswer->prob_id = $_POST['problem_id'];
        if ($problemAnswer->save()) {
            echo JavascriptUtil::returnJsonArray('1', 'บันทึกสำเร็จ', 'index.php?r=Problem/ViewProblem&id=' . $_POST['problem_id']);
        } else {
            echo JavascriptUtil::returnJsonArray('1', 'บันทึก ไม่ได้', '');
        }
    }

    public function actionDeleteProblem($id) {
        if (Problem::model()->deleteByPk($id)) {
            echo JavascriptUtil::returnJsonArray('1', 'ลบสำเร็จ', '');
        } else {
            echo JavascriptUtil::returnJsonArray('0', 'ลบไม่ได้', '');
        }
    }

    public function actionEditAnswer($id) {
        $answer = ProblemAnswer::model()->findByPk($id);
        echo CJSON::encode($answer);
    }

}
