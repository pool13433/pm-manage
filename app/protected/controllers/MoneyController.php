<?php

class MoneyController extends Controller {

    public function actionListMoney($day = null, $month = null, $year = null) {
        $mem_id = Yii::app()->session['member']['mem_id'];
        $currentdate = date('Y-m-d');
        $array = explode('-', date('Y-m-d'));
        if (!empty($day) || !empty($month) || !empty($year)) {
            if (!empty($year) && !empty($month) && !empty($day)) {
                $currentdate = $year . "-" . $month . "-" . $day;
            } else if (!empty($year) && !empty($month) && empty($day)) {
                $currentdate = $year . "-" . $month;
            } else if (!empty($year) && empty($month) && empty($day)) {
                $currentdate = $year;
            } else if (empty($year) && empty($month) && empty($day)) {
                $currentdate = "";
            } else {
                $currentdate = Yii::app()->session['date']['Y'] . "-" . Yii::app()->session['date']['M'] . "-" . Yii::app()->session['date']['D'];
                $day = Yii::app()->session['date']['D'];
                $month = Yii::app()->session['date']['M'];
                $year = Yii::app()->session['date']['Y'];
            }
            //echo 'dddd';
        } else {
            $day = $array[2];
            $month = $array[1];
            $year = $array[0];
            //var_dump("day : " . $day . "month : " . $month . " year : " . $year);
        }
        Yii::app()->session['date'] = array(
            'D' => $day,
            'M' => $month,
            'Y' => $year
        );
        $condition = "money_type = :type and mem_id = :mem_id ";
        if (!empty($currentdate)) {
            $condition .= " and money_createdate LIKE '%" . $currentdate . "%'";
        }
        $listMoneyIn = Money::model()->findAll(
                array(
                    'condition' => $condition,
                    'params' => array(
                        ':type' => 1,
                        ':mem_id' => $mem_id,
                    ),
                    'order' => 'money_id desc',
                )
        );
        $listMoneyOut = Money::model()->findAll(
                array(
                    'condition' => $condition,
                    'params' => array(
                        ':type' => 2,
                        ':mem_id' => $mem_id,
                    ),
                    'order' => 'money_id desc',
                )
        );
        // ############ sum ##############
        // SELECT sum(`money_price`) FROM `money` WHERE `money_type` = 1
        if (empty($currentdate)):
            $summoney = Yii::app()->db->createCommand()
                    ->select("date_format(`money_createdate`,'%Y-%m') monthyear,
                        SUM(CASE
                              WHEN `money_type` = '1' THEN `money_price`
                            END) AS sumin,
                        SUM(CASE
                              WHEN `money_type` = '2' THEN `money_price`
                            END) AS sumout")
                    ->from("money")
                    ->where("`money_type` IN ('0', '1','2') ")
                    ->andWhere('mem_id = :mem_id', array(':mem_id' => $mem_id))
                    ->group("monthyear")
                    ->queryRow();
        else:
            $summoney = Yii::app()->db->createCommand()
                    ->select("date_format(`money_createdate`,'%Y-%m') monthyear,
                        SUM(CASE
                              WHEN `money_type` = '1' THEN `money_price`
                            END) AS sumin,
                        SUM(CASE
                              WHEN `money_type` = '2' THEN `money_price`
                            END) AS sumout")
                    ->from("money")
                    ->where("`money_type` IN ('0', '1','2') ")
                    ->andWhere('mem_id = :mem_id', array(':mem_id' => $mem_id))
                    ->andWhere(array('like', 'money_createdate', '%' . $currentdate . '%'))
                    ->group("monthyear")
                    ->queryRow();
        endif;

        // ############ sum ##############

        $this->render('//backend/list-money', array(
            'listMoneyIn' => $listMoneyIn,
            'listMoneyOut' => $listMoneyOut,
            'currentDate' => $currentdate,
            'sumIn' => $summoney['sumin'],
            'sumOut' => $summoney['sumout'],
            'sumInOut' => ($summoney['sumin'] - $summoney['sumout']),
            'sumTotal' => 0
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
            $money->money_createdate = DateUtil::formatDate($_POST['getdate'], 'yyyy-MM-dd'); // new CDbExpression('NOW()');
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

    // ######################### Json #########################
    public function actionJsonGetSumPriceGroupMonth() {
        $sum_columns = Yii::app()->db->createCommand()
                ->select("DATE_FORMAT(money_createdate,'%m-%Y') as monthyear"
                        . ",sum(`money_price`) as sumtotal")
                ->from("money")
                ->group("DATE_FORMAT(`money_createdate`,'%m-%Y')")
                ->queryAll();
        echo CJSON::encode($sum_columns);
    }

    // ######################### Json #########################
}
