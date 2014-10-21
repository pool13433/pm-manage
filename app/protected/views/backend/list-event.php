
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
        <!-- tab panel -->
        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#wait">
                    <i class="icon-time  icon-2x"></i> รอทำ
                </a>
            </li>
            <li class=""><a data-toggle="tab" href="#process">
                    <i class="icon-cogs icon-2x"></i>กำลังทำ</a>
            </li>
            <li class=""><a data-toggle="tab" href="#finsih">
                    <i class=" icon-ok-circle   icon-2x"></i>ทำเสร็จแล้ว</a>
            </li>
        </ul>

        <div class="tab-content">
            <div id="wait" class="tab-pane fade active in">
                <h4>Home Tab</h4>
                <table class="table table-bordered dataTable">
                    <thead>
                        <tr>
                            <th>รายละเอียด</th>
                            <th>เครื่องมือ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < count($listeventWait); $i++): ?>
                            <?php $data = $listeventWait[$i]; ?>
                            <tr>
                                <td>
                                    <div class="col-md-2">
                                        <a href="#" class="quick-btn">
                                            <i class="icon-time icon-3x"></i>
                                            <span> เวลาเหลืออีก</span>
                                            <?php
                                            if ($data['event_status'] == 2):
                                                echo '<span class="label label-success">finish</span>';
                                            else:
                                                $datetotal = DateUtil::calculateDate(date('Y-m-d'), $data['event_finishdate']); //$data['event_enddate'] - $data['event_startdate'];
                                                //echo 'datetotal : ' . $datetotal;
                                                if ($datetotal < 0):
                                                    echo '<span class="label label-danger">' . $datetotal . '</span>';
                                                elseif ($datetotal == 0):
                                                    echo '<span class="label label-success">' . $datetotal . '</span>';
                                                elseif ($datetotal > 0):
                                                    echo '<span class="label label-info">' . $datetotal . '</span>';
                                                endif;
                                            endif;
                                            ?>
                                        </a>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row" style="padding-bottom: 15px;padding-top: 10px;">
                                            <div class="col-md-5">
                                                <span class="label label-default">ชื่อ :  <?= $data['event_name'] ?></span>
                                            </div>
                                            <div class="col-md-4">
                                                <span class="label label-info">ชื่อ ผู้รับผิดชอบ :  <?= $data['member']['mem_fname'] ?></span>
                                            </div>
                                            <div class="col-md-3">
                                                <?php
                                                if ($data['event_priority'] == 0):
                                                    echo '<span class="label label-info">ธรรมดา</span>';
                                                elseif ($data['event_priority'] == 1):
                                                    echo '<span class="label label-warning">ด่วน</span>';
                                                elseif ($data['event_priority'] == 2):
                                                    echo '<span class="label label-danger">ด่วนมากที่สุด</span>';
                                                endif;
                                                ?>                                        
                                            </div>
                                        </div>
                                        <div class="row" style="padding-bottom: 15px;">
                                            <div class="col-md-8">
                                                <span class="label label-default">รายละเอียด :  <?= $data['event_detail'] ?></span>
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
                                                <span class="label label-success">วันเสร็จสิ้น :  <?= $data['event_finishdate'] ?></span>
                                            </div>
                                            <div class="col-md-4"> 
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
                                            <div class="col-md-4">
                                                <?php
                                                $datecount = DateUtil::calculateDate($data['event_startdate'], $data['event_enddate']);
                                                if ($datecount >= 0):
                                                    echo '<span class="label label-success">จำนวนวัน : ' . $datecount . '</span>';
                                                else:
                                                    echo '<span class="label label-danger">จำนวนวัน : ' . $datecount . '</span>';
                                                endif;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td style="width: 23%">
                                    <div class="btn-group">
                                        <button class="btn btn-primary btn-sm btn-rect dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-cog"></i> ปรับสถานะ<span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" onclick="return changeStatusUtil(<?= $data['event_id'] ?>, '0', 'index.php?r=Event/ChangeEventStatus')">รอ</a></li>
                                            <li><a href="#" onclick="return changeStatusUtil(<?= $data['event_id'] ?>, '1', 'index.php?r=Event/ChangeEventStatus')">ดำนินการ</a></li>
                                            <li><a href="#" onclick="return changeStatusUtil(<?= $data['event_id'] ?>, '2', 'index.php?r=Event/ChangeEventStatus')">เสร็จสิ้น</a></li>
                                            <li class="divider"></li>
                                        </ul>
                                        <a href="<?= Yii::app()->createUrl('Event/NewEvent', array('id' => $data['event_id'])) ?>" class="btn btn-info btn-sm btn-rect" >
                                            <i class="icon-pencil"></i> แก้ไข</a>
                                        <button type="button" class="btn btn-danger btn-sm btn-rect" onclick="deleteItem(<?= $data['event_id'] ?>, 'index.php?r=Event/DeleteEvent')">
                                            <i class="icon-trash"></i> ลบ</button>
                                    </div>
                                </td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>
            <div id="process" class="tab-pane fade">
                <h4>Profile Tab</h4>
                <table class="table table-bordered dataTable">
                    <thead>
                        <tr>
                            <th>รายละเอียด</th>
                            <th>เครื่องมือ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < count($listeventProcess); $i++): ?>
                            <?php $data = $listeventProcess[$i]; ?>
                            <tr>
                                <td>
                                    <div class="col-md-2">
                                        <a href="#" class="quick-btn">
                                            <i class="icon-time icon-3x"></i>
                                            <span> ระยะเวลา</span>
                                            <?php
                                            if ($data['event_status'] == 2):
                                                echo '<span class="label label-success">finish</span>';
                                            else:
                                                $datetotal = DateUtil::calculateDate(date('Y-m-d'), $data['event_finishdate']); //$data['event_enddate'] - $data['event_startdate'];
                                                //echo 'datetotal : ' . $datetotal;
                                                if ($datetotal < 0):
                                                    echo '<span class="label label-danger">' . $datetotal . '</span>';
                                                elseif ($datetotal == 0):
                                                    echo '<span class="label label-success">' . $datetotal . '</span>';
                                                elseif ($datetotal > 0):
                                                    echo '<span class="label label-info">' . $datetotal . '</span>';
                                                endif;
                                            endif;
                                            ?>
                                        </a>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row" style="padding-bottom: 15px;padding-top: 10px;">
                                            <div class="col-md-5">
                                                <span class="label label-default">ชื่อ :  <?= $data['event_name'] ?></span>
                                            </div>
                                            <div class="col-md-4">
                                                <span class="label label-info">ชื่อ ผู้รับผิดชอบ :  <?= $data['member']['mem_fname'] ?></span>
                                            </div>
                                            <div class="col-md-3">
                                                <?php
                                                if ($data['event_priority'] == 0):
                                                    echo '<span class="label label-info">ธรรมดา</span>';
                                                elseif ($data['event_priority'] == 1):
                                                    echo '<span class="label label-warning">ด่วน</span>';
                                                elseif ($data['event_priority'] == 2):
                                                    echo '<span class="label label-danger">ด่วนมากที่สุด</span>';
                                                endif;
                                                ?>                                        
                                            </div>
                                        </div>
                                        <div class="row" style="padding-bottom: 15px;">
                                            <div class="col-md-8">
                                                <span class="label label-default">รายละเอียด :  <?= $data['event_detail'] ?></span>
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
                                                <span class="label label-success">วันเสร็จสิ้น :  <?= $data['event_finishdate'] ?></span>
                                            </div>
                                            <div class="col-md-4"> 
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
                                            <div class="col-md-4">
                                                <?php
                                                $datecount = DateUtil::calculateDate($data['event_startdate'], $data['event_enddate']);
                                                if ($datecount >= 0):
                                                    echo '<span class="label label-success">จำนวนวัน : ' . $datecount . '</span>';
                                                else:
                                                    echo '<span class="label label-danger">จำนวนวัน : ' . $datecount . '</span>';
                                                endif;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td style="width: 23%">
                                    <div class="btn-group">
                                        <button class="btn btn-primary btn-sm btn-rect dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-cog"></i> ปรับสถานะ<span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" onclick="return changeStatusUtil(<?= $data['event_id'] ?>, '0', 'index.php?r=Event/ChangeEventStatus')">รอ</a></li>
                                            <li><a href="#" onclick="return changeStatusUtil(<?= $data['event_id'] ?>, '1', 'index.php?r=Event/ChangeEventStatus')">ดำนินการ</a></li>
                                            <li><a href="#" onclick="return changeStatusUtil(<?= $data['event_id'] ?>, '2', 'index.php?r=Event/ChangeEventStatus')">เสร็จสิ้น</a></li>
                                            <li class="divider"></li>
                                        </ul>
                                        <a href="<?= Yii::app()->createUrl('Event/NewEvent', array('id' => $data['event_id'])) ?>" class="btn btn-info btn-sm btn-rect" >
                                            <i class="icon-pencil"></i> แก้ไข</a>
                                        <button type="button" class="btn btn-danger btn-sm btn-rect" onclick="deleteItem(<?= $data['event_id'] ?>, 'index.php?r=Event/DeleteEvent')">
                                            <i class="icon-trash"></i> ลบ</button>
                                    </div>
                                </td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>  
            <div id="finsih" class="tab-pane fade">
                <h4>Profile Tab</h4>
                <table class="table table-bordered dataTable">
                    <thead>
                        <tr>
                            <th>รายละเอียด</th>
                            <th>เครื่องมือ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < count($listeventFinish); $i++): ?>
                            <?php $data = $listeventFinish[$i]; ?>
                            <tr>
                                <td>
                                    <div class="col-md-2">
                                        <a href="#" class="quick-btn">
                                            <i class="icon-time icon-3x"></i>
                                            <span> ระยะเวลา</span>
                                            <?php
                                            if ($data['event_status'] == 2):
                                                echo '<span class="label label-success">finish</span>';
                                            else:
                                                $datetotal = DateUtil::calculateDate(date('Y-m-d'), $data['event_finishdate']); //$data['event_enddate'] - $data['event_startdate'];
                                                //echo 'datetotal : ' . $datetotal;
                                                if ($datetotal < 0):
                                                    echo '<span class="label label-danger">' . $datetotal . '</span>';
                                                elseif ($datetotal == 0):
                                                    echo '<span class="label label-success">' . $datetotal . '</span>';
                                                elseif ($datetotal > 0):
                                                    echo '<span class="label label-info">' . $datetotal . '</span>';
                                                endif;
                                            endif;
                                            ?>
                                        </a>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row" style="padding-bottom: 15px;padding-top: 10px;">
                                            <div class="col-md-5">
                                                <span class="label label-default">ชื่อ :  <?= $data['event_name'] ?></span>
                                            </div>
                                            <div class="col-md-4">
                                                <span class="label label-info">ชื่อ ผู้รับผิดชอบ :  <?= $data['member']['mem_fname'] ?></span>
                                            </div>
                                            <div class="col-md-3">
                                                <?php
                                                if ($data['event_priority'] == 0):
                                                    echo '<span class="label label-info">ธรรมดา</span>';
                                                elseif ($data['event_priority'] == 1):
                                                    echo '<span class="label label-warning">ด่วน</span>';
                                                elseif ($data['event_priority'] == 2):
                                                    echo '<span class="label label-danger">ด่วนมากที่สุด</span>';
                                                endif;
                                                ?>                                        
                                            </div>
                                        </div>
                                        <div class="row" style="padding-bottom: 15px;">
                                            <div class="col-md-8">
                                                <span class="label label-default">รายละเอียด :  <?= $data['event_detail'] ?></span>
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
                                                <span class="label label-success">วันเสร็จสิ้น :  <?= $data['event_finishdate'] ?></span>
                                            </div>
                                            <div class="col-md-4"> 
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
                                            <div class="col-md-4">
                                                <?php
                                                $datecount = DateUtil::calculateDate($data['event_startdate'], $data['event_enddate']);
                                                if ($datecount >= 0):
                                                    echo '<span class="label label-success">จำนวนวัน : ' . $datecount . '</span>';
                                                else:
                                                    echo '<span class="label label-danger">จำนวนวัน : ' . $datecount . '</span>';
                                                endif;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td style="width: 23%">
                                    <div class="btn-group">
                                        <button class="btn btn-primary btn-sm btn-rect dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-cog"></i> ปรับสถานะ<span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" onclick="return changeStatusUtil(<?= $data['event_id'] ?>, '0', 'index.php?r=Event/ChangeEventStatus')">รอ</a></li>
                                            <li><a href="#" onclick="return changeStatusUtil(<?= $data['event_id'] ?>, '1', 'index.php?r=Event/ChangeEventStatus')">ดำนินการ</a></li>
                                            <li><a href="#" onclick="return changeStatusUtil(<?= $data['event_id'] ?>, '2', 'index.php?r=Event/ChangeEventStatus')">เสร็จสิ้น</a></li>
                                            <li class="divider"></li>
                                        </ul>
                                        <a href="<?= Yii::app()->createUrl('Event/NewEvent', array('id' => $data['event_id'])) ?>" class="btn btn-info btn-sm btn-rect" >
                                            <i class="icon-pencil"></i> แก้ไข</a>
                                        <button type="button" class="btn btn-danger btn-sm btn-rect" onclick="deleteItem(<?= $data['event_id'] ?>, 'index.php?r=Event/DeleteEvent')">
                                            <i class="icon-trash"></i> ลบ</button>
                                    </div>
                                </td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>            
        </div>
        <!-- tab panel -->
    </div>
</div>
