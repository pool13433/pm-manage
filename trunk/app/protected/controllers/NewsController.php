<?php

class NewsController extends Controller {

    public function actionListNews($id = null) {
        $listNews = News::model()->findAll();
        $this->render('//backend/list-news', array(
            'listNews' => $listNews,
        ));
    }

    public function actionNewNews($id = null) {
        if (empty($id)) {
            $news = new News();
        } else {
            $news = News::model()->findByPk($id);
        }
        $emails = Member::model()->findAll();
        $this->render('//backend/form-news', array(
            'news' => $news,
            'emails' => $emails,
        ));
    }

    public function actionViewNews($id) {
        
    }

    public function actionSaveNews() {
        if (empty($_POST['id'])) {
            $news = new News();
        } else {
            $news = News::model()->findByPk($_POST['id']);
        }
        $news->news_detail = $_POST['detail'];
        $news->news_startdate = DateUtil::formatDate($_POST['startdate'], 'yyyy-MM-dd');
        $news->news_title = $_POST['title'];
        $news->news_createdate = new CDbExpression('NOW()');
        if ($news->save()) {
            echo JavascriptUtil::returnJsonArray('1', 'บันทึกสำเร็จ', 'index.php?r=News/ListNews');
        } else {
            echo JavascriptUtil::returnJsonArray('0', 'บันทึก ไม่ได้', '');
        }
    }

    public function actionDeleteNews($id) {
        if (News::model()->deleteByPk($id)) {
            echo JavascriptUtil::returnJsonArray('1', 'ลบสำเร็จ', '');
        } else {
            echo JavascriptUtil::returnJsonArray('0', 'ลบไม่ได้', '');
        }
    }

}
