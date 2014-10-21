<?php

class FileController extends Controller {

    static $PATH_UPLOAD = "/images/uploads/";

    public function actionListFile() {
        $criteria = new CDbCriteria();
        $criteria->addCondition("file_size > 0");
        $listFile = File::model()->findAll($criteria);
        $this->render('//backend/list-file', array(
            'listFile' => $listFile,
        ));
    }

    public function actionNewFile($id = null) {
        if (empty($id)) {
            $file = new File();
        } else {
            $file = File::model()->findByPk($id);
        }
        $this->render('//backend/form-file', array(
            'file' => $file,
        ));
    }

    public function actionUploadFile() {
        $output_dir = Yii::getPathOfAlias('webroot') . self::$PATH_UPLOAD;

        if (isset($_FILES["myfile"])) {
            $ret = array();

            //You need to handle  both cases
            //If Any browser does not support serializing of multiple files using FormData() 
            if (!is_array($_FILES["myfile"]["name"])) { //single file                
                $fileSize = $_FILES["myfile"]["size"];
                // ########## splite file ########
                $fileName = $_FILES["myfile"]["name"];
                $file = Util::explodStrFile($_FILES["myfile"]["name"]);
                $file_type = $file['type'];
                $file_name = $file['name'];

                $fileNewName = Util::generateRandomString(10);
                $fileNewNameType = $fileNewName . "." . $file_type;
                $fileOldName = $fileName;
                // ########## splite file ########
                move_uploaded_file($_FILES["myfile"]["tmp_name"], $output_dir . $fileNewNameType);
                $file = new File();
                $file->file_name = $fileNewNameType;
                $file->file_path = self::$PATH_UPLOAD;
                $file->file_detail = $fileOldName;
                $file->file_size = $fileSize;
                $file->file_createdate = new CDbExpression('NOW()');
                $file->save();

                $ret[] = $fileNewNameType;
            } else {  //Multiple files, file[]
                $fileCount = count($_FILES["myfile"]["name"]);
                for ($i = 0; $i < $fileCount; $i++) {                    
                    $fileSize = $_FILES["myfile"]["size"][$i];

                    // ########## splite file ########
                    $fileName = $_FILES["myfile"]["name"][$i];
                    $fileUpload = Util::explodStrFile($_FILES["myfile"]["name"][$i]);
                    $file_type = $fileUpload['type'][$i];
                    $file_name = $fileUpload['name'][$i];

                    $fileNewName = Util::generateRandomString(10);
                    $fileNewNameType = $fileNewName . "." . $file_type;
                    $fileOldName = $fileName;
                    // ########## splite file ########

                    move_uploaded_file($_FILES["myfile"]["tmp_name"][$i], $output_dir . $fileName);

                    $file = new File();
                    $file->file_name = $fileNewNameType;
                    $file->file_path = self::$PATH_UPLOAD;
                    $file->file_detail = $fileOldName;
                    $file->file_createdate = new CDbExpression('NOW()');
                    $file->file_size = $fileSize;
                    $file->save();
                    $ret[] = $fileNewNameType;
                }
            }
            echo json_encode($ret);
        }
    }

    public function actionDeleteFileItem($id) {
        $file = File::model()->findByPk($id);
        // ################ delete file in directory ###############
        $output_dir = Yii::getPathOfAlias('webroot') . self::$PATH_UPLOAD;
        $filePath = $output_dir . "" . $file['file_name'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        //###################################################
        if ($file->delete()) {
            echo JavascriptUtil::returnJsonArray('1', 'ลบสำเร็จ', 'index.php?r=File/ListFile');
        } else {
            echo JavascriptUtil::returnJsonArray('0', 'ลบไม่ได้', '');
        }
    }

    public function actionDeleteFile() {
        $output_dir = Yii::getPathOfAlias('webroot') . "/images/uploads/";

        if (isset($_POST["op"]) && $_POST["op"] == "delete" && isset($_POST['name'])) {
            $fileName = $_POST['name'];
            $filePath = $output_dir . $fileName;
            if (file_exists($filePath)) {
                unlink($filePath);
                File::model()->findByAttributes(array('file_name' => $fileName))->delete();
            }
            //echo "Deleted File " . $fileName . "<br>";
            echo "DeleteFileSuccess";
        }
    }

}
