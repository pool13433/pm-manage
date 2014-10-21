<div class="box primary">
    <header>
        <a href="<?= Yii::app()->createUrl('Problem/ListProblem') ?>" class="icons btn btn-info btn-rect">
            <i class="icon-arrow-left"></i> กลับ
        </a>
        <h5>รายการการตอบปัญหา</h5>
        <div class="toolbar">
            <button data-target="#div1" data-toggle="collapse" class="btn btn-default btn-sm">
                <i class="icon-arrow-down"></i>
            </button>
        </div>
    </header>
    <div id="div1" class="body collapse in">
        <div class="form-horizontal">
            <div class="form-group">
                <div class="col-md-6">
                    <div class="alert alert-warning">
                        หัวข้อ : <span class="label label-warning"><?= $problem['prob_name'] ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="alert alert-warning">
                        วันที่แจ้งปัญหา : <span class="label label-warning"><?= DateUtil::formatDate($problem['prob_name']) ?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="alert alert-warning">
                        รายละเอียด : <span class="label label-warning"><?= $problem['prob_detail'] ?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6">     
                    <div class="alert alert-warning">ความสำคัญ : 
                        <?php
                        if ($problem['prob_priority'] == 0):
                            echo '<span class="label label-info"> ธรรมดา</span>';
                        else:
                            echo '<span class="label label-warning"> เร่งด่วน</span>';
                        endif;
                        ?>         
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="alert alert-warning">
                        ผู้แจ้งปัญหา : <span class="label label-warning"><?= $problem['member']['mem_fname'] . " " . $problem['member']['mem_lname'] ?></span>
                    </div>
                </div>
            </div>            
        </div>
        <hr/>
        <form class="form-horizontal" name="frm-answer" id="frm-answer">
            <div class="form-group">
                <div class="col-md-12">
                    <lable class="col-md-2">ตอบ</lable>
                    <div class="col-md-8">
                        <input type="hidden" name="problem_id" id="problem_id" value="<?= $problem['prob_id'] ?>"/>
                        <input type="hidden" name="id" id="answer_id"/>
                        <textarea class="form-control validate[required]" name="detail" id="detail"></textarea>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="form-group">
                <div class="col-md-12" style="text-align: center;">
                    <button type="submit" class="btn btn-primary" id="btn-projectsave">
                        <i class="icon-ok-sign"></i> บันทึก
                    </button>
                </div>
            </div>
        </form>
        <hr/>
        <table class="table table-bordered dataTable">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อผู้ตอบ</th>
                    <th>รายละเอียด</th>
                    <th>วันที่ตอบ</th>
                    <th>เครื่องมือ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listProblemAnswer as $data): ?>
                    <tr>
                        <td style="width: 5%"><?= $data['proa_id'] ?></td>
                        <td style="width: 15%"><?= $data['member']['mem_fname'] . "  " . $data['member']['mem_lname'] ?></td>
                        <td><?= $data['proa_detail'] ?></td>
                        <td style="width: 10%"><?= DateUtil::formatDate($data['proa_createdate']) ?></td>
                        <td style="width: 15%">
                            <?php if (Yii::app()->session['member']['mem_id'] == $data['mem_id']): ?>
                                <button type="button" class="btn btn-info btn-rect btn-xs" onclick="editAnswer(<?= $data['proa_id'] ?>)"><i class="icon-pencil"></i> แก้ไข</button>                                
                                <button type="button" class="btn btn-danger btn-xs btn-rect" onclick="return deleteItem(<?= $data['proa_id'] ?>, 'index.php?r=Problem/DeleteProblem')"><i class=" icon-trash"></i> ลบ</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
<script type="text/javascript">
    $(function() {
        var valid = $('#frm-answer').validationEngine('attach', {
            onValidationComplete: function(form, status) {
                //alert("The form status is: " + status + ", it will never submit");
                if (status == true) {
                    PostJson('frm-answer', 'index.php?r=Problem/SaveProblemAnswer');
                }
            }
        });
    });
    function editAnswer(id) {
        $.ajax({
            url: 'index.php?r=Problem/EditAnswer',
            data: {
                id: id
            },
            dataType: 'json',
            type: 'get',
            success: function(data) {
                console.log(data);
                $('#problem_id').val(data.prob_id);
                $('#answer_id').val(data.proa_id);
                $('#detail').val(data.proa_detail);
                $('#detail').focus();
            }
        });
    }
</script>



