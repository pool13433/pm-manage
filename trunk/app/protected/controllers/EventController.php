<?php

class EventController extends Controller {

    public function actionListEvent($status = null) {
        $criteria = new CDbCriteria();
        $criteria->alias = 'e';
        $criteria->join = 'LEFT JOIN member m ON m.mem_id = e.mem_id';
        if (isset($status)):
            $criteria->compare('event_status', $status);
        endif;
        $criteria->order = 'event_createdate asc';
        $listevent = Event::model()->findAll($criteria);
        $this->render('//backend/list-event', array(
            'listevent' => $listevent
        ));
    }

    public function actionNewEvent() {
        $this->render('//backend/form-event', array(
        ));
    }

    public function actionSaveEvent() {
        $event = new Event();
        $event->event_name = $_POST['name'];
        $event->event_detail = $_POST['detail'];
        $event->mem_id = Yii::app()->session['member']['mem_id'];
        $event->event_createdate = DateUtil::formatDate($_POST['getdate'], 'yyyy-MM-dd');
        $event->event_startday = $_POST['day'];
        $event->event_startdate = DateUtil::formatDate($_POST['startdate'], 'yyyy-MM-dd');
        $event->event_enddate = DateUtil::formatDate($_POST['enddate'], 'yyyy-MM-dd');
        $event->event_finishdate = DateUtil::formatDate($_POST['enddate'], 'yyyy-MM-dd');
        $event->event_status = 0;
        if ($event->save()):
            echo JavascriptUtil::returnJsonArray('1', 'บันทึกสำเร็จ', 'index.php?r=Event/ListEvent');
        else:
            echo JavascriptUtil::returnJsonArray('0', 'เกิดข้อผิดพลาด', '');
        endif;
    }

    public function actionDeleteEvent($id) {
        
    }

    public function actionChangeEventStatus($id, $status) {
        $event = Event::model()->findByPk($id);
        $event->event_status = $status;
        if ($status == 2) {
            $event->event_finishdate = new CDbExpression('NOW()');
        }
        if ($event->save()) {
            echo JavascriptUtil::returnJsonArray('1', 'ปรับสถานะสำเร็จ', '');
        } else {
            echo JavascriptUtil::returnJsonArray('0', 'ปรับสถานะ ไม่ได้', '');
        }
    }

}