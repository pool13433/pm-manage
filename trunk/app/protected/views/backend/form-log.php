<form class="form-horizontal" name="frm-log" id="frm-log">
    <div class="box primary">
        <header>
            <a href="<?= Yii::app()->createUrl('Project/ListProjectLog') ?>" class="icons btn btn-info btn-rect">
                <i class="icon-arrow-left"></i> กลับ
            </a>
            <h5>ฟอร์มบันทึก ปัญหาของโปรแกรม</h5>
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
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-2">ชื่อโปรเจค</label>
                    <div class="col-md-4">
                        <input type="hidden" name="pro_id" id="pro_id" value="<?= $log['pro_id'] ?>"/>
                        <div class="input-group">
                            <input type="text" class="form-control validate[required]" name="pro_name" id="pro_name" readonly="" value="<?= $log['project']['pro_nameth'] ?>"/>
                            <span class="input-group-addon add-on" data-target="#formProjectSearchModal" data-toggle="modal">
                                <i class="icon-zoom-in"></i></span>
                        </div>
                    </div>                   
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-2">ชื่อเรื่อง</label>
                    <div class="col-md-6">
                        <input type="hidden" class="form-control" name="id" value="<?= $log['prolog_id'] ?>"/>
                        <input type="text" class="form-control validate[required]" name="name" value="<?= $log['prolog_name'] ?>"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-2">วันที่แจ้งเหตุการณ์</label>
                    <div class="col-md-3">
                        <div data-date-format="dd-mm-yyyy" data-date="12-02-2012"  class="input-group input-append date datepicker1">
                            <input type="text" readonly="" value="<?= DateUtil::formatDate($log['prolog_createdate']) ?>" name="getdate" class="form-control validate[required]">
                            <span class="input-group-addon add-on"><i class="icon-calendar"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-2">วันที่ทำ</label>
                    <div class="col-md-3">
                        <div data-date-format="dd-mm-yyyy" data-date="12-02-2012"  class="input-group input-append date datepicker1">
                            <input type="text" readonly="" name="fixdate" class="form-control validate[required]" value="<?= DateUtil::formatDate($log['prolog_fixdate']) ?>">
                            <span class="input-group-addon add-on"><i class="icon-calendar"></i></span>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-2">สถานะ</label>
                    <div class="col-md-2">
                        <?php $arrayFix = ArrayUtil::fixStatus()?>
                        <?=  HtmlUtil::dropdownArray('status', $log['prolog_status'], $arrayFix, '', '')?>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="form-group">
                <div class="col-md-12" style="text-align: center;">
                    <button type="submit" class="btn btn-primary" id="btn-projectsave">
                        <i class="icon-ok-sign"></i> บันทึก
                    </button>
                    <button type="button" class="btn btn-warning">
                        <i class="icon-backward"></i> กลับหน้าหลัก
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="formProjectSearchModal" class="modal fade" style="display: none;">    
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 id="H2" class="modal-title">ค้นหาโปรเจคที่ต้องการ</h4>
            </div>
            <div class="modal-body form-horizontal">
                <div class="form-group">
                    <label class="col-md-2">คำค้นหา</label>
                    <div class="col-md-4 input-group">
                        <input type="text" class="form-control validate[required,minSize[6]]" name="word"/>
                        <span class="input-group-addon add-on primary" onclick="searchProject()">
                            <i class="icon-zoom-in"></i></span>
                    </div>
                </div>
                <div class="form-group" id="loadAjaxProject">                    
                    <table class="table table-bordered dataTable">
                        <thead>
                            <tr>
                                <th>รหัส</th>
                                <th>ชื่อ</th>
                                <th>เลือก</th>
                            </tr>
                        </thead>
                        <tbody id="parent">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">    
                <button data-dismiss="modal" class="btn btn-default" type="button">
                    <i class="icon-remove-sign"></i> ปิด
                </button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        var valid = $('#frm-log').validationEngine('attach', {
            onValidationComplete: function(form, status) {
                //alert("The form status is: " + status + ", it will never submit");
                if (status == true) {
                    PostJson('frm-log', 'index.php?r=Project/SaveProjectLog');
                }
            }
        });
    });
    function searchProject() {
        $.ajax({
            url: 'index.php?r=Project/SearchProjectByWord',
            data: {
                word: $('input[name=word]').val(),
            },
            type: 'get',
            dataType: 'json',
            success: function(data) {
                $('#parent').empty();
                $.each(data, function(index, value) {
                    var params = new Array();
                    params.push(value.pro_id);
                    params.push(String(value.pro_id));
                    var child = '<tr>';
                    child += '<td style="width: 20 % ">' + value.pro_id + '</td>';
                    child += '<td>' + value.pro_nameth + ' (' + value.pro_nameeng + ')</td>';
                    child += '<td style="width: 10%">';
                    child += '<button class="btn btn-primary btn-rect" onclick="selectProject(' + value.pro_id + ',\'' + value.pro_nameth + '\')">';
                    child += '<i class="icon-check icon-1x"></i>';
                    child += '</button>';
                    child += '</td>';
                    child += '</tr>';
                    $('#parent').append(child);
                });
            }
        })
    }
    function selectProject(id, name) {
        $('#pro_id').val(id);
        $('#pro_name').val(name);
        $('#formProjectSearchModal').modal('hide');
    }
</script>