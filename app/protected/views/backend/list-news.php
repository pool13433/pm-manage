<div class="box primary">
    <header>
        <div class="icons"><i class="icon-building"></i></div>
        <h5>ข่าวทั้งหมด</h5>
        <div class="toolbar">
            <ul class="nav pull-right">
                <li><a href="<?= Yii::app()->createUrl('News/NewNews') ?>" class="btn btn-warning btn-sm">
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
                    <th>วันสร้าง</th>
                    <th>เครื่องมือ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listNews as $data): ?>
                    <tr>
                        <td  style="width: 5%"><?= $data['news_id'] ?></td>
                        <td  style="width: 15%;"><?= $data['news_title'] ?></td>
                        <td><textarea readonly="" class="form-control" rows="6"><?= $data['news_detail'] ?></textarea></td>
                        <td  style="width: 10%;"><?= DateUtil::formatDate($data['news_startdate']) ?></td>
                        <td  style="width: 10%;"><?= DateUtil::formatDate($data['news_createdate']) ?></td>
                        <td  style="width: 13%;">
                            <div class="btn-group">
                                <a href="<?= Yii::app()->createUrl('News/NewNews', array('id' => $data['news_id'])) ?>" class="btn btn-info btn-rect btn-xs" ><i class="icon-pencil"></i> แก้ไข</a>                                
                                <button type="button" class="btn btn-danger btn-xs btn-rect" onclick="return deleteItem(<?= $data['news_id'] ?>, 'index.php?r=News/DeleteNews')"><i class=" icon-trash"></i> ลบ</button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>



