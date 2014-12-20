<?php
$date = Yii::app()->session['date'];
?>
<div style="padding-top: 15px;">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <i class="icon-comments"></i>
            <label class="label label-warning">รายรับ-รายจ่าย ของ <?= $date['D'] . "-" . $date['M'] . " - " . $date['Y'] ?></label>
            <div class="btn-group pull-right">
                <a href="#" target="_blank" id="btn-export" class="btn btn-info btn-rect" onclick="exportPdf()">
                    <i class="icon-print"></i> ออกรายงาน
                </a>
                <button data-toggle="dropdown" type="button">
                    <i class="icon-chevron-down"></i>
                </button>
                <ul class="dropdown-menu slidedown">                    
                    <li>
                        <a href="#" onclick="reloadDelay(1)">
                            <i class="icon-refresh"></i> Refresh
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class=" icon-comment"></i> Available
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-time"></i> Busy
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-tint"></i> Away
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <i class="icon-signout"></i> Sign Out
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="panel-body form-horizontal">          
            <div class="form-group alert alert-info">                
                <div class="col-md-10">
                    <div class="col-md-2 input-group">
                        <lable class="label label-warning">ค้นดูแบบรายเดือน : </lable>
                    </div>        
                    <div class="col-md-2 input-group">
                        <span class="input-group-addon">วัน</span>
                        <?php $day = DateUtil::getDay() ?>
                        <?= HtmlUtil::dropdownArray('day', $date['D'], $day, '', '') ?>
                    </div>
                    <div class="col-md-3 input-group">
                        <span class="input-group-addon">เดือน</span>
                        <?php $months = DateUtil::getMonthFullThai() ?>
                        <?= HtmlUtil::dropdownArray('month', $date['M'], $months, '', '') ?>
                    </div>
                    <div class="col-md-2 input-group">
                        <span class="input-group-addon">ปี</span>
                        <?php $years = DateUtil::getYearAD() ?>
                        <?= HtmlUtil::dropdownArray('year', $date['Y'], $years, '', '') ?>
                    </div>
                    <div class="col-md-2 input-group">
                        <button type="button" class="btn btn-primary btn-rect" onclick="herfSearchDate()">
                            <i class="icon-search"></i> เลือกดู
                        </button>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <div class="alert alert-info">
                        <h4>ยอดรายรับ : <?= number_format($sumIn, 2, ".", ",") ?></h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="alert alert-danger">
                        <h4>ยอดรายจ่าย : <?= number_format($sumOut, 2, ".", ",") ?></h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="alert alert-success">
                        <h4>คงเหลือ : <?= number_format($sumInOut, 2, ".", ",") ?></h4>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-6">
                    <div class="chat-panel panel panel-primary">
                        <div class="panel-heading">
                            <i class="icon-comments"></i>
                            รายรับเข้า
                            <div class="btn-group pull-right">
                                <button data-toggle="dropdown" type="button">
                                    <i class="icon-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu slidedown">
                                    <li>
                                        <a href="#" onclick="reloadDelay(1)">
                                            <i class="icon-refresh"></i> Refresh
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class=" icon-comment"></i> Available
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-time"></i> Busy
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-tint"></i> Away
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-signout"></i> Sign Out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <ul class="chat">
                                <?php foreach ($listMoneyIn as $data): ?>
                                    <li class="left clearfix">                                        
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font"> (<?= DateUtil::formatDate($data['money_createdate']) ?>)</strong>
                                                <small class="pull-right text-muted">
                                                    <i class="icon-money"></i> <?= $data['money_price'] ?>
                                                </small>
                                                <br/>
                                                <p><?= $data['money_detail'] ?></p>
                                            </div>
                                        </div>
                                        <span class="chat-img pull-right">
                                            <button type="button" class="btn btn-primary btn-rect"  onclick="editMoney(<?= $data['money_id'] ?>)">
                                                <i class="icon-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-rect"  onclick="deleteItem(<?= $data['money_id'] ?>, 'index.php?r=Money/DeleteMoney')">
                                                <i class="icon-trash"></i>
                                            </button>
                                        </span>
                                    </li>
                                <?php endforeach; ?>                                                                                  
                            </ul>
                        </div>

                        <div class="panel-footer">
                            <form class="form-horizontal" name="frm-money-in" id="frm-money-in">
                                <div class="row-fluid">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="type" id="type-in" value="1"/>
                                            <input type="hidden" name="id" id="id-in"/>
                                            <input type="text" class="form-control validate[required]" name="detail" id="detail-in" placeholder="ชื่อรายการ"/>                                                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <input type="number" class="form-control validate[required]" name="price" id="price-in" placeholder="ราคา"/>
                                        </div>
                                        <div class="col-md-4">
                                            <div data-date-format="dd-mm-yyyy" data-date="12-02-2012"  class="input-group input-append date datepicker1">
                                                <input type="text" readonly="" id="getdate-in" name="getdate" class="form-control validate[required]">
                                                <span class="input-group-addon add-on"><i class="icon-calendar"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit"  class="btn btn-primary">
                                                <i class="icon-save"></i>
                                            </button>
                                        </div>                                    
                                    </div>
                                </div>                                
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="chat-panel panel panel-danger">
                        <div class="panel-heading">
                            <i class="icon-comments"></i>
                            รายจ่ายออก
                            <div class="btn-group pull-right">
                                <button data-toggle="dropdown" type="button">
                                    <i class="icon-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu slidedown">
                                    <li>
                                        <a href="#" onclick="reloadDelay(1)">
                                            <i class="icon-refresh"></i> Refresh
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class=" icon-comment"></i> Available
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-time"></i> Busy
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-tint"></i> Away
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-signout"></i> Sign Out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <ul class="chat">
                                <?php foreach ($listMoneyOut as $data): ?>
                                    <li class="left clearfix">                                        
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font"> (<?= DateUtil::formatDate($data['money_createdate']) ?>)</strong>
                                                <small class="pull-right text-muted">
                                                    <i class="icon-money"></i> <?= $data['money_price'] ?>
                                                </small>
                                                <br/>
                                                <p><?= $data['money_detail'] ?></p>
                                            </div>
                                        </div>
                                        <span class="chat-img pull-right">
                                            <button type="button" class="btn btn-primary btn-rect" onclick="editMoney(<?= $data['money_id'] ?>)">
                                                <i class="icon-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-rect"  onclick="deleteItem(<?= $data['money_id'] ?>, 'index.php?r=Money/DeleteMoney')">
                                                <i class="icon-trash"></i>
                                            </button>
                                        </span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <div class="panel-footer">
                            <form class="form-horizontal" name="frm-money-out" id="frm-money-out">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="hidden" name="type" id="type-out" value="2"/>
                                        <input type="hidden" name="id" id="id-out"/>
                                        <input type="text" class="form-control validate[required]" name="detail" id="detail-out" placeholder="ชื่อรายการ"/>                                                                    
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <input type="number" class="form-control validate[required]" name="price" id="price-out" placeholder="ราคา"/>
                                    </div>      
                                    <div class="col-md-4">
                                        <div data-date-format="dd-mm-yyyy" data-date="12-02-2012"  class="input-group input-append date datepicker1">
                                            <input type="text" readonly="" id="getdate-out"  name="getdate" class="form-control validate[required]">
                                            <span class="input-group-addon add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-danger">
                                            <i class="icon-save"></i>
                                        </button>
                                    </div>                                    
                                </div>                               
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel-footer">

        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        var nowDate = new Date();
        $('input[name=getdate]').val(nowDate.getDate() + "-" + (nowDate.getMonth() + 1) + "-" + nowDate.getFullYear());
        var valid = $('#frm-money-out').validationEngine('attach', {
            onValidationComplete: function(form, status) {
                //alert("The form status is: " + status + ", it will never submit");
                if (status == true) {
                    PostJson('frm-money-out', 'index.php?r=Money/SaveMoney');
                }
            }
        });
        var valid = $('#frm-money-in').validationEngine('attach', {
            onValidationComplete: function(form, status) {
                //alert("The form status is: " + status + ", it will never submit");
                if (status == true) {
                    PostJson('frm-money-in', 'index.php?r=Money/SaveMoney');
                }
            }});
    });
    function editMoney(id) {
        $.ajax({
            url: 'index.php?r=Money/NewMoney',
            data: {
                id: id
            },
            type: 'get',
            dataType: 'json',
            success: function(data) {
                if (data.money_type == '1') {
                    $('#id-in').val(data.money_id);
                    $('#detail-in').val(data.money_detail);
                    $('#price-in').val(data.money_price);
                    $('#getdate-in').val(data.money_createdate);
                } else if (data.money_type == '2') {
                    $('#id-out').val(data.money_id);
                    $('#detail-out').val(data.money_detail);
                    $('#price-out').val(data.money_price);
                    $('#getdate-out').val(data.money_createdate);
                }
            }
        });
    }
    function herfSearchDate() {
        var month = $('select[name=month]').val();
        var year = $('select[name=year]').val();
        var day = $('select[name=day]').val();
        setTimeout(function() {
            window.location.href = 'index.php?r=Money/ListMoney&day=' + day + '&month=' + month + '&year=' + year;
            notyMessage('เปลี่ยนเดือน ปี', 'topRight', 'success');
        }, (1 * 1000)); //will call the function after 2 secs.
    }
    function exportPdf() {
        var month = $('select[name=month]').val();
        var year = $('select[name=year]').val();
        var day = $('select[name=day]').val();
        setTimeout(function() {  //index.php?r=ExportPdf/ExportMoney
            window.location.href = 'index.php?r=ExportPdf/ExportMoney&day=' + day + '&month=' + month + '&year=' + year;
            notyMessage('ออกรายงาน', 'topRight', 'success');
        }, (1 * 1000)); //will call the function after 2 secs.
    }
</script>
