<div class="box">
    <header>
        <div class="icons"><i class="icon-th"></i></div>
        <h5>ยินดีตอนรับ สู่เว็บไซต์พัฒนาโปรแกรม Thaismilesoft.com</h5>
        <div class="toolbar">
            <ul class="nav pull-right">
                <li>
                    <a class="accordion-toggle minimize-box" data-toggle="collapse" href="#div-1">
                        <i class="icon-chevron-up"></i>
                    </a>
                </li>
            </ul>
        </div>
    </header>
    <div id="div-1" class="accordion-body collapse in body">
        <div class="col-lg-9">
            <ul class="pricing-table">
                <li class="col-lg-4">
                    <h3>บริการ ให้คำปรึกษา</h3>
                    <div class="price-body">
                        <div class="price">
                            ฟรี
                        </div>
                    </div>
                    <div class="features">
                        <ul>
                            <li>โครงงานนักศึกษา</li>
                            <li>คิดหัวข้อทำโครงงาน</li>
                            <li>ออกแบบโครงสร้างฐานข้อมูล</li>                            
                        </ul>
                    </div>
                    <div class="footer">
                        <a class="btn btn-info btn-rect" href="<?=  Yii::app()->createUrl('Site/WelcomeDetail', array('cmd' => 'free'))?>">เพิ่มเติม...</a>
                    </div>
                </li>
                <li class="active info col-lg-4">
                    <h3>รับพัฒนาโปรแกรม</h3>
                    <div class="price-body">
                        <div class="price">
                            <span class="price-figure">เริ่มต้น 10,000 บาท<small> ขึ้นไป</small></span>
                            <span class="price-term">/เว็บไซต์</span>
                        </div>
                    </div>
                    <div class="features">
                        <ul>
                            <li>Web Application</li>
                            <li>Windown Application</li>
                            <li></li>
                            <li>จดโดเมน</li>
                            <li>จัดหาพื้นที่โฮสติ้ง</li>
                            <li>สนับสนุน ดูแล</li>
                        </ul>
                    </div>
                    <div class="footer">
                        <a class="btn btn-info btn-rect" href="<?=  Yii::app()->createUrl('Site/WelcomeDetail', array('cmd' => 'best'))?>">เพิ่มเติม...</a>
                    </div>
                </li>
                <li class="success col-lg-4">
                    <h3>เว็บสำเร็จรูป</h3>
                    <div class="price-body">
                        <div class="price">
                            <span class="price-figure">เริ่มต้น 5,000 บาท<small> ขึ้นไป</small></span>
                            <span class="price-term">/เว็บไซต์</span>
                        </div>
                    </div>
                    <div class="features">
                        <ul>                                                        
                            <li>พัฒนาเว็บไซต์</li>
                            <li>CMS (Joomla,Wordpress)</li>
                            <li>จดโดเมน</li>
                            <li>จัดหาพื้นที่โฮสติ้ง</li>
                            <li>สนับสนุน ดูแล</li>
                        </ul>
                    </div>
                    <div class="footer">
                        <a class="btn btn-info btn-rect" href="<?=  Yii::app()->createUrl('Site/WelcomeDetail', array('cmd' => 'cms'))?>">เพิ่มเติม...</a>
                    </div>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="col-lg-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Social Network
                        </div>
                        <div class="panel-body">
                            <a href="https://www.facebook.com/thaismilesoft" target="_blank" class="btn btn-block btn-primary btn-facebook">
                                <i class="icon-facebook"></i> Sign in with Facebook
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            ตารางงาน
                        </div>
                        <div class="panel-body">
                            <a href="index.php?r=Site/CalendarSchedule" class="btn btn-block btn-primary btn-facebook">
                                <i class="icon-calendar"></i> ดูตารางงาน
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="chat-panel panel panel-primary">
                        <div class="panel-heading">
                            <i class="icon-comments"></i>
                            สมาชิกเว็บไซต์
                        </div>
                        <div class="panel-body">
                            <ul class="chat">
                                <?php foreach ($listMember as $data): ?>
                                    <li class="left clearfix">
                                        <span class="chat-img pull-left">
                                            <i class="icon-user icon-2x"></i>
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <b><?= $data['mem_fname'] . "  " . $data['mem_lname'] ?></b>
                                            </div>
                                            <p>
                                                เข้าระบบล่าสุด : <br/> <?= DateUtil::formatDateTime($data['mem_lastlogindate']) ?>
                                            </p>
                                        </div>
                                    </li>                                
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="body">
    <div class="row">
        <div class="col-md-4">
            <div class="well">
                <p><b>เกี่ยวกับเรา</b></p>
                <ul>
                    <li>โทรศัพท์ 087-8356866</li>
                    <li>อีเมลล์</li>
                    <li>
                        <ul>
                            <li>poon_mp@hotmail.com</li>
                            <li>poonsawatapin@gmail.com</li>                                
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <div class="well">
                <p><b>ที่อยู่</b></p>
                <address>
                    <strong>หอพักอ่างทองอพาทเม้นต์</strong>
                    <br>212 ม.13 ซ.วิเชียร
                    <br>ต.คูคต อ.ลำลูกกา
                    <br>จ.ปทุมธานี 12150                        
                </address>
            </div>
        </div>
        <div class="col-md-4">
            <div class="well">
<!--                    <p><b></b></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>-->
            </div>
        </div>
    </div>
</div>
</div>

