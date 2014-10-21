<form class="form-horizontal" name="frm-history" id="frm-history">
    <div class="box primary">
        <header>
            <a href="<?= Yii::app()->createUrl('Project/ListProjectHistory') ?>" class="icons btn btn-info btn-rect">
                <i class="icon-arrow-left"></i> กลับ
            </a>
            <h5>ฟอร์มบันทึกการเยี่ยมพบลูกค้าโปรเจค</h5>
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
                        <input type="hidden" name="pro_id" id="pro_id" value="<?= $history['pro_id'] ?>"/>
                        <div class="input-group">
                            <input type="text" class="form-control validate[required]" name="pro_name" id="pro_name" readonly="" value="<?= $history['project']['pro_nameth'] ?>"/>
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
                        <input type="hidden" class="form-control" name="id" value="<?= $history['prohis_id'] ?>"/>
                        <input type="text" class="form-control validate[required]" name="topic" value="<?= $history['prohis_topic'] ?>"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-2">รายละเอียด</label>
                    <div class="col-md-8">
                        <textarea class="form-control validate[required]" name="detail"><?= $history['prohis_detail'] ?></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-2">วันที่ทำ</label>
                    <div class="col-md-3">
                        <div data-date-format="dd-mm-yyyy" data-date="12-02-2012"  class="input-group input-append date datepicker1">
                            <input type="text" readonly="" name="getdate" class="form-control validate[required]" value="<?= DateUtil::formatDate($history['prohis_getdate']) ?>">
                            <span class="input-group-addon add-on"><i class="icon-calendar"></i></span>
                        </div>
                    </div>
                </div>
            </div>       
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-2">วันที่เริ่ม</label>
                    <div class="col-md-3">
                        <div data-date-format="dd-mm-yyyy" data-date="12-02-2012"  class="input-group input-append date datepicker1">
                            <input type="text" readonly="" value="<?= DateUtil::formatDate($history['prohis_startdate']) ?>" name="startdate" class="form-control validate[required]">
                            <span class="input-group-addon add-on"><i class="icon-calendar"></i></span>
                        </div>
                    </div>
                </div>
            </div>            
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-2">เวลาเริ่ม</label>
                    <div class="col-md-2">
                        <div class="input-group bootstrap-timepicker"><div class="bootstrap-timepicker-widget dropdown-menu"><table><tbody><tr><td><a data-action="incrementHour" href="#"><i class="icon-chevron-up"></i></a></td><td class="separator">&nbsp;</td><td><a data-action="incrementMinute" href="#"><i class="icon-chevron-up"></i></a></td><td class="separator">&nbsp;</td><td><a data-action="incrementSecond" href="#"><i class="icon-chevron-up"></i></a></td></tr><tr><td><input type="text" maxlength="2" class="bootstrap-timepicker-hour"></td> <td class="separator">:</td><td><input type="text" maxlength="2" class="bootstrap-timepicker-minute"></td> <td class="separator">:</td><td><input type="text" maxlength="2" class="bootstrap-timepicker-second"></td></tr><tr><td><a data-action="decrementHour" href="#"><i class="icon-chevron-down"></i></a></td><td class="separator"></td><td><a data-action="decrementMinute" href="#"><i class="icon-chevron-down"></i></a></td><td class="separator">&nbsp;</td><td><a data-action="decrementSecond" href="#"><i class="icon-chevron-down"></i></a></td></tr></tbody></table></div>
                            <input type="text" name="starttime" class="timepicker-24 form-control validate[required]" value="<?= $history['prohis_starttime'] ?>">
                            <span class="input-group-addon add-on"><i class="icon-time"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-2">วันที่สิ้นสุด</label>
                    <div class="col-md-3">
                        <div data-date-format="dd-mm-yyyy" data-date="12-02-2012"  class="input-group input-append date datepicker1">
                            <input type="text" readonly="" value="<?= DateUtil::formatDate($history['prohis_enddate']) ?>" name="enddate" class="form-control validate[required]">
                            <span class="input-group-addon add-on"><i class="icon-calendar"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-2">เวลาสิ้นสุด</label>
                    <div class="col-md-2">
                        <div class="input-group bootstrap-timepicker"><div class="bootstrap-timepicker-widget dropdown-menu"><table><tbody><tr><td><a data-action="incrementHour" href="#"><i class="icon-chevron-up"></i></a></td><td class="separator">&nbsp;</td><td><a data-action="incrementMinute" href="#"><i class="icon-chevron-up"></i></a></td><td class="separator">&nbsp;</td><td><a data-action="incrementSecond" href="#"><i class="icon-chevron-up"></i></a></td></tr><tr><td><input type="text" maxlength="2" class="bootstrap-timepicker-hour"></td> <td class="separator">:</td><td><input type="text" maxlength="2" class="bootstrap-timepicker-minute"></td> <td class="separator">:</td><td><input type="text" maxlength="2" class="bootstrap-timepicker-second"></td></tr><tr><td><a data-action="decrementHour" href="#"><i class="icon-chevron-down"></i></a></td><td class="separator"></td><td><a data-action="decrementMinute" href="#"><i class="icon-chevron-down"></i></a></td><td class="separator">&nbsp;</td><td><a data-action="decrementSecond" href="#"><i class="icon-chevron-down"></i></a></td></tr></tbody></table></div>
                            <input type="text" name="endtime" class="timepicker-24 form-control validate[required]" value="<?= $history['prohis_endtime'] ?>">
                            <span class="input-group-addon add-on"><i class="icon-time"></i></span>
                        </div>
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
                var valid = $('#frm-history').validationEngine('attach', {
                    onValidationComplete: function(form, status) {
                    //alert("The form status is: " + status + ", it will never submit");
                    if (status == true) {
                    PostJson('frm-history', 'index.php?r=Project/SaveProjectHistory');
                    }
            }
        });
    });
    fu ncti o n searchProject()   {
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
                    var params = new Array();                     params.push(value.pro_id);
    params.push(String(value.pro_id));
        var child = '<tr>';                     child += '<td style="width: 20 % ">' + value.pro_id + '</td>';
    child += '<td>' + value.pro_nameth +' ('+value.pro_nameeng+')</td>';
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