<?php

class ExportPdfController extends Controller {

    public function actionIndex() {
        
    }

    public function actionReport() {
        $this->renderPartial("//report/borrow_");
    }

    public function actionExportMoney($day = null, $month = null, $year = null) {
        // ####################Query SQL######################
        $mem_id = Yii::app()->session['member']['mem_id'];
        if (!empty($day) || !empty($month) || !empty($year)) {
            if (!empty($year) && !empty($month) && !empty($day)) {
                $currentdate = $year . "-" . $month . "-" . $day;
            } else if (!empty($year) && !empty($month) && empty($day)) {
                $currentdate = $year . "-" . $month;
            } else if (!empty($year) && empty($month) && empty($day)) {
                $currentdate = $year;
            } else if (empty($year) && empty($month) && empty($day)) {
                $currentdate = "";
            }

            $sql = "SELECT `money_detail`, `money_price`,";
            $sql .= " `money_createdate`, ";
            $sql .=" case when money_type = 1 then 'รายรับ' ";
            $sql .= " when money_type = 2 then 'รายจ่าย' end money_typeth,";
            $sql .= " money_type";
            $sql .= " FROM `money` ";
            $sql.= " WHERE mem_id = " . $mem_id;
            $sql .= " AND money_createdate LIKE '%" . $currentdate . "%'";
            $sql .= " ORDER BY `money_createdate` ASC ";

            $listMoney = Yii::app()->db->createCommand($sql)
                    ->queryAll();
            // ####################Query SQL######################
            # #####################  mPDF #######################
            $mPDF1 = Yii::app()->ePdf->mpdf('th', 'A4', '0', 'THSaraban');
            $mPDF1->SetAutoFont();
            $mPDF1->SetDisplayMode('fullpage');
            $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/main.css');
            $mPDF1->WriteHTML($stylesheet, 1);
            $mPDF1->WriteHTML($this->renderPartial('//report/pdf-money', array(
                        'listMoney' => $listMoney,
                        'date' => $currentdate, //DateUtil::formatDate(),
                            ), true));
            $mPDF1->Output('รายรับ-รายจ่าย.pdf', 'D');

            # #####################  mPDF #######################
        }
    }

    public function actionMpdf($filename = null) {
        # mPDF
        //$mPDF1 = Yii::app()->ePdf->mpdf();
        # You can easily override default constructor's params
        $mPDF1 = Yii::app()->ePdf->mpdf('th', 'A4-L', '0', 'THSaraban');
        //$mPDF1->SetAutoFont();
        $mPDF1->SetDisplayMode('fullpage');
        # render (full page)
        //$mPDF1->WriteHTML($this->render('//report/index', array(), true));
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/main.css');
        $mPDF1->WriteHTML($stylesheet, 1);

        # renderPartial (only 'view' of current controller)
        //$mPDF1->WriteHTML($this->renderPartial('//report/index', array(), true));
        //$mPDF1->WriteHTML('<h1>Helloworld</h1>');
        $mPDF1->WriteHTML($this->renderPartial('//report/borrow_', array(
                    'member' => $member,
                    'params' => 555555
                        ), true));

        # Renders image
        //$mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/bg.gif'));
        # Outputs ready PDF
        $mPDF1->Output("report/" . $filename . ".pdf");
    }

    public function actionHtml2($id = null) {
        # HTML2PDF has very similar syntax
        $member = Member::model()->findByPk(1);

        $html2pdf = Yii::app()->ePdf->HTML2PDF();
        $stylesheet = ""; //file_get_contents('./plugins/bootstrap/css/bootstrap.css'); //<link rel="stylesheet" href="./plugins/bootstrap/css/bootstrap.css" />
        //$html2pdf->WriteHTML($stylesheet,1);
        $html2pdf->WriteHTML($this->renderPartial('//report/borrow_', array(
                    'member' => $member,
                        ), true));

        $html2pdf->Output();
    }

}
