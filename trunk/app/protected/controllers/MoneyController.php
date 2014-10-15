<?php

class MoneyController extends Controller {

    public function actionListMoney() {
        $currentdate = date('Y-m');
        $listMoneyIn = Money::model()->findAll(
                array(
                    'condition' => "money_type = :type and mem_id = :mem_id and money_createdate LIKE '%" . $currentdate . "%'",
                    'params' => array(
                        ':type' => 1,
                        ':mem_id' => Yii::app()->session['member']['mem_id'],
                    //':currentdate' => $currentdate,
                    ),
                    'order' => 'money_id desc',
                )
        );
        $listMoneyOut = Money::model()->findAll(
                array(
                    'condition' => "money_type = :type and mem_id = :mem_id and money_createdate LIKE '%" . $currentdate . "%'",
                    'params' => array(
                        ':type' => 2,
                        ':mem_id' => Yii::app()->session['member']['mem_id'],
                    ),
                    'order' => 'money_id desc',
                )
        );
        // ############ sum ##############
//        $criteria_sum = new CDbCriteria();
//        $criteria_sum->select = "SUM(money) as total";
//        $criteria_sum->with = 
        // ############ sum ##############
        $this->render('//backend/list-money', array(
            'listMoneyIn' => $listMoneyIn,
            'listMoneyOut' => $listMoneyOut,
            'currentDate' => $currentdate,
        ));
    }

    public function actionNewMoney($id = null) {
        $money = Money::model()->findByPk($id);
        echo CJSON::encode($money);
    }

    public function actionSaveMoney() {
        if (!empty($_POST)) {
            if (empty($_POST['id'])) {
                $money = new Money();
            } else {
                $money = Money::model()->findByPk($_POST['id']);
            }
            $money->money_detail = $_POST['detail'];
            $money->money_price = $_POST['price'];
            $money->mem_id = Yii::app()->session['member']['mem_id'];
            $money->money_createdate = new CDbExpression('NOW()');
            $money->money_type = $_POST['type'];
            if ($money->save()) {
                echo JavascriptUtil::returnJsonArray('1', 'บันทึก สำเร็จ', 'index.php?r=Money/ListMoney');
            } else {
                echo JavascriptUtil::returnJsonArray('0', 'บันทึก ไม่ได้', '');
            }
        }
    }

    public function actionDeleteMoney($id) {
        if (Money::model()->deleteByPk($id)) {
            echo JavascriptUtil::returnJsonArray('1', 'ลบสำเร็จ', '');
        } else {
            echo JavascriptUtil::returnJsonArray('0', 'ลบไม่ได้', '');
        }
    }

}
