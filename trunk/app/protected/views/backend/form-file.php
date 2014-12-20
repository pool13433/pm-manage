<form class="form-horizontal" name="frm-file" id="frm-file" method="post" enctype="multipart/form-data">
    <div class="box primary">
        <header>
            <a href="<?= Yii::app()->createUrl('File/ListFile') ?>" class="icons btn btn-info btn-rect">
                <i class="icon-arrow-left"></i> กลับ
            </a>
            <h5>Form File</h5>
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
                    <label for="inputDetail" class="col-md-2 control-label">ไฟล์แนบ</label>
                    <div class="col-md-10">
                        <div class="form-group alert-default">
                            <div id="fileuploader">เลือกไฟล์</div>
                            <div id="status">status:</div>
                        </div>
                    </div>    
                </div>
            </div> 
            <hr/>
            <div class="form-group">
                <div class="col-md-12" style="text-align: center;">
                    <button type="button" class="btn btn-primary" id="btnStartUpload">
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
        var valid = $('#frm-file').validationEngine('attach', {
            onValidationComplete: function(form, status) {
                //alert("The form status is: " + status + ", it will never submit");
                if (status == true) {
                    return true;
                } else {
                    return false;
                }
            }
        });
        var settings = {
            url: 'index.php?r=File/UploadFile',
            method: "POST",
            allowedTypes: "jpg,png,gif,doc,docx,pdf,zip,xls",
            //allowedTypes: "png,gif,jpg,jpeg",
            fileName: "myfile",
            multiple: false,
            autoSubmit: false,
            showCancel: false,
            showAbort: false,
            showDone: false,
            showDelete: true,
            returnType: "json",
            onSuccess: function(files, data, xhr) {
                $("#status").html("<font color='green'>Upload is success</font>");
                redirectDelay('index.php?r=File/ListFile',5);
            },
            onError: function(files, status, errMsg) {
                $("#status").html("<font color='red'>Upload is Failed</font>");
            },
            deleteCallback: function(data, pd) {
                for (var i = 0; i < data.length; i++) {
                    $.post('index.php?r=File/DeleteFile', {
                        op: "delete",
                        name: data[i]
                    }, function(resp, textStatus, jqXHR) {
                        //Show Message  
                        $("#status").append("<div class='alert-success'>ลบไฟล์เอกสารเรียบร้อย</div>");
                    });
                }
                pd.statusbar.hide(); //You choice to hide/not.

            }
        }
        var uploadObj = $("#fileuploader").uploadFile(settings);
        $('#btnStartUpload').click(function() {
            uploadObj.startUpload();
        });
    });

</script>



