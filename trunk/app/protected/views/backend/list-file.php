<div class="box primary">
    <header>
        <div class="icons"><i class="icon-building"></i></div>
        <h5> File ทั้งหมด</h5>
        <div class="toolbar">
            <ul class="nav pull-right">
                <li><a href="<?= Yii::app()->createUrl('File/NewFile') ?>" class="btn btn-warning btn-sm">
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
                    <th>ชื่อเดิม</th>
                    <th>ชื่อใหม่</th>
                    <th>ขนาด</th>                    
                    <th>พาท</th>      
                    <th>เครื่องมือ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listFile as $data): ?>
                    <tr>
                        <td  style="width: 5%"><?= $data['file_id'] ?></td>
                        <td  style="width: 15%;"><?= $data['file_detail'] ?></td>
                        <td  style="width: 15%;"><?= $data['file_name'] ?></td>
                        <td><?= $data['file_size'] ?></td>
                        <td><?= $data['file_path'] ?></td>
                        <td  style="width: 13%;">
                            <div class="btn-group">                                
                                <button type="button" class="btn btn-danger btn-xs btn-rect" onclick="return deleteItem(<?= $data['file_id'] ?>, 'index.php?r=File/DeleteFileItem')"><i class=" icon-trash"></i> ลบ</button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

