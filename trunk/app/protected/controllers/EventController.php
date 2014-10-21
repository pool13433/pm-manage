<?php

class EventController extends Controller {

    public function actionListEvent($status = null) {
        // ################ waiting ############
        $criteriaWait = new CDbCriteria();
        $criteriaWait->alias = 'e';
        $criteriaWait->join = 'LEFT JOIN member m ON m.mem_id = e.mem_id';
        $criteriaWait->compare('event_status', 0);
        $criteriaWait->compare('m.mem_id', Yii::app()->session['member']['mem_id']);
        $criteriaWait->order = 'event_createdate asc';
        $listeventWait = Event::model()->findAll($criteriaWait);
        // ################ waiting ############
        // 
        // ################ process ############
        $criteriaProcess = new CDbCriteria();
        $criteriaProcess->alias = 'e';
        $criteriaProcess->join = 'LEFT JOIN member m ON m.mem_id = e.mem_id';
        $criteriaProcess->compare('event_status', 1);
        $criteriaProcess->compare('m.mem_id', Yii::app()->session['member']['mem_id']);
        $criteriaProcess->order = 'event_createdate asc';
        $listeventProcess = Event::model()->findAll($criteriaProcess);
        // ################ process ############
        
        // ################ finish ############
        $criteriaFinsih = new CDbCriteria();
        $criteriaFinsih->alias = 'e';
        $criteriaFinsih->join = 'LEFT JOIN member m ON m.mem_id = e.mem_id';
        $criteriaFinsih->compare('event_status', 2);
        $criteriaFinsih->compare('m.mem_id', Yii::app()->session['member']['mem_id']);
        $criteriaFinsih->order = 'event_createdate asc';
        $listeventFinish = Event::model()->findAll($criteriaFinsih);
        // ################ finish ############
        $this->render('//backend/list-event', array(
            'listeventWait' => $listeventWait,
            'listeventProcess' => $listeventProcess,
            'listeventFinish' => $listeventFinish
        ));
    }

    public function actionNewEvent($id = null) {
        if (empty($id)) {
            $event = new Event();
        } else {
            $event = Event::model()->findByPk($id);
        }
        $this->render('//backend/form-event', array(
            'event' => $event,
        ));
    }

    public function actionSaveEvent() {
        if (empty($_POST['id'])) {
            $event = new Event();
        } else {
            $event = Event::model()->findByPk($_POST['id']);
        }
        $event->event_name = $_POST['name'];
        $event->event_detail = $_POST['detail'];
        $event->mem_id = Yii::app()->session['member']['mem_id'];
        $event->event_createdate = DateUtil::formatDate($_POST['getdate'], 'yyyy-MM-dd');
        $event->event_priority = $_POST['priority'];
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
        if (Event::model()->deleteByPk($id)) {
            echo JavascriptUtil::returnJsonArray('1', 'ลบสำเร็จ', '');
        } else {
            echo JavascriptUtil::returnJsonArray('0', 'ลบไม่ได้', '');
        }
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
