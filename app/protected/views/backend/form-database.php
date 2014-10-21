<form class="form-horizontal" name="frm-database" id="frm-database">
    <div class="box primary">
        <header>
            <a href="<?= Yii::app()->createUrl('Dropdown/ListDatabase') ?>" class="icons btn btn-info btn-rect">
                <i class="icon-arrow-left"></i> กลับ
            </a>
            <h5>Form Database</h5>
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
                    <label class="col-md-2">ชื่อ เครื่องมือฐานข้อมูล</label>
                    <div class="col-md-6">
                        <input type="hidden" name="id" value="<?= $database['tooldata_id'] ?>"/>
                        <input type="text" class="form-control validate[required]" name="name" value="<?= $database['tooldata_name'] ?>"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-2">รายละเอียด</label>
                    <div class="col-md-8">
                        <textarea class="form-control validate[required]" name="desc"><?= $database['tooldata_desc'] ?></textarea>
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
        var valid = $('#frm-database').validationEngine('attach', {
            onValidationComplete: function(form, status) {
                //alert("The form status is: " + status + ", it will never submit");
                if (status == true) {
                    PostJson('frm-database', 'index.php?r=Dropdown/SaveDatabase');
                }
            }
        });
    });
</script>


