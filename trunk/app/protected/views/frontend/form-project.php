<form class="form-horizontal" id="frm-project" name="frm-project">
    <div class="box primary">
        <header>
            <div class="icons"><i class="icon-th"></i></div>
            <h5>หน้าฟอร์มสำหรับกาลงทะเบียน จ้างงาน</h5>   
            <div class="toolbar">
                <button data-target="#div1" data-toggle="collapse" class="btn btn-default btn-sm">
                    <i class="icon-arrow-down"></i>
                </button>
            </div>
        </header>
        <div id="div1" class="body">
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-3">ชื่อไทย</label>
                    <div class="col-md-6">
                        <input type="hidden" name="id" id="pro_id" value="<?= $project['pro_id'] ?>"/>
                        <input type="text" name="nameth" class="form-control validate[required]" value="<?= $project['pro_nameth'] ?>"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-3">ชื่ออังกฤษ</label>
                    <div class="col-md-6">
                        <input type="text" name="nameeng" class="form-control validate[required]" value="<?= $project['pro_nameeng'] ?>"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-3">รายละเอียด</label>
                    <div class="col-md-9">
                        <textarea class="form-control validate[required]" name="detail"><?= $project['pro_descrition'] ?></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-3">ราคา</label>
                    <div class="col-md-3">
                        <input type="text" name="price" class="form-control validate[required,custom[number]]" <?= $disabled ?> value="<?= $project['pro_prices'] ?>"/>
                    </div>
                    <div class="col-md-6">
                            <span class="label label-info">ราคานี้ ค่าพัฒนาโปรแกรม + ค่าเอกสาร</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-3">ลักษณะการชำระเงิน</label>
                    <div class="col-md-2">
                        <?= HtmlUtil::dropdownArray('payment', $project['pro_paytype'], ArrayUtil::payemtType(), 'validate[required]', $disabled) ?>
                    </div>
                    <label class="col-md-1"></label>
                    <div class="col-md-6">
                            <span class="label label-info">ลักษรณะการแบ่งจ่ายชำระเงิน</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-3">วันเริ่มสัญญา</label>
                    <div class="col-md-3">
                        <div data-date-format="dd-mm-yyyy" data-date="12-02-2012"  class="input-group input-append date datepicker1">
                            <input type="text" readonly="" value="<?= DateUtil::formatDate($project['pro_startdate']) ?>" name="startdate" class="form-control validate[required]">
                            <span class="input-group-addon add-on"><i class="icon-calendar"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-3">วันสิ้นสุดสัญญา</label>
                    <div class="col-md-3">
                        <div data-date-format="dd-mm-yyyy" data-date="12-02-2012" class="input-group input-append date datepicker2">
                            <input type="text" readonly="" value="<?= DateUtil::formatDate($project['pro_enddate']) ?>" name="enddate" class="form-control validate[required]">
                            <span class="input-group-addon add-on"><i class="icon-calendar"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-3">รูปแบบการพัฒนา</label>            
                    <div class="col-md-9 ">
                        <div class="checkbox-inline">
                            <label>
                                <?= HtmlUtil::radiobox('applicationtype', '1', $project['pro_applicationtype'], 'validate[required]') ?>
                                website application
                            </label>
                        </div>
                        <div class="checkbox-inline">
                            <label>                            
                                <?= HtmlUtil::radiobox('applicationtype', '2', $project['pro_applicationtype'], 'validate[required]') ?>
                                window application
                            </label>
                        </div>
                        <div class="checkbox-inline">
                            <label>
                                <?= HtmlUtil::radiobox('applicationtype', '3', $project['pro_applicationtype'], 'validate[required]') ?>
                                mobile application
                            </label>
                        </div>
                    </div>
                </div>               
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-3">เครื่องมือฐานข้อมูล</label>
                    <div class="col-md-3">
                        <?= HtmlUtil::dropdownList('tool_data', $project['pro_tooldatabase'], $tools_data, 'tooldata', 'validate[required]',$disabled) ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-3">เครื่องมือสร้างโปรแกรม</label>
                    <div class="col-md-3">
                        <?= HtmlUtil::dropdownList('tool_dev', $project['pro_tooldevelop'], $tools_dev, 'tooldev', 'validate[required]',$disabled) ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-3">ภาษาโปรแกรมมิ่งที่เกี่ยวข้อง</label>
                    <div class="col-md-9" id="box_language">
                        <?php foreach ($programming as $data): ?>
                            <div class="checkbox-inline">
                                <label>
                                    <input type="checkbox" name="programming[]"  value="<?= $data['prolan_id'] ?>" <?= $disabled ?>
                                           class="uniform">
                                    <?= $data['prolan_name'] ?>
                                </label>
                            </div>
                        <?php endforeach; ?>                        
                    </div>                                       
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-3 checkbox">
                        <?=  HtmlUtil::checkbox('require_uml', '1', $project['prouml_use'], '')?>
                        ต้องการพัฒนาเอกสารด้วย 
                    </label>
                    <div class="col-md-9" id="box_uml">
                        <?php foreach ($uml as $data): ?>
                            <div class="checkbox-inline">
                                <label>
                                    <input type="checkbox" name="uml[]" value="<?= $data['uml_id'] ?>" class="uniform">
                                    <?= $data['uml_name'] ?>
                                </label>
                            </div>
                        <?php endforeach; ?>                        
                    </div>                                       
                </div>
            </div>
            <hr/>
            <div class="form-group pre">
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
<script type="text/javascript">
    $(function() {
        var id = $('#pro_id').val();
        if(id!=''){
            getCheckUml();
            getCheckedLanguage();
        }
        // ############### disabled ##################
        $('#box_uml').find(':input').attr('disabled', true);
        $('input[name=require_uml]').on('click', function() {
            var checked = this.checked;
            if (checked) {
                $('#box_uml').find(':input').attr('disabled', false);
            } else {
                $('#box_uml').find(':input').attr('disabled', true);
            }
        });
        // ############### disabled ##################
        var valid = $('#frm-project').validationEngine('attach', {
            onValidationComplete: function(form, status) {
                //alert("The form status is: " + status + ", it will never submit");
                if (status == true) {
                    PostJson('frm-project', 'index.php?r=Project/SaveProject');
                }
                console.log(' status : ' + status);
            }
        });
    });
    function getCheckUml() {
        var list_checkbox = $('#box_uml').find(':checkbox');
        var pro_id = $('#pro_id').val()
        //console.log(pro_id);
        $.each(list_checkbox, function(index, obejctHtml) {
            var value = $(obejctHtml).val();
            $.ajax({
                url: 'index.php?r=Project/GetProjectUmlChekced',
                data: {
                    id: value,
                    pro_id: pro_id,
                },
                success: function(data) {
                    if (data == 'OK') {
                        $(obejctHtml).attr('checked', true);
                    }
                }
            });
        })
    }
    function getCheckedLanguage() {
        var list_checkbox = $('#box_language').find(':checkbox');
        var pro_id = $('#pro_id').val();
        //console.log(pro_id);
        $.each(list_checkbox, function(index, obejctHtml) {
            var value = $(obejctHtml).val();
            $.ajax({
                url: 'index.php?r=Project/GetProjectLanguageChecked',
                data: {
                    id: value,
                    pro_id: pro_id,
                },
                success: function(data) {
                    if (data == 'OK') {
                        $(obejctHtml).attr('checked', true);
                    }
                }
            });
            //console.log(' index : ' + index + ' value : ' + value);
        })
    }
</script>
