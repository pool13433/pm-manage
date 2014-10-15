<!-- MENU SECTION -->
<!--<div id="left" >-->
<!--    <div class="media user-media well-small">
        <a class="user-link" href="#">
            <img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/user.gif" />
        </a>
        <br />
        <div class="media-body">
            <h5 class="media-heading"> Joe Romlin</h5>
            <ul class="list-unstyled user-info">

                <li>
                    <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online

                </li>

            </ul>
        </div>
        <br />
    </div>-->
<?php $authen = Yii::app()->session['member']; ?>
<ul id="menu" class="collapse" style="padding-top: 10px;">
    <?php if ($authen->mem_status == 1): ?>
        <li class="panel active">
            <a href="<?= Yii::app()->createUrl('BackEnd/Home') ?>" >
                <i class="icon-table"></i> Dashboard
            </a>                   
        </li>
        <li class="panel ">
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav-project">
                <i class="icon-tasks"> </i> งานโปรเจค     
                <span class="pull-right">
                    <i class="icon-angle-left"></i>
                </span>
                &nbsp; <span class="label label-danger">1</span>&nbsp;
            </a>
            <ul class="collapse" id="component-nav-project">
                <li class=""><a href="<?= Yii::app()->createUrl('Project/ListProject') ?>"><i class="icon-angle-right"></i> ทั้งหมด </a></li>
                <li class=""><a href="<?= Yii::app()->createUrl('Project/ListProjectHistory') ?>"><i class="icon-angle-right"></i> กิจกรรม </a></li>                
            </ul>
        </li>        
        <li class="panel ">
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav-member">
                <i class="icon-tasks"> </i> ผู้ใช้งาน     
                <span class="pull-right">
                    <i class="icon-angle-left"></i>
                </span>
                &nbsp; <span class="label label-danger">1</span>&nbsp;
            </a>
            <ul class="collapse" id="component-nav-member">
                <li class=""><a href="<?= Yii::app()->createUrl('Member/ListMember') ?>"><i class="icon-angle-right"></i> ผู้ใช้งาน </a></li>                
            </ul>
        </li>
        <li class="panel ">
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav-news">
                <i class="icon-tasks"> </i> ข่าว     
                <span class="pull-right">
                    <i class="icon-angle-left"></i>
                </span>
                &nbsp; <span class="label label-danger">1</span>&nbsp;
            </a>
            <ul class="collapse" id="component-nav-news">
                <li class=""><a href="<?= Yii::app()->createUrl('News/ListNews') ?>"><i class="icon-angle-right"></i> ข่าว </a></li>                
            </ul>
        </li>        
    <?php elseif ($authen->mem_status == 2): ?>
        <li class="panel active">
            <a href="<?= Yii::app()->createUrl('FrontEnd/Home') ?>" >
                <i class="icon-table"></i> Dashboard-User
            </a>                   
        </li>
        <li class="panel ">
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-nav">
                <i class="icon-pencil"></i> การจ้างงาน
                <span class="pull-right">
                    <i class="icon-angle-left"></i>
                </span>
                &nbsp; <span class="label label-success">3</span>&nbsp;
            </a>
            <ul class="collapse" id="form-nav">
                <li class=""><a href="<?= Yii::app()->createUrl('Project/RegisterProject') ?>"><i class="icon-angle-right"></i> ลงทะเบียนจ้างงานใหม่ </a></li>
                <li class=""><a href="<?= Yii::app()->createUrl('Project/ListProject') ?>"><i class="icon-angle-right"></i> ดูรายการลงทะเบียนทั้งหมด </a></li>
                <li class=""><a href="<?= Yii::app()->createUrl('Problem/ListProblem') ?>"><i class="icon-angle-right"></i> แจ้งปัญหาการทำเดินการ </a></li>                
            </ul>
        </li>
    <?php endif; ?>
    <li class="panel ">
        <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav-event">
            <i class="icon-tasks"> </i> เหตุการณ์     
            <span class="pull-right">
                <i class="icon-angle-left"></i>
            </span>
            &nbsp; <span class="label label-danger">1</span>&nbsp;
        </a>
        <ul class="collapse" id="component-nav-event">
            <li class=""><a href="<?= Yii::app()->createUrl('Event/ListEvent') ?>"><i class="icon-angle-right"></i> ทั้งหมด </a></li>                
        </ul>
    </li>
    <li class="panel ">
        <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav-money">
            <i class="icon-tasks"> </i> รายรับ-รายจ่าย     
            <span class="pull-right">
                <i class="icon-angle-left"></i>
            </span>
            &nbsp; <span class="label label-danger">1</span>&nbsp;
        </a>
        <ul class="collapse" id="component-nav-money">
            <li class=""><a href="<?= Yii::app()->createUrl('Money/ListMoney') ?>"><i class="icon-angle-right"></i> จัดการ รายรับรายจ่าย </a></li>                
        </ul>
    </li>
</ul>

<!--</div>-->
<!--END MENU SECTION -->