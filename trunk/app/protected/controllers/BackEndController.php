<?php

class BackEndController extends Controller {

    public function actionHome() {
        $members = Member::model()->findAllByAttributes(array('mem_status' => 0));
        $events = Event::model()->findAllByAttributes(array('event_status' => 0));
        $projects = Project::model()->findAllByAttributes(array('pro_status'=>0));
        $this->render("//backend/welcome", array(
            'members' => $members,
            'events' => $events,
            'projects'=>$projects,
        ));
    }

}
