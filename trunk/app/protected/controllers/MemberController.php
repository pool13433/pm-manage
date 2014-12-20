<?php

class MemberController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionListMember($status = null) {
        if (isset($status)):
            $attributes = array('mem_status' => $status);
        else:
            $attributes = array();
        endif;
        $listMember = Member::model()->findAllByAttributes($attributes);
        $this->render('//backend/list-member', array(
            'listMember' => $listMember,
        ));
    }

    public function actionCheckLogin() {
        if (!empty($_POST)) {
            $criteria = new CDbCriteria();
            $criteria->compare('mem_username', $_POST['username'], false, 'AND');
            $criteria->compare('mem_password', $_POST['password'], false, 'AND');
            $criteria->addCondition('mem_status > 0');
            //$criteria->condition = 'mem_status > 0';
            /*  $criteria->compare('mem_status', 2, true, 'OR'); */

            $model = Member::model()->find($criteria);
            if (!empty($model)) {

                // ############ + 1 if login success##############
                $currentdate = date('Y-m-d');
                if ($currentdate != DateUtil::formatDate($model['mem_lastlogindate'], 'yyyy-MM-dd')) {
                    Member::model()->updateByPk($model->mem_id, array(
                        'mem_point' => ($model->mem_point + 1),
                        'mem_lastlogindate' => new CDbExpression('NOW()'),
                    ));
                }
                // ################## + 1 ##################                
                Yii::app()->session['member'] = $model;
                Yii::app()->session['member']['mem_point'] = ($model['mem_point'] + 1);
                $url = '';
                if ($model->mem_status == 1) {
                    $url = 'index.php?r=BackEnd/Home';
                } else {
                    $url = 'index.php?r=FrontEnd/Home';
                }

                //$this->redirect(array('Member/Homepage'));
                echo JavascriptUtil::returnJsonArray('1', 'เข้าระบบสำเร็จ', $url);
            } else {
                echo JavascriptUtil::returnJsonArray('0', 'ไม่มีข้อมูลในระบบ', '');
            }
        }
    }

    public function actionLogout() {
        if (!empty(Yii::app()->session['member'])) {
            unset(Yii::app()->session['member']);
            echo JavascriptUtil::returnJsonArray('1', 'logout', 'index.php?r=Site/Index');
        }
    }

    public function actionRegisterMember($id = null) {
        if (empty($id)) {
            $member = new Member();
        } else {
            $member = Member::model()->findByPk($id);
        }
        $this->render('//frontend/form-register', array(
            'member' => $member,
        ));
    }

    public function actionNewMember($id = null) {
        if (empty($id)) {
            $member = new Member();
        } else {
            $member = Member::model()->findByPk($id);
        }
        $this->render('//backend/form-member', array(
            'member' => $member,
        ));
    }

    public function actionSaveMember() {
        if (!empty($_POST)) {
            if (empty($_POST['id'])) {
                $member = new Member();
            } else {
                $member = Member::model()->findByPk($_POST['id']);
            }
            $member->mem_fname = $_POST['fname'];
            $member->mem_lname = $_POST['lname'];
            $member->mem_username = $_POST['username'];
            $member->mem_password = $_POST['password'];
            $member->mem_tel = $_POST['mobile'];
            $member->mem_email = $_POST['email'];
            $member->mem_address = $_POST['address'];
            $member->mem_lastlogindate = new CDbExpression('NOW()');
            $member->mem_point = 0;
            $member->mem_active = 0;
            if (empty($_POST['status'])) {
                $member->mem_status = 0;
            } else {
                $member->mem_status = $_POST['status'];
            }
            $member->mem_createdate = new CDbExpression('NOW()');
            if ($member->save()) {
                if (empty(Yii::app()->session['member'])) {
                    echo JavascriptUtil::returnJsonArray('1', 'ลงทะเบียน สำเร็จ กรุณารอการอนุมัติจากระบบ', 'index.php?r=Site/Index');
                } else {
                    echo JavascriptUtil::returnJsonArray('1', 'บันทึกสำเร็จ', 'index.php?r=Member/ListMember');
                }
            } else {
                echo JavascriptUtil::returnJsonArray('0', 'ลงทะเบียน ไม่ได้ กรุณาติดต่อเจ้าหน้าที่', '');
            }
        } else {
            echo JavascriptUtil::returnJsonArray('0', 'ไม่มีค่า', '');
        }
    }

    public function actionForgetPassword() {
        $this->render('//site/forget_password');
    }

    public function actionChangePassword() {
        $mem_id = Yii::app()->session['member']['mem_id'];
        $criteria = new CDbCriteria();
        $criteria->compare('mem_id', $mem_id);
        //$criteria->compare('mem_username', $_POST['username']);
        $member = Member::model()->findByPk($mem_id);
        if ($member['mem_username'] != trim($_POST['username'])) {
            echo JavascriptUtil::returnJsonArray('0', 'username เก่าไม่ถูกต้อง', '');
        } else {
            if ($member['mem_password'] != $_POST['passwordold']) {
                echo JavascriptUtil::returnJsonArray('0', 'รหัสผ่าน เก่าไม่ถูกต้อง กรุณาตรวจสอบ', '');
            } else {
                $member->mem_username = $_POST['username'];
                $member->mem_password = $_POST['passwordnew'];
                if ($member->save()) {
                    echo JavascriptUtil::returnJsonArray('1', 'แก้ไขรหัสผ่านสำเร็จ', 'index.php?r=Site/Index');
                } else {
                    echo JavascriptUtil::returnJsonArray('0', 'แก้ไข รหัสผ่านไม่ได้ ติดต่อเจ้าหน้าที่', '');
                }
            }
        }
    }

    public function actionChangeProfile() {
        $member = Member::model()->findByPk(Yii::app()->session['member']['mem_id']);
        $member->mem_fname = $_POST['fname'];
        $member->mem_lname = $_POST['lname'];
        $member->mem_tel = $_POST['mobile'];
        $member->mem_email = $_POST['email'];
        $member->mem_address = $_POST['address'];
        if ($member->save()) {
            echo JavascriptUtil::returnJsonArray('1', 'แก้ไขข้อมูลสำเร็จ', 'index.php?r=Site/Index');
        } else {
            echo JavascriptUtil::returnJsonArray('0', 'แก้ไขข้อมูลไม่ได้ ติดต่อเจ้าหน้าที่', '');
        }
    }

    public function actionHomepage() {
        $member = Yii::app()->session['member'];
        if ($member->mem_status == 'admin'):
            $this->render('//back/index');
        else:
            $this->render('//front/index');
        endif;
    }

    public function actionChangeMemberStatus($id, $status) {
        $member = Member::model()->findByPk($id);
        $member->mem_status = $status;
        $status = $member->save();
        if ($status) {
            echo JavascriptUtil::returnJsonArray('1', 'เปลี่ยนสถานะ สำเร็จ', '');
        } else {
            echo JavascriptUtil::returnJsonArray('0', 'เปลี่ยนสถานะไม่ได้', '');
        }
    }

    public function actionGenaratePassword() {
        $random = StringUtil::generateRandomString(6);
        echo CJSON::encode(array('random' => $random));
    }

}
