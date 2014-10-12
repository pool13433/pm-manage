<!-- HEADER SECTION -->
<div id="top">

    <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
        <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
            <i class="icon-align-justify"></i>
        </a>
        <!-- LOGO SECTION -->
        <header class="navbar-header">

            <a href="<?= Yii::app()->createUrl('Site/Index') ?>" class="navbar-brand">
                <img src="images/Header.jpg" alt="" />

            </a>
        </header>
        <!-- END LOGO SECTION -->
        <ul class="nav navbar-top-links navbar-right">
            <?php if (empty(Yii::app()->session['member'])): ?>
                <!-- MESSAGES SECTION -->
                <li class="dropdown">
                    <button class="dropdown-toggle btn btn-primary" data-toggle="modal" data-target="#formModal" type="button">                    
                        <i class="icon-signin"></i> เข้าสู่ระบบ
                    </button>
                </li>
                <li class="dropdown">
                    <button class="dropdown-toggle btn btn-warning" type="button" id="btn-forget">                    
                        <i class="icon-question-sign"></i> ลืมรหัสผ่าน
                    </button>
                </li>
                <li class="dropdown">
                    <button type="button" class="dropdown-toggle btn btn-info" onclick="goUrl('<?= Yii::app()->createUrl('Member/RegisterMember') ?>')">                    
                        <i class="icon-user"></i> ลงทะเบียนใหม่
                    </button>
                </li>                   
                <!--END MESSAGES SECTION -->
            <?php else: ?>
                <!--TASK SECTION -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="label label-danger">5</span>   <i class="icon-tasks"></i>&nbsp; <i class="icon-chevron-down"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong> Profile </strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong> Pending Tasks </strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong> Work Completed </strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong> Summary </strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="icon-angle-right"></i>
                            </a>
                        </li>
                    </ul>

                </li>
                <!--END TASK SECTION -->

                <!--ADMIN SETTINGS SECTIONS -->

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                    </a>

                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#formProfileModal">                    
                                <i class="icon-user"></i> แก้ไขข้อมูล ส่วนตัว
                            </a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#formPassWordModal">                    
                                <i class="icon-key"></i> เปล่ียน รหัสผ่าน
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#" id="btn-logout"><i class="icon-signout" ></i> Logout </a>
                        </li>
                    </ul>

                </li>

                <!--END ADMIN SETTINGS -->
            <?php endif; ?>
        </ul>

    </nav>

</div>
<!-- END HEADER SECTION -->
<script type="text/javascript">
    $('#btn-logout').on('click', function() {
        var condi = confirm('ยืนยันการออกจากระบบ');
        if (condi) {
            PostJson('', 'index.php?r=Member/Logout')
            return true;
        }
        return false;
    });
</script>