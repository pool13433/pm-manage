<div class="box primary">
    <header>
        <a href="<?= Yii::app()->createUrl('Site/Index') ?>" class="icons btn btn-info btn-rect">
            <i class="icon-arrow-left"></i> กลับ
        </a>
        <h5>รายละเอียด</h5>
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
    <div id="div-1" class="body  collapse in">
        <?php if ($cmd == "free"): ?>
            <h4>ให้คำปรึกษา</h4>
            <ul>
                <li>การทำโครงงานของนักศึกษา</li>                
                <li>ผู้ที่สนใจพัฒนาโปรแกรมของตัวเอง</li>
                <li>
                    <ul>
                        <li>พัฒนา เว็บแอพพลิเคชั่น (HTML+PHP+Javascript+MySQL)</li>
                        <li>พัฒนา วินโดน์แอพพลิเคชั่น (Java Swing,AWT)</li>
                        <li>พัฒนา โมบายแอพพลิเคชั่น (Android)</li>
                    </ul>
                </li>
            </ul>
        <?php elseif ($cmd == "cms"): ?>
            <h4>จ้างงาน เขียนเว็บไซต์ สำเร็จรูป</h4>
            <ul>
                <li>Web CMS (Joomla,Wordpress)</li>                
                <li>
                    <ul>
                        <li>ติดตั้งเว็บ</li>
                        <li>ตกแต่งเว็บ</li>
                        <li>สอนการใช้งานเบื้องต้น</li>
                    </ul>
                </li>
            </ul>
        <?php elseif ($cmd == "best"): ?>
            <h4>พัฒนาโปรแกรม</h4>
            <ul>
                <li></li>                
                <li>
                    <ul>
                        <li>พัฒนา เว็บแอพพลิเคชั่น (HTML+PHP+Javascript+MySQL)</li>
                        <li>พัฒนา วินโดน์แอพพลิเคชั่น (Java Swing,AWT)</li>
                        <li>พัฒนา โมบายแอพพลิเคชั่น (Android)</li>
                    </ul>
                </li>
            </ul>
        <?php endif; ?>
    </div>
</div>
