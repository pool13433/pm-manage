<div class="box primary">
    <header>
        <h5>DashBoard-User</h5>
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
        <div class="row">
            <div class="col-lg-9">
                <div class="chat-panel panel panel-primary">
                    <div class="panel-heading">
                        <i class="icon-comments"></i>
                        ข่าวด่วน                        
                    </div>
                    <div class="panel-body">
                        <ul class="chat">
                            <?php foreach ($listNews as $data): ?>
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <i class=" icon-warning-sign icon-4x"></i>
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font"><?= $data['news_title'] ?> </strong>
                                            <small class="pull-right text-muted">
                                                แจ้งเมื่อ <i class="icon-time"></i> <?= $data['news_createdate'] ?>
                                            </small>
                                        </div>
                                        <br>
                                        <p>
                                            <?= $data['news_detail'] ?>
                                        </p>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-lg-3">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <i class="icon-bell"></i> Social Network
                    </div>

                    <div class="panel-body">
                        <a href="https://www.facebook.com/thaismilesoft" target="_blank" class="btn btn-block btn-primary btn-facebook">
                            <i class="icon-facebook"></i> Sign in with Facebook
                        </a>
                    </div>

                </div>
            </div>            
        </div>
    </div>
</div>

