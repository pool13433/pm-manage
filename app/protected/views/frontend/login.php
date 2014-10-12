<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="formModal" class="modal fade" style="display: none;">
    <form role="form" class="form-horizontal" id="frm-login">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 id="H2" class="modal-title">ลงชื่อเข้าใช้งานระบบ</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label class="col-md-3">Username</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control validate[required]" name="username">                            
                        </div>                        
                    </div>
                    <div class="form-group">
                        <label class="col-md-3">Password</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control validate[required]" name="password">                            
                        </div>                        
                    </div>                
                </div>
                <div class="modal-footer">                
                    <button class="btn btn-primary" type="submit" id="btn-login">
                        <i class="icon-signin"></i> เข้าระบบ
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
        var valid = $('#frm-login').validationEngine('attach', {
            onValidationComplete: function(form, status) {
                //alert("The form status is: " + status + ", it will never submit");
                if (status == true) {
                    PostJson('frm-login', 'index.php?r=Member/CheckLogin');
                }
            }
        });
    });
</script>
