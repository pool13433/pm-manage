<div class="box primary">
    <header>
        <div class="icons"><i class="icon-building"></i></div>
        <h5> Language ทั้งหมด</h5>
        <div class="toolbar">
            <ul class="nav pull-right">
                <li><a href="<?= Yii::app()->createUrl('Checkbox/NewLanguage') ?>" class="btn btn-warning btn-sm">
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
                    <th>ชื่อ</th>
                    <th>รายละเอียด</th>                    
                    <th>เครื่องมือ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listLanguage as $data): ?>
                    <tr>
                        <td  style="width: 5%"><?= $data['prolan_id'] ?></td>
                        <td  style="width: 15%;"><?= $data['prolan_name'] ?></td>
                        <td><?= $data['prolan_desc'] ?></td>
                        <td  style="width: 13%;">
                            <div class="btn-group">
                                <a href="<?= Yii::app()->createUrl('Checkbox/NewLanguage', array('id' => $data['prolan_id'])) ?>" class="btn btn-info btn-rect btn-xs" ><i class="icon-pencil"></i> แก้ไข</a>                                
                                <button type="button" class="btn btn-danger btn-xs btn-rect" onclick="return deleteItem(<?= $data['prolan_id'] ?>, 'index.php?r=Checkbox/DeleteLanguage')"><i class=" icon-trash"></i> ลบ</button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>






