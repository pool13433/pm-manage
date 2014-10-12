<?php

class FrontEndController extends Controller {

    public function actionHome() {
        $this->render("//frontend/welcome");
    }
    
}
