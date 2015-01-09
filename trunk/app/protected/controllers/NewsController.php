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

        // ##################send email ################
        Yii::import('application.extensions.phpmailer.JPhpMailer');

        $subject = $_POST['title'];
        $fromEmail = "thaismilesoft.com@gmail.com";//"poolsawatapin@gmail.com";
        $message = $_POST['detail'];
        $fromName = "ThaiSmilesoft.com (poolsawat apin (Admin))";
        $mails = array();
        $str_mails = $_POST['mails'];
        $toName = "Admin (Admin)";
        //$toEmailGmail = 'poolsawatapin@gmail.com';
        $toEmailGmail = 'poon_mp@hotmail.com';
        //$toEmailHotmail = 'poon_mp@hotmail.com';
        // ############# config mail ################
        $mail = new JPhpMailer;
        $mail->IsSMTP();
        $mail->CharSet = 'UTF-8';
        $mail->SMTPDebug = 0; // enables SMTP debug information (for testing)

        /* $mail->Host = 'smtp.googlemail.com:465';
          //$mail->Host = 'smtp.shoparaidee.com:465';
          $mail->SMTPSecure = "ssl";
          //$mail->Host = 'smpt.163.com';
          $mail->SMTPAuth = true;
          $mail->Username = 'poolsawatapin@gmail.com';
          $mail->Password = '0878356866'; */

        $mail->Host = "mail.thaismilesoft.com"; // SMTP server example
        $mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
        $mail->SMTPAuth = true; // enable SMTP authentication
        $mail->Port = 25; // set the SMTP port for the GMAIL server
        $mail->Username = "mailer@thaismilesoft.com"; // SMTP account username example
        $mail->Password = "3NwtoxC2"; // SMTP account password example

        $mail->From = $fromEmail;
        $mail->FromName = $fromName;
        //$mail->SetFrom($fromEmail, $fromName);
        $mail->Subject = $subject;
        $mail->AltBody = $message;
        $mail->WordWrap = 50;
        $mail->MsgHTML($message);
        $mail->IsHTML(true);
        // ############# config mail ################

        $mails = explode(',', $str_mails);
        if (is_array($mails)):
            if (!empty($str_mails)):                
                foreach ($mails as $data) {
                    // ################### config mail ########
                    $mail->AddAddress($data);
                    // ################### config mail ########
                }
            endif;
        endif;
        $mail->AddAddress($toEmailGmail, $toName);
        ############ send email #################
        if ($mail->Send()):
            if ($news->save()) {
                echo JavascriptUtil::returnJsonArray('1', 'บันทึกสำเร็จ', 'index.php?r=News/ListNews');
            } else {
                echo JavascriptUtil::returnJsonArray('0', 'บันทึก ไม่ได้', '');
            }
        else:
            echo JavascriptUtil::returnJsonArray('0', 'ส่งเมลล์ ไม่ได้', '');
        endif;
    }

    public function actionDeleteNews($id) {
        if (News::model()->deleteByPk($id)) {
            echo JavascriptUtil::returnJsonArray('1', 'ลบสำเร็จ', '');
        } else {
            echo JavascriptUtil::returnJsonArray('0', 'ลบไม่ได้', '');
        }
    }

    // ตัวอย่าง code 
    public function actionSendEmail() {
        if (isset($_POST)) {
            $subject = $_POST['title'];
            $fromEmail = $_POST['email'];
            $message = $_POST['message'];
            $fromName = $_POST['name'];
            $mails = $_POST['mail'];
            $toName = "Admin (Admin)";
            $toEmailGmail = 'poolsawatapin@gmail.com';
            $toEmailHotmail = 'poon_mp@hotmail.com';



            Yii::import('application.extensions.phpmailer.JPhpMailer');
            $mail = new JPhpMailer;
            $mail->IsSMTP();
            $mail->CharSet = 'UTF-8';
            $mail->SMTPDebug = 0; // enables SMTP debug information (for testing)

            /* $mail->Host = 'smtp.googlemail.com:465';
              //$mail->Host = 'smtp.shoparaidee.com:465';
              $mail->SMTPSecure = "ssl";
              //$mail->Host = 'smpt.163.com';
              $mail->SMTPAuth = true;
              $mail->Username = 'poolsawatapin@gmail.com';
              $mail->Password = '0878356866'; */

            $mail->Host = "mail.thaismilesoft.com"; // SMTP server example
            $mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
            $mail->SMTPAuth = true; // enable SMTP authentication
            $mail->Port = 25; // set the SMTP port for the GMAIL server
            $mail->Username = "mailer@thaismilesoft.com"; // SMTP account username example
            $mail->Password = "3NwtoxC2"; // SMTP account password example


            $mail->From = $fromEmail;
            $mail->FromName = $fromName;
            //$mail->SetFrom($fromEmail, $fromName);
            $mail->Subject = $subject;
            $mail->AltBody = $message;
            //$mail->WordWrap = 50;
            $mail->MsgHTML($fromEmail . "<br/>" . $message);
            $mail->IsHTML(true);

            if (!empty($_POST['mail'])) {
                foreach ($mails as $m):
                    $mail->AddAddress($m);
                endforeach;
            }

            $mail->AddAddress($toEmailGmail, $toName);
//            $mail->AddAddress('jadezanick@', 'Second Name');
//            $mail->AddAddress('recipient3@domain.com', 'Third Name');

            if ($mail->Send()) {
                $help = new Help();
                //$help->h_id = '';
                $help->h_name = $fromName;
                $help->h_email = $fromEmail;
                $help->h_title = $subject;
                $help->h_message = $message;
                $help->h_createdate = new CDbExpression('NOW()');
                $help->save();
                $Json = array(
                    'status' => "success",
                    'title' => "ส่งเมลล์ สำเร็จ",
                    'message' => "ส่ง email เรียบร้อยแล้วครับ"
                );
                echo CJSON::encode($Json);
            } else {
                $Json = array(
                    'status' => "false",
                    'title' => "ส่งเมลล์ ไม่สำเร็จ",
                    'message' => "กรุณา ติดต่อเจ้าหน้าที่ดูแลเว็บไซต์",
                );
                echo CJSON::encode($Json);
            }
        }
    }

}
