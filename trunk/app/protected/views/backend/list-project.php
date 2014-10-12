<div class="box">
    <header>
        <div class="icons"><i class="icon-th"></i></div>
        <h5>ยินดีตอนรับ สู่โปรแกรมจัดการโปรเจค</h5>
        <div class="toolbar">
            <ul class="nav pull-right">
                <li><a href="<?= Yii::app()->createUrl('Project/New') ?>">สร้างใหม่</a></li>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon-th-large"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Demo Link</a></li>
                        <li><a href="#">Demo Link</a></li>
                        <li><a href="#">Demo Link</a></li>
                    </ul>
                </li>
                <li>
                    <a class="accordion-toggle minimize-box" data-toggle="collapse" href="#div-5">
                        <i class="icon-chevron-up"></i>
                    </a>
                </li>
            </ul>
        </div>
    </header>
    <div class="body">
        <table class="table table-bordered dataTable">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อผู้จ้าง</th>
                    <th>ชื่อโปรเจค</th>
                    <th>ราคา</th>
                    <th>วันเริ่มสัญญา</th>
                    <th>วันเริ่มงาน</th>
                    <th>วันสิ้นสุดงาน</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listProject as $data): ?>
                    <tr>
                        <td><?= $data['pro_id'] ?></td>                        
                        <td><?= $data['pro_nameeng'] ?></td>
                        <td><?= $data['pro_nameth'] ?></td>
                        <td><?= $data['pro_prices'] ?></td>
                        <td><?= DateUtil::formatDate($data['pro_createdate']) ?></td>
                        <td><?= DateUtil::formatDate($data['pro_startdate']) ?></td>
                        <td><?= DateUtil::formatDate($data['pro_enddate']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>