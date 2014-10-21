<div class="box primary">
    <header>
        <div class="icons"><i class="icon-building"></i></div>
        <h5> UML ทั้งหมด</h5>
        <div class="toolbar">
            <ul class="nav pull-right">
                <li><a href="<?= Yii::app()->createUrl('Checkbox/NewUml') ?>" class="btn btn-warning btn-sm">
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
                    <th>กลุ่ม</th>
                    <th>เครื่องมือ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listUml as $data): ?>
                    <tr>
                        <td  style="width: 5%"><?= $data['uml_id'] ?></td>
                        <td  style="width: 15%;"><?= $data['uml_name'] ?></td>
                        <td><?= $data['uml_desc'] ?></td>
                        <td  style="width: 18%;"><?= ArrayUtil::umlGroup($data['uml_group']) ?></td>
                        <td  style="width: 13%;">
                            <div class="btn-group">
                                <a href="<?= Yii::app()->createUrl('Checkbox/NewUml', array('id' => $data['uml_id'])) ?>" class="btn btn-info btn-rect btn-xs" ><i class="icon-pencil"></i> แก้ไข</a>                                
                                <button type="button" class="btn btn-danger btn-xs btn-rect" onclick="return deleteItem(<?= $data['uml_id'] ?>, 'index.php?r=Checkbox/DeleteUml')"><i class=" icon-trash"></i> ลบ</button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>




