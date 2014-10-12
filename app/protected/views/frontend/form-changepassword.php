<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="formPassWordModal" class="modal fade" style="display: none;">
    <form class="form-horizontal" name="frm-password" id="frm-password">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 id="H2" class="modal-title">เปลี่ยนรหัสผ่าน</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="col-md-4">Username</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control validate[required,minSize[6]]" name="username"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="col-md-4">รหัสผ่านเก่า</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control validate[required,minSize[6]]" name="passwordold"/>
                            </div>
                        </div>
                    </div>      
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="col-md-4">รหัสผ่านใหม่</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control validate[required]" name="passwordnew" id="passwordnew"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="col-md-4">ยืนยันรหัสผ่านใหม่ อีกครั้ง</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control validate[required,equals[passwordnew]]" name="passwordnew2"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">                
                    <button class="btn btn-primary" type="submit" id="btn-login">
                        <i class="icon-key"></i> เปลี่ยนรหัสผ่าน
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
        var valid = $('#frm-password').validationEngine('attach', {
            onValidationComplete: function(form, status) {
                //alert("The form status is: " + status + ", it will never submit");
                if (status == true) {
                    PostJson('frm-password', 'index.php?r=Member/ChangePassword');
                }
            }
        });
    });
</script>
