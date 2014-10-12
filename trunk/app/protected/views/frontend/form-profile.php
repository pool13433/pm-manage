<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="formProfileModal" class="modal fade" style="display: none;">
    <?php
    $member = Member::model()->findByPk(Yii::app()->session['member']['mem_id'])
    ?>
    <form class="form-horizontal" name="frm-profile" id="frm-profile">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 id="H2" class="modal-title">แก้ไขข้อมูลส่วนตัว</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="col-md-3">ชื่อ</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control validate[required]" name="fname" value="<?= $member['mem_fname'] ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="col-md-3">นามสกุล</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control validate[required]" name="lname" value="<?= $member['mem_lname'] ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="col-md-3">โทร</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control validate[required]" name="mobile" value="<?= $member['mem_tel'] ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="col-md-3">อีเมลล์</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control validate[required,custom[email]]" name="email" value="<?= $member['mem_email'] ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="col-md-3">ที่อยู่</label>
                            <div class="col-md-9">
                                <textarea class="form-control validate[required]" name="address"><?= $member['mem_address'] ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">                
                    <button class="btn btn-primary" type="submit">
                        <i class="icon-key"></i> แก้ไขข้อมูลส่วนตัว
                    </button>
                    <button data-dismiss="modal" class="btn btn-default" type="button">
                        <i class="icon-remove-sign"></i> ปิด
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(function() {
        var valid = $('#frm-profile').validationEngine('attach', {
            onValidationComplete: function(form, status) {
                //alert("The form status is: " + status + ", it will never submit");
                if (status == true) {
                    PostJson('frm-profile', 'index.php?r=Member/ChangeProfile');
                }
            }
        });
    });
</script>

