
<form class="form-horizontal" name="frm-problem" id="frm-problem">
    <div class="box primary">
        <header>
            <a href="<?= Yii::app()->createUrl('Problem/ListProblem') ?>" class="icons btn btn-info btn-rect">
                <i class="icon-arrow-left"></i> กลับ
            </a>
            <h5>แจ้งปัญญาเกี่ยวกับโปรเจค</h5>
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
                    <label class="col-md-2">ชื่อปัญหา</label>
                    <div class="col-md-6">
                        <input type="hidden" class="form-control" name="id" value="<?= $problem['prob_id'] ?>"/>
                        <input type="text" class="form-control validate[required]" name="name" value="<?= $problem['prob_name'] ?>"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-2">รายละเอียด</label>
                    <div class="col-md-8">
                        <textarea class="form-control validate[required]" name="detail"><?= $problem['prob_detail'] ?></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-2">ความสำคัญ</label>
                    <div class="col-md-8">                        
                        <label class="radio-inline">
                            <?= HtmlUtil::radiobox('priority', '0', $problem['prob_priority']) ?> ธรรมดา
                        </label>
                        <label class="radio-inline">
                            <?= HtmlUtil::radiobox('priority', '1', $problem['prob_priority']) ?> ด่วน
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-2">วันที่แจ้งเหตุการณ์</label>
                    <div class="col-md-3">
                        <div data-date-format="dd-mm-yyyy" data-date="12-02-2012"  class="input-group input-append date datepicker1">
                            <input type="text" readonly="" name="getdate" class="form-control validate[required]" value="<?= DateUtil::formatDate($problem['prob_createdate']) ?>">
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
        var valid = $('#frm-problem').validationEngine('attach', {
            onValidationComplete: function(form, status) {
                //alert("The form status is: " + status + ", it will never submit");
                if (status == true) {
                    PostJson('frm-problem', 'index.php?r=Problem/SaveProblem');
                }
            }
        });
    });
</script>