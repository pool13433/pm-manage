<form class="form-horizontal" name="frm-news" id="frm-news">
    <div class="box primary">
        <header>
            <a href="<?= Yii::app()->createUrl('News/ListNews') ?>" class="icons btn btn-info btn-rect">
                <i class="icon-arrow-left"></i> กลับ
            </a>
            <h5>ฟอร์มข่าว</h5>
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
                        <input type="hidden" name="id" value="<?= $news['news_id'] ?>"/>
                        <input type="text" class="form-control validate[required]" name="title" value="<?= $news['news_title'] ?>"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-2">รายละเอียด</label>
                    <div class="col-md-10">
                        <textarea class="form-control   validate[required]" name="detail" id="wysihtml5" rows="10"><?= $news['news_detail'] ?></textarea>
                    </div>
                </div>
            </div>         
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-2">วันที่เริ่ม</label>
                    <div class="col-md-3">
                        <div data-date-format="dd-mm-yyyy" data-date="12-02-2012"  class="input-group input-append date  datepicker1">
                            <input type="text"  value="<?= DateUtil::formatDate($news['news_startdate']) ?>" name="startdate" class="form-control validate[required]">
                            <span class="input-group-addon add-on"><i class="icon-calendar"></i></span>
                        </div>
                    </div>
                </div>
            </div>    
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-2">ส่งเมลล์ ถึง</label>
                    <div class="col-md-10">
                        <select data-placeholder="Choose a Email" multiple="multiple"  tabindex="5" class="form-control chzn-select" style="height:25px;">
                            <?php foreach ($emails as $data): ?>
                                <option value="<?= $data['mem_email'] ?>"><?= $data['mem_email'] ?></option>
                            <?php endforeach; ?>
                        </select>
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
        /*----------- BEGIN wysihtml5 CODE -------------------------*/
        $('#wysihtml5').wysihtml5();
        /*----------- END wysihtml5 CODE -------------------------*/

        var valid = $('#frm-news').validationEngine('attach', {
            onValidationComplete: function(form, status) {
                //alert("The form status is: " + status + ", it will never submit");
                if (status == true) {
                    PostJson('frm-news', 'index.php?r=News/SaveNews');
                }
            }
        });
    });
</script>
