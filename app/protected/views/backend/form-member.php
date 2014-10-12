<form class="form-horizontal" name="frm-member" id="frm-member">          
    <div class="box primary">
        <header>
            <a href="<?= Yii::app()->createUrl('Member/ListMember') ?>" class="icons btn btn-info btn-rect">
                <i class="icon-arrow-left"></i> กลับ
            </a>
            <h5>หน้าสมัครสมาชิก</h5>
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
                    <label class="col-md-2">Username</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control validate[required,minSize[6]]" name="username" value="<?= $member['mem_username'] ?>"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                    <label class="col-md-4">รหัสผ่าน</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control validate[required,minSize[6]]" name="password" id="password1" value="<?= $member['mem_password'] ?>"/>
                    </div>
                    <label class="label label-success" id="lb-password"><?= $member['mem_password'] ?></label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                    <label class="col-md-4">ยืนยันรหัสผ่าน</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control validate[required,minSize[6],equals[password1]]" name="password2" id="password2" value="<?= $member['mem_password'] ?>"/>
                    </div>
                    <label class="label label-success" id="lb-password2"><?= $member['mem_password'] ?></label>                    
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary btn-rect" onclick="genaratePassword()">
                        <i class="icon-cogs"></i> Random
                    </button>
                </div>
            </div>
            <hr/>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-2">ชื่อ</label>
                    <div class="col-md-3">
                        <input type="hidden" class="form-control" name="id" value="<?= $member['mem_id'] ?>"/>
                        <input type="text" class="form-control validate[required]" name="fname" value="<?= $member['mem_fname'] ?>"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-2">นามสกุล</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control validate[required]" name="lname" value="<?= $member['mem_lname'] ?>"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-2">โทรศัพท์</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control validate[required]" name="mobile" value="<?= $member['mem_tel'] ?>"/>
                    </div>
                </div>
            </div>        
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-2">อีเมลล์</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control validate[required,custom[email]]" name="email" value="<?= $member['mem_email'] ?>"/>
                    </div>
                </div>
            </div>    
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-2">ที่อยู่</label>
                    <div class="col-md-6">
                        <textarea class="form-control validate[required]" name="address"><?= $member['mem_address'] ?></textarea>
                    </div>
                </div>
            </div> 
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-2">สถานะ</label>
                    <div class="col-md-3">
                        <?php $status = ArrayUtil::memberStatus(); ?>
                        <?= HtmlUtil::dropdownArray('status', $member['mem_status'], $status, '', '') ?>
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
        var valid = $('#frm-member').validationEngine('attach', {
            onValidationComplete: function(form, status) {
                //alert("The form status is: " + status + ", it will never submit");
                if (status == true) {
                    PostJson('frm-member', 'index.php?r=Member/SaveMember');
                }
            }
        });
    });
    function genaratePassword() {
        $.ajax({
            url: 'index.php?r=Member/GenaratePassword',
            dataType: 'json',
            success: function(data) {
                $('input[name=password]').val(data.random);
                $('input[name=password2]').val(data.random);
                $('#lb-password').text(data.random);
                $('#lb-password2').text(data.random);
            }
        });
    }
</script>
