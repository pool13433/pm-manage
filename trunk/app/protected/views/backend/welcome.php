<div style="text-align: center;">
    <a href="<?= Yii::app()->createUrl('Member/ListMember', array('status' => 0)) ?>" class="quick-btn">
        <i class="icon-user-md icon-2x"></i>
        <span>สมาชิกใหม่</span>
        <span class="label label-success"><?= count($members) ?></span>
    </a>
    <a href="<?= Yii::app()->createUrl('Event/ListEvent', array('status' => 0)) ?>" class="quick-btn">
        <i class="icon-signal icon-2x"></i>
        <span>เหตุการณ์</span>
        <span class="label label-warning"><?= count($events) ?></span>
    </a>    
    <a href="<?= Yii::app()->createUrl('Project/ListProject', array('status' => 0)) ?>" class="quick-btn">
        <i class="icon-rss-sign icon-2x"></i>
        <span>โปรเจค ใหม่</span>
        <span class="label label-danger"><?= count($projects) ?></span>
    </a>   
</div>