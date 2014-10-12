<?php

class SiteController extends Controller {

    public function actionIndex() {

        $this->render("//frontend/welcome");
        //JavascriptUtil::echoJavascript("notyMessage('hello', 'topRight', 'success')");
    }

}
