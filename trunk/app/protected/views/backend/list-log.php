<div class="box primary">
    <header>
        <div class="icons"><i class="icon-building"></i></div>
        <h5>ปัญหาของโปรแกรมทั้งหมด</h5>
        <div class="toolbar">
            <ul class="nav pull-right">
                <li><a href="<?= Yii::app()->createUrl('Project/NewProjectLog') ?>" class="btn btn-warning btn-sm">
                        <i class="icon-plus-sign icon-2x"></i> NEW</a></li>                
                <li>
                    <a class="accordion-toggle minimize-box" data-toggle="collapse" href="#div-1">
                        <i class="icon-chevron-up"></i>
                    </a>
                </li>
            </ul>
        </div>
    </header>
    <div id="div1" class="body collapse in">
        <table class="table table-bordered dataTable">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อโปรแกรม</th>
                    <th>ชื่อข้อผิดพลาด</th>
                    <th>วันที่สร้าง</th>
                    <th>วันที่แก้ไข</th>
                    <th>สถานะ</th>
                    <th>เครื่องมือ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listProjectLog as $data): ?>
                    <tr>
                        <td  style="width: 5%;vertical-align: middle"><?= $data['prolog_id'] ?></td>
                        <td  style="width: 15%;"><?= $data['project']['pro_nameth'] ?></td>
                        <td><textarea readonly="" class="form-control" rows="6"><?= $data['prolog_name'] ?></textarea></td>
                        <td  style="width: 10%"><?= DateUtil::formatDate($data['prolog_createdate']) ?></td>
                        <td  style="width: 10%;"><?= DateUtil::formatDate($data['prolog_fixdate']) ?></td>
                        <td  style="width: 7%;vertical-align: top;">
                            <?php
                            if ($data['prolog_status'] == 0):
                                echo '<span class="label label-warning">รอ</span>';
                            elseif ($data['prolog_status'] == 1):
                                echo '<span class="label label-info">กำลังทำ</span>';
                            else:
                                echo '<span class="label label-success">เสร็จสิ้น</span>';
                            endif;
                            ?>
                        </td>
                        <td  style="width: 13%;">
                            <div class="btn-group">
                                <a href="<?= Yii::app()->createUrl('Project/NewProjectLog', array('id' => $data['prolog_id'])) ?>" class="btn btn-info btn-rect btn-xs" ><i class="icon-pencil"></i> แก้ไข</a>                                
                                <button type="button" class="btn btn-danger btn-xs btn-rect" onclick="return deleteItem(<?= $data['prolog_id'] ?>, 'index.php?r=Project/DeleteProjectLog')"><i class=" icon-trash"></i> ลบ</button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>



