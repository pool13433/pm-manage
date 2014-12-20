<link href='./assets/fullcalendar-2.2.3/lib/cupertino/jquery-ui.min.css' rel='stylesheet' />
<link href='./assets/fullcalendar-2.2.3/fullcalendar.css' rel='stylesheet' />
<link href='./assets/fullcalendar-2.2.3/fullcalendar.print.css' rel='stylesheet' media='print' />
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
        font-size: 14px;
    }

    #script-warning {
        display: none;
        background: #eee;
        border-bottom: 1px solid #ddd;
        padding: 0 10px;
        line-height: 40px;
        text-align: center;
        font-weight: bold;
        font-size: 12px;
        color: red;
    }

    #loading {
        display: none;
        position: absolute;
        top: 10px;
        right: 10px;
    }

    #calendar {
        max-width: 900px;
        margin: 40px auto;
        padding: 0 10px;
    }
</style>
<div class="box primary">
    <header>
        <a href="<?= Yii::app()->createUrl('Site/Index') ?>" class="icons btn btn-info btn-rect">
            <i class="icon-arrow-left"></i> กลับ
        </a>
        <h5><i class="icon-calendar icon-1x"></i> ตารางงานของ ThaiSmileSoft.com</h5>
        <div class="toolbar">
            <ul class="nav pull-right">                    
                <li>
                    <a class="accordion-toggle minimize-box" data-toggle="collapse" href="#div-1">
                        <i class="icon-chevron-up"></i>
                    </a>
                </li>
            </ul>
        </div>
    </header>
    <div id="div-1" class="body  collapse in">
        <div class="row">
            <div class="col-lg-12">
                <div class="box primary">                   
                    <body>
                        <div id="calendar" class="col-lg-12">
                            <table class="table table-condensed table-bordered">
                                <thead>
                                    <tr style="text-align: center;">
                                        <td>ชื่องาน</td>
                                        <td>วันที่เริ่ม</td>
                                        <td>วันที่สิ้นสุด</td>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php foreach ($listProject as $data): ?>
                                                <tr>
                                                    <td><?= $data['pro_nameth'] ?></td>
                                                    <td><div style="background-color: <?= ColorsUtil::$MONTH_COLOR[$data['date_start_color']] ?>"><?= $data['pro_startdate'] ?></div></td>
                                                    <td><div style="background-color: <?= ColorsUtil::$MONTH_COLOR[$data['date_end_color']] ?>"><?= $data['pro_enddate'] ?></div></td>
                                                </tr>
                            <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </body>
                </div>
            </div>                   
        </div>

    </div>
</div>
<div class="box primary">
    <header>               
    </header>
    <div id="div-1" class="body  collapse in">
        <div class="row">
            <div class="col-lg-12">
                <div id='loading'>loading...</div>
                <div id="calendar"></div>
            </div>                   
        </div>
    </div>
</div>
<?php
//Yii::app()->clientScript->registerScriptFile('./assets/fullcalendar-2.2.3/lib/moment.min.js');
//Yii::app()->clientScript->registerScriptFile('./assets/fullcalendar-2.2.3/lib/jquery.min.js');
//Yii::app()->clientScript->registerScriptFile('./assets/fullcalendar-2.2.3/fullcalendar.min.js');
?>

<script type="text/javascript">
    $(document).ready(function() {

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            lang: 'th',
            //defaultDate: '2014-11-12',
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: {
                //url: 'php/get-events.php',
                url : 'index.php?r=JsonService/JsonCalendar',
                error: function() {
                    $('#script-warning').show();
                }
            },
            loading: function(bool) {
                $('#loading').toggle(bool);
            }
        });

    });

</script>