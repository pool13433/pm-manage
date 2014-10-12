
<div class="box primary">
    <header>
        <div class="icons"><i class="icon-th"></i></div>
        <h5>เหตุการณ์ทั้งหมด</h5>
        <div class="toolbar">
            <ul class="nav pull-right">
                <li><a href="<?= Yii::app()->createUrl('Event/NewEvent') ?>" class="btn btn-warning btn-sm">
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
                    <th>รายละเอียด</th>
                    <th style="width: 20%">เครื่องมือ</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($listevent); $i++): ?>
                    <?php $data = $listevent[$i]; ?>
                    <tr>
                        <td>
                            <div class="col-md-2">
                                <a href="#" class="quick-btn">
                                    <i class="icon-time icon-3x"></i>
                                    <span> ระยะเวลา</span>
                                    <?php
                                    $datetotal = DateUtil::calculateDate($data['event_finishdate'], $data['event_enddate']); //$data['event_enddate'] - $data['event_startdate'];
                                    //echo 'datetotal : ' . $datetotal;
                                    if ($datetotal < 0):
                                        echo '<span class="label label-danger">' . $datetotal . '</span>';
                                    elseif ($datetotal == 0):
                                        echo '<span class="label label-success">' . $datetotal . '</span>';
                                    elseif ($datetotal > 0):
                                        echo '<span class="label label-info">' . $datetotal . '</span>';
                                    endif;
                                    ?>
                                </a>
                            </div>
                            <div class="col-md-10">
                                <div class="row" style="padding-bottom: 15px;padding-top: 10px;">
                                    <div class="col-md-4">
                                        <span class="label label-info">ชื่อ :  <?= $data['event_name'] ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="label label-info">ชื่อ ผู้รับผิดชอบ :  <?= $data['member']['mem_fname'] ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="label label-danger">วันที่ต้องทำ :  <?=$data['event_startday']?>
                                        </span>
                                    </div>
                                </div>
                                <div class="row" style="padding-bottom: 15px;">
                                    <div class="col-md-8">
                                        <span class="label label-info">รายละเอียด :  <?= $data['event_detail'] ?></span>
                                    </div>
                                </div>
                                <div class="row" style="padding-bottom: 15px;">
                                    <div class="col-md-4">
                                        <span class="label label-info">วันติดต่อ :  <?= $data['event_createdate'] ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="label label-info">วันเริ่ม :  <?= $data['event_startdate'] ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="label label-info">วันสิ้นสุด :  <?= $data['event_enddate'] ?></span>
                                    </div>
                                </div>
                                <div class="row" style="padding-bottom: 20px;">
                                    <div class="col-md-4">
                                        <span class="label label-info">วันเสร็จสิ้น :  <?= $data['event_finishdate'] ?></span>
                                    </div>
                                    <div class="col-md-6"> 
                                        <?php
                                        if ($data['event_status'] == 0):
                                            echo '<span class="label label-warning">สถานะ : รอ</span>';
                                        elseif ($data['event_status'] == 1):
                                            echo '<span class="label label-info">สถานะ :  กำลังทำ</span>';
                                        else:
                                            echo '<span class="label label-success">สถานะ : เสร็จสิ้น</span>';
                                        endif;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-primary btn-sm btn-rect dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-cog"></i> ปรับสถานะ<span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="#" onclick="return changeStatusUtil(<?= $data['event_id'] ?>, '0','index.php?r=Event/ChangeEventStatus')">รอ</a></li>
                                    <li><a href="#" onclick="return changeStatusUtil(<?= $data['event_id'] ?>, '1','index.php?r=Event/ChangeEventStatus')">ดำนินการ</a></li>
                                    <li><a href="#" onclick="return changeStatusUtil(<?= $data['event_id'] ?>, '2','index.php?r=Event/ChangeEventStatus')">เสร็จสิ้น</a></li>
                                    <li class="divider"></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>

    </div>
</div>
<!-- 
<table class="table table-bordered dataTable">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อ</th>
                    <th>ละเอียด</th>
                    <th>วันติดต่อ</th>
                    <th>วันเริ่ม</th>
                    <th>วันสิ้นสุด</th>
                    <th>สถานะ</th>
                    <th>เครื่องมือ</th>
                </tr>
            </thead>
            <tbody>
<?php for ($i = 0; $i < count($listevent); $i++): ?>
    <?php $data = $listevent[$i]; ?>
                                                                                                                            <tr>
                                                                                                                                <td><?= ($i + 1) ?></td>
                                                                                                                                <td><?= $data['event_name'] ?></td>
                                                                                                                                <td><?= $data['event_detail'] ?></td>
                                                                                                                                <td><?= $data['event_createdate'] ?></td>
                                                                                                                                <td><?= $data['event_startdate'] ?></td>
                                                                                                                                <td><?= $data['event_enddate'] ?></td>
                                                                                                                                <td>
    <?php
    if ($data['event_status'] == 0):
        echo '<span class="label label-warning">รอ</span>';
    elseif ($data['event_status'] == 1):
        echo '<span class="label label-info">Info</span>';
    else:
        echo '<span class="label label-success">Success</span>';
    endif;
    ?>
                                                                                                                                </td>
                                                                                                                                <td>
                                                                                                                                    <div class="btn-group">                                                                
                                                                                                                                        <button type="button" class="btn btn-danger btn-xs"><i class="icon-trash "></i> ลบ</button>
                                                                                                                                        <button class="btn btn-warning btn-xl dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                                                                                                                        <ul class="dropdown-menu">
                                                                                                                                            <li><a href="#">Action</a></li>
                                                                                                                                            <li><a href="#">Another action</a></li>
                                                                                                                                            <li><a href="#">Something else here</a></li>
                                                                                                                                        </ul>
                                                                                                                                    </div>
                                                                                                                                </td>
                                                                                                                            </tr>
<?php endfor; ?>
            </tbody>
        </table>
-->
