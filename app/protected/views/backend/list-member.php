<div class="box primary">
    <header>
        <div class="icons"><i class="icon-th"></i></div>
        <h5>รายการสมาชิกระบบทั้งหมด</h5>
        <div class="toolbar">
            <ul class="nav pull-right">
                <li><a href="<?= Yii::app()->createUrl('Member/NewMember') ?>" class="btn btn-warning btn-sm">
                        <i class="icon-plus-sign icon-2x"></i> NEW</a></li>          
                <li>
                    <a class="accordion-toggle minimize-box" data-toggle="collapse" href="#div-1">
                        <i class="icon-chevron-up"></i>
                    </a>
                </li>
            </ul>
        </div>
    </header>
    <div id="div-1" class="body collapse in">
        <table class="table table-bordered dataTable">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อ-สกุล</th>
                    <th>email</th>
                    <th>mobile</th>
                    <th>สถานะ</th>
                    <th>เครื่องมือ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listMember as $data): ?>
                    <tr>
                        <td><?= $data['mem_id'] ?></td>                        
                        <td><?= $data['mem_fname'] . "   " . $data['mem_lname'] ?></td>
                        <td><?= $data['mem_email'] ?></td>
                        <td><?= $data['mem_tel'] ?></td>
                        <td>
                            <?php if ($data['mem_status'] == 0): ?>
                                <span class="label label-default">ทั่วไป (รออนุมัติ)</span>
                            <?php elseif ($data['mem_status'] == 1): ?>
                                <span class="label label-success">admin</span>
                            <?php elseif ($data['mem_status'] == 2): ?>
                                <span class="label label-info">สมาชิก</span>
                            <?php elseif ($data['mem_status'] == 3): ?>
                                <span class="label label-danger">โดน แบน ทำผิดกฏ</span>
                            <?php else: ?>
                                <span class="label label-warning">อื่น ๆ</span>
                            <?php endif; ?>
                        </td>
                        <td style="width: 20%">
                            <div class="btn-group">
                                <a href="<?= Yii::app()->createUrl('Member/NewMember', array('id' => $data['mem_id'])) ?>" class="btn btn-info btn-sm btn-rect">
                                    <i class="icon-pencil"></i> แก้ไขข้อมูล</a>
                                <button class="btn btn-primary btn-sm btn-rect dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-cog"></i> เครื่องมือ<span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <?php $status = ArrayUtil::memberStatus(); ?>
                                    <?php foreach ($status as $key => $value): ?>
                                        <li><a href="#" onclick="return changeStatusUtil(<?= $data['mem_id'] ?>, '<?= $key ?>', 'index.php?r=Member/ChangeMemberStatus')"><?= $value ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
