<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <link rel="stylesheet" href="./plugins/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="./css/main.css" />
        <link rel="stylesheet" href="./css/theme.css" />
        <link rel="stylesheet" href="./css/MoneAdmin.css" />
        <link rel="stylesheet" href="./plugins/Font-Awesome/css/font-awesome.css" />
        <link href="./plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
        <link rel="stylesheet" href="./plugins/datepicker/css/datepicker.css" />
        <link rel="stylesheet" href="./plugins/validationengine/css/validationEngine.jquery.css" />
        <!--END GLOBAL STYLES -->

        <!-- PAGE LEVEL STYLES -->
        <link href="./css/layout2.css" rel="stylesheet" />
        <link href="./plugins/flot/examples/examples.css" rel="stylesheet" />
        <link rel="stylesheet" href="./plugins/timeline/timeline.css" />
        <?php
        //<!--GLOBAL SCRIPTS -->
        Yii::app()->clientScript->registerScriptFile('./plugins/jquery-2.0.3.min.js');
        Yii::app()->clientScript->registerScriptFile('./plugins/bootstrap/js/bootstrap.min.js');
        Yii::app()->clientScript->registerScriptFile('./plugins/modernizr-2.6.2-respond-1.1.0.min.js');
        //  <!--END GLOBAL SCRIPTS -->
        // <!-- PAGE LEVEL SCRIPTS -->
        Yii::app()->clientScript->registerScriptFile('./plugins/gritter/js/jquery.gritter.js');
        Yii::app()->clientScript->registerScriptFile('./js/moreNoti.js');
        //<!--END PAGE LEVEL SCRIPTS -->
        // <!--PAGE LEVEL SCRIPTS -->
        /* Yii::app()->clientScript->registerScriptFile('./plugins/flot/jquery.flot.js');
          Yii::app()->clientScript->registerScriptFile('./plugins/flot/jquery.flot.resize.js');
          Yii::app()->clientScript->registerScriptFile('./plugins/flot/jquery.flot.time.js');
          Yii::app()->clientScript->registerScriptFile('./plugins/flot/jquery.flot.stack.js');
          Yii::app()->clientScript->registerScriptFile('./js/for_index.js'); */

        /*
         * noty *************************************************
         */
        Yii::app()->clientScript->registerScriptFile('./assets/noty/js/noty/jquery.noty.js');
        Yii::app()->clientScript->registerScriptFile('./assets/noty/js/noty/packaged/jquery.noty.packaged.min.js');
        Yii::app()->clientScript->registerScriptFile('./assets/noty/js/noty/layouts/top.js');
        Yii::app()->clientScript->registerScriptFile('./assets/noty/js/noty/layouts/topCenter.js');
        Yii::app()->clientScript->registerScriptFile('./assets/noty/js/noty/layouts/center.js');
        Yii::app()->clientScript->registerScriptFile('./assets/noty/js/noty/layouts/topLeft.js');
        Yii::app()->clientScript->registerScriptFile('./assets/noty/js/noty/layouts/topRight.js');

        Yii::app()->clientScript->registerScriptFile('./assets/noty/js/noty/layouts/bottomCenter.js');
        Yii::app()->clientScript->registerScriptFile('./assets/noty/js/noty/layouts/bottomLeft.js');
        Yii::app()->clientScript->registerScriptFile('./assets/noty/js/noty/layouts/bottomRight.js');
        Yii::app()->clientScript->registerScriptFile('./assets/noty/js/noty/layouts/bottom.js');

        Yii::app()->clientScript->registerScriptFile('./assets/noty/js/noty/themes/default.js');
        /*
         * end noty *******************************************
         */


        /*
         * datatable ***********************************
         */
        Yii::app()->clientScript->registerScriptFile('./plugins/dataTables/jquery.dataTables.js');
        Yii::app()->clientScript->registerScriptFile('./plugins/dataTables/dataTables.bootstrap.js');
        /*
         * end datatable ********************************
         */

        /*
         * datepicker **************************************
         */
        Yii::app()->clientScript->registerScriptFile('./plugins/datepicker/js/bootstrap-datepicker.js');
        /*
         * end datepicker **************************************
         */

        /*
         * validate form ****************************************
         */

        Yii::app()->clientScript->registerScriptFile('./plugins/validationengine/js/jquery.validationEngine.js');
        Yii::app()->clientScript->registerScriptFile('./plugins/validationengine/js/languages/jquery.validationEngine-en.js');
        Yii::app()->clientScript->registerScriptFile('./plugins/jquery-validation-1.11.1/dist/jquery.validate.min.js');
        Yii::app()->clientScript->registerScriptFile('./js/validationInit.js');
        /*
         * end validate form ****************************************
         */

        Yii::app()->clientScript->registerScriptFile('./js/jquery-custom.js');
        Yii::app()->clientScript->registerScriptFile('./js/json-util.js');
        ?>

    </head>
    <body class="padTop53">
        <!-- MAIN WRAPPER -->
        <div id="" >
            <?php $this->renderPartial("//layouts/navbar-top") ?>
            <?php if (!empty(Yii::app()->session['member'])): ?>    
                <!-- for admin -->                
                <div class="container-fluid">
                    <div class="row" style="padding-left: 50px;padding-right: 50px;">
                        <div class="col-lg-2">
                            <?php $this->renderPartial("//layouts/navbar-left") ?>
                        </div>
                        <div class="col-lg-10">
                            <?php echo $content ?>        
                        </div>
                    </div> 
                </div>     
                <?php //$this->renderPartial("//layouts/navbar-right") ?>
            <?php else: ?>
                <!-- for user -->
                <div class="row" style="padding-left: 50px;padding-right: 50px;">
                    <div class="col-lg-12">
                        <?php echo $content ?>        
                    </div>
                </div>
            <?php endif; ?>
            <?php $this->renderPartial("//frontend/login") ?>
            <?php $this->renderPartial("//frontend/form-profile") ?>
            <?php $this->renderPartial("//frontend/form-changepassword") ?>
        </div>
    </body>
</html>
<script type="text/javascript">
    $(function() {
        $('#content').css('width', '100%');
    });
</script>


