<div class="box primary">
    <header>
        <div class="icons"><i class="icon-building"></i></div>
        <h5>รายการการจ้างงานทั้งหมด</h5>
        <div class="toolbar">
            <button data-target="#div1" data-toggle="collapse" class="btn btn-default btn-sm">
                <i class="icon-arrow-down"></i>
            </button>
        </div>
    </header>
    <div id="div1" class="body collapse in">
        <table class="table table-bordered dataTable">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่องาน</th>
                    <th>วันจ้าง</th>
                    <th>วันเริ่ม</th>
                    <th>วันสิ้นสุด</th>
                    <th>สถานะ</th>
                    <th>เครื่องมือ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listProject as $data): ?>
                    <tr>
                        <td><?= $data['pro_id'] ?></td>
                        <td><?= $data['pro_nameth'] . " (" . $data['pro_nameeng'] . ")" ?></td>
                        <td><?= DateUtil::formatDate($data['pro_createdate']) ?></td>
                        <td><?= DateUtil::formatDate($data['pro_startdate']) ?></td>
                        <td><?= DateUtil::formatDate($data['pro_enddate']) ?></td>
                        <td>
                            <?php
                            if ($data['pro_status'] == 0):
                                echo '<span class="label label-warning">รอการดำเนินการ</span>';
                            elseif ($data['pro_status'] == 1):
                                echo '<span class="label label-info">ดำเนินการ</span>';
                            else:
                                echo '<span class="label label-success">เสร็จสิ้น</span>';
                            endif;
                            ?>
                        </td>
                        <td style="width: 30%">
                            <div class="btn-group">
                                <a href="<?= Yii::app()->createUrl('Project/RegisterProject', array('id' => $data['pro_id'])) ?>" class="btn btn-info btn-xs btn-rect"><i class=" icon-pencil"></i> แก้ไข</a>                                
                                <?php if (Yii::app()->session['member']['mem_status'] == 1): ?>
                                    <button class="btn btn-info btn-xs btn-rect" data-toggle="modal" data-target="#formProjectModal<?=$data['pro_id']?>">
                                        <i class=" icon-pencil"></i> อัพเดท</button>                                
                                    <button class="btn btn-primary btn-xs btn-rect dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-cog"></i> ปรับสถานะ<span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#" onclick="return changeStatusUtil(<?= $data['pro_id'] ?>, '0', 'index.php?r=Project/ChangeProjectStatus')">รอ</a></li>
                                        <li><a href="#" onclick="return changeStatusUtil(<?= $data['pro_id'] ?>, '1', 'index.php?r=Project/ChangeProjectStatus')">ดำนินการ</a></li>
                                        <li><a href="#" onclick="return changeStatusUtil(<?= $data['pro_id'] ?>, '2', 'index.php?r=Project/ChangeProjectStatus')">เสร็จสิ้น</a></li>                                        
                                    </ul>
                                <?php endif ?>
                                <a class="btn btn-info btn-xs btn-rect" href="<?= Yii::app()->createUrl('Project/ViewProject', array('id' => $data['pro_id'])) ?>">
                                    <i class="icon-eye-open"></i> ดูราละเอียด
                                </a>                                
                            </div>

                            <!-- ################## modal #####################-->
                            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="formProjectModal<?=$data['pro_id']?>" class="modal fade" style="display: none;">
                                <form class="form-horizontal" name="frm-project<?=$data['pro_id']?>" id="frm-project<?=$data['pro_id']?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                <h4 id="H2" class="modal-title">เปลี่ยนสถานะของโปรเจค</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label class="col-md-6">งวด 1</label>
                                                        <div class="col-md-6">
                                                            <input type="hidden" class="form-control validate[required]" name="id" value="<?= $data['pro_id'] ?>"/>
                                                            <input type="text" class="form-control validate[required]" name="pay1" value="<?= $data['pro_pay1'] ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr/>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label class="col-md-6">งวด 2</label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control validate[required]" name="pay2" value="<?= $data['pro_pay2'] ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr/>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label class="col-md-6">งวด 2</label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control validate[required]" name="pay3" value="<?= $data['pro_pay3'] ?>"/>
                                                        </div>
                                                    </div>
                                                </div>     
                                                <hr/>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label class="col-md-6">เปอร์เซ็นต์ งาน</label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control validate[required]" name="process" value="<?= $data['pro_process'] ?>"/>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="modal-footer">                
                                                <button class="btn btn-primary" type="submit" id="btn-login">
                                                    <i class="icon-key"></i> ปรับสถานะ
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
                                    var valid = $('#frm-project<?=$data['pro_id']?>').validationEngine('attach', {
                                        onValidationComplete: function(form, status) {
                                            //alert("The form status is: " + status + ", it will never submit");
                                            if (status == true) {
                                                PostJson('frm-project<?=$data['pro_id']?>', 'index.php?r=Project/ChangeProjectProperties');
                                            }
                                        }
                                    });
                                });
                            </script>
                            <!-- ################## modal #####################-->                           
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
