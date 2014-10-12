<div class="box primary">
    <header>
        <div class="icons"><i class="icon-building"></i></div>
        <h5>รายการปัญหาทั้งหมด</h5>
        <div class="toolbar">
            <ul class="nav pull-right">
                <li><a href="<?= Yii::app()->createUrl('Problem/NewProblem') ?>" class="btn btn-warning btn-sm">
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
                    <th>ชื่องาน</th>
                    <th>รายละเอียด</th>
                    <th>วันแจ้ง</th>
                    <th>เครื่องมือ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listProblem as $data): ?>
                    <tr>
                        <td  style="width: 5%"><?= $data['prob_id'] ?></td>
                        <td  style="width: 15%"><?= $data['prob_name'] ?></td>
                        <td><textarea readonly="" class="form-control"><?= $data['prob_detail'] ?></textarea></td>
                        <td  style="width: 10%"><?= DateUtil::formatDate($data['prob_createdate']) ?></td>
                        <td  style="width: 20%">
                            <div class="btn-group">
                                <a href="<?= Yii::app()->createUrl('Problem/NewProblem', array('id' => $data['prob_id'])) ?>" class="btn btn-info btn-rect btn-xs" ><i class="icon-pencil"></i> แก้ไข</a>
                                <a href="<?= Yii::app()->createUrl('Problem/ViewProblem', array('id' => $data['prob_id'])) ?>" class="btn btn-warning btn-rect btn-xs" ><i class="icon-eye-open"></i> ดู</a>
                                <button type="button" class="btn btn-danger btn-xs btn-rect" onclick="return deleteItem(<?= $data['prob_id'] ?>,'index.php?r=Problem/DeleteProblem')"><i class=" icon-trash"></i> ลบ</button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>

