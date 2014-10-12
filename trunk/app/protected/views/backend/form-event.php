<form class="form-horizontal" name="frm-event" id="frm-event">
    <div class="box primary">
        <header>
            <div class="icons"><i class="icon-th"></i></div>
            <h5>เหตุการณ์ทั้งหมด</h5>
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
                    <label class="col-md-2">ชื่อเหตุการณ์</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control validate[required]" name="name"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-2">รายละเอียด</label>
                    <div class="col-md-8">
                        <textarea class="form-control validate[required]" name="detail"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-2">วันที่แจ้งเหตุการณ์</label>
                    <div class="col-md-3">
                        <div data-date-format="dd-mm-yyyy" data-date="12-02-2012"  class="input-group input-append date datepicker1">
                            <input type="text" readonly="" value="" name="getdate" class="form-control validate[required]">
                            <span class="input-group-addon add-on"><i class="icon-calendar"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-2">วันที่เริ่ม</label>
                    <div class="col-md-2">
                        <?php $days = DateUtil::getDayOfWeeksEng(); ?>
                        <?= HtmlUtil::dropdownArray('day', '', $days, '') ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-2">วันที่เริ่ม</label>
                    <div class="col-md-3">
                        <div data-date-format="dd-mm-yyyy" data-date="12-02-2012"  class="input-group input-append date datepicker1">
                            <input type="text" readonly="" value="" name="startdate" class="form-control validate[required]">
                            <span class="input-group-addon add-on"><i class="icon-calendar"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-2">วันที่สิ้นสุด</label>
                    <div class="col-md-3">
                        <div data-date-format="dd-mm-yyyy" data-date="12-02-2012"  class="input-group input-append date datepicker1">
                            <input type="text" readonly="" value="" name="enddate" class="form-control validate[required]">
                            <span class="input-group-addon add-on"><i class="icon-calendar"></i></span>
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
<script type="text/javascript">
    $(function() {
        var valid = $('#frm-event').validationEngine('attach', {
            onValidationComplete: function(form, status) {
                //alert("The form status is: " + status + ", it will never submit");
                if (status == true) {
                    PostJson('frm-event', 'index.php?r=Event/SaveEvent');
                }
            }
        });
    });
</script>