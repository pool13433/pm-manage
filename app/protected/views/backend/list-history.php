<div class="box primary">
    <header>
        <div class="icons"><i class="icon-building"></i></div>
        <h5>การกระทำทั้งหมด</h5>
        <div class="toolbar">
            <ul class="nav pull-right">
                <li><a href="<?= Yii::app()->createUrl('Project/NewProjectHistory') ?>" class="btn btn-warning btn-sm">
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
                    <th>ชื่อโปรเจค</th>
                    <th>ชื่องาน</th>
                    <th>รายละเอียด</th>
                    <th>วันกิจกรรม</th>
                    <th>เวลาเริ่ม</th>
                    <th>เวลาจบ</th>
                    <th>เครื่องมือ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listProjectHistory as $data): ?>
                    <tr>
                        <td  style="width: 5%"><?= $data['prohis_id'] ?></td>
                        <td  style="width: 15%"><?= $data['project']['pro_nameth'] ?></td>
                        <td  style="width: 15%"><?= $data['prohis_topic'] ?></td>
                        <td><textarea readonly="" class="form-control"><?= $data['prohis_detail'] ?></textarea></td>
                        <td  style="width: 10%"><?= DateUtil::formatDate($data['prohis_getdate']) ?></td>
                        <td  style="width: 10%"><?= DateUtil::formatDate($data['prohis_starttime']) ?></td>
                        <td  style="width: 10%"><?= DateUtil::formatDate($data['prohis_endtime']) ?></td>
                        <td  style="width: 13%">
                            <div class="btn-group">
                                <a href="<?= Yii::app()->createUrl('Project/NewProjectHistory', array('id' => $data['prohis_id'])) ?>" class="btn btn-info btn-rect btn-xs" ><i class="icon-pencil"></i> แก้ไข</a>                                
                                <button type="button" class="btn btn-danger btn-xs btn-rect" onclick="return deleteItem(<?= $data['prohis_id'] ?>, 'index.php?r=Project/DeleteProjectHistory')"><i class=" icon-trash"></i> ลบ</button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
