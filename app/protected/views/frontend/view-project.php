<div class="box primary">
    <header>
        <a href="<?= Yii::app()->createUrl('Project/ListProject') ?>" class="icons btn btn-info btn-rect">
            <i class="icon-arrow-left"></i> กลับ
        </a>
        <h5>รายละเอียด</h5>
        <div class="toolbar">
            <button data-target="#div1" data-toggle="collapse" class="btn btn-default btn-sm">
                <i class="icon-arrow-down"></i>
            </button>
        </div>
    </header>
    <div id="div1" class="body collapse in form-horizontal">
        <div class="form-group">
            <div style="text-align: center;">

                <a href="#" class="quick-btn">
                    <i class="icon-money  icon-3x"></i>
                    <span> ราคา</span>
                    <span class="label label-info"><?= $project['pro_prices'] ?></span>
                </a>
                <a href="#" class="quick-btn">
                    <i class="icon-money  icon-3x"></i>
                    <span> ชำระแล้ว</span>
                    <span class="label label-success"><?= ($project['pro_pay1'] + $project['pro_pay2'] + $project['pro_pay3']) ?></span>
                </a>

                <a href="#" class="quick-btn">
                    <i class="icon-money  icon-3x"></i>
                    <span> คงเหลือ</span>
                    <span class="label label-danger"><?= ($project['pro_prices'] - ($project['pro_pay1'] + $project['pro_pay2'] + $project['pro_pay3'])) ?></span>
                </a>
                <a href="#" class="quick-btn">
                    <i class="icon-strikethrough  icon-3x"></i>
                    <span> แบ่งจ่าย</span>
                    <span class="label label-danger"><?= $project['pro_paytype'] ?> งวด</span>
                </a>

            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <div class="well well-small">
                    <span><h4>สถานะการดำเนินการ</h4></span><span class="pull-right"><small><?= $project['pro_process'] ?>%</small></span>
                    <div class="progress-striped active progress lg">
                        <div style="width: <?= $project['pro_process'] ?>%" class="progress-bar progress-bar-info"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <div class="alert alert-default">
                    ข้อมูลผู้ว่าจ้าง : <span class="label label-warning">
                        <?= $project['member']['mem_fname'] ?>
                    </span><?= Util::spacebar(3) ?>
                    <span class="label label-warning">
                        <?= $project['member']['mem_lname'] ?>
                    </span><?= Util::spacebar(2) ?>    
                    อีเมลล์ : <span class="label label-warning"><?= $project['member']['mem_email'] ?></span>
                    โทรศัพท์ : <span class="label label-warning"><?= $project['member']['mem_tel'] ?></span>
                    ที่อยู่ : <span class="label label-warning"><?= $project['member']['mem_address'] ?></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3">
                <div class="alert alert-info">
                    รหัสงานจ้าง : <span class="label label-warning"><?= $project['pro_id'] ?></span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="alert alert-warning">
                    วันที่ว่าจ้าง : <span class="label label-warning"><?= DateUtil::formatDate($project['pro_createdate']) ?></span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="alert alert-danger">
                    วันที่เริ่ม : <span class="label label-warning"><?= DateUtil::formatDate($project['pro_startdate']) ?></span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="alert alert-danger">
                    วันสิ้นสุด : <span class="label label-warning"><?= DateUtil::formatDate($project['pro_enddate']) ?></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6">
                <div class="alert alert-success">
                    ชื่องานไทย : <span class="label label-warning"><?= $project['pro_nameth'] ?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="alert alert-success">
                    ชื่องานอังกฤษ : <span class="label label-warning"><?= $project['pro_nameeng'] ?></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <div class="alert alert-success">
                    <div class="row">
                        <label class="col-md-2">รายละเอียด :</label>
                        <div class="col-md-10">
                            <textarea class="form-control" readonly><?= $project['pro_descrition'] ?></textarea>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <div class="alert alert-success">
                    ภาษาพัฒนาโปรแกรม : <?php
                    $str = "";
                    for ($i = 0; $i < count($project_lang); $i++):
                        $data = $project_lang[$i];
                        //var_dump($data['programming_language']['prolan_name']);
                        if (!$str) {
                            $str = '<span class="label label-warning">' . $data['programming_language']['prolan_name'] . '</span>';
                        } else {
                            $str .= ',<span class="label label-warning">' . $data['programming_language']['prolan_name'] . '</span>';
                        }
                        if ($i != 0 && $i == 9) {
                            $str .= "<br/>";
                        }
                    endfor;
                    echo $str;
                    ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6">
                <div class="alert alert-success">
                    เครื่องมือฐานข้อมูล : <span class="label label-warning"><?= $project['tools_database']['tooldata_name'] ?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="alert alert-success">
                    เครื่องมือพัฒนา : <span class="label label-warning"><?= $project['tools_developer']['tooldev_name'] ?></span>
                </div>
            </div>
        </div>
        <?php if ($project['prouml_use'] == 1): ?>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            เอกสารที่เกี่ยวข้อง
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อเอกสาร</th>
                                        <th>สถานะการพัฒนา</th>
                                        <?php if (Yii::app()->session['member']['mem_status'] == 1): ?>
                                            <th>สถานะการพัฒนา</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < count($project_uml); $i++): ?>
                                        <?php $data = $project_uml[$i]; ?>
                                        <tr>
                                            <td><?= ($i + 1) ?></td>
                                            <td><?= $data['uml']['uml_name'] ?></td>
                                            <td>
                                                <?php
                                                if ($data['prouml_status'] == 0):
                                                    echo '<span class="label label-warning"><i class="icon-info-sign"></i> รอดำเนินการ</span>';
                                                elseif ($data['prouml_status'] == 1):
                                                    echo '<span class="label label-info"><i class="icon-plus-sign"></i> กำลังดำเนินการ</span>';
                                                else:
                                                    echo '<span class="label label-success"><i class="icon-ok-sign"></i> เสร็จแล้ว</span>';
                                                endif;
                                                ?>
                                            </td>
                                            <?php if (Yii::app()->session['member']['mem_status'] == 1): ?>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-warning btn-xs" onclick="return changeStatusUtil(<?= $data['prouml_id'] ?>, '0', 'index.php?r=Project/ChangeUmlStatus')"><i class="icon-info-sign"></i> รอ</button>
                                                        <button type="button" class="btn btn-info btn-xs" onclick="return changeStatusUtil(<?= $data['prouml_id'] ?>, '1', 'index.php?r=Project/ChangeUmlStatus')"><i class=" icon-wrench"></i> กำลังดำเนิน</button>
                                                        <button type="button" class="btn btn-success btn-xs" onclick="return changeStatusUtil(<?= $data['prouml_id'] ?>, '2', 'index.php?r=Project/ChangeUmlStatus')"><i class="icon-check "></i> เสร็จแล้ว</button>
                                                    </div>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endfor; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>                
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
