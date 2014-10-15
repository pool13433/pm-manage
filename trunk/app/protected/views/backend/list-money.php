<div style="padding-top: 15px;">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <i class="icon-comments"></i>
            รายรับ-รายจ่ายทั้งหมด
            <div class="btn-group pull-right">
                <button data-toggle="dropdown" type="button">
                    <i class="icon-chevron-down"></i>
                </button>
                <ul class="dropdown-menu slidedown">
                    <li>
                        <a href="#" onclick="reloadDelay(1)">
                            <i class="icon-refresh"></i> Refresh
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class=" icon-comment"></i> Available
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-time"></i> Busy
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-tint"></i> Away
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <i class="icon-signout"></i> Sign Out
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="panel-body form-horizontal">
            <div class="form-group">
                <div class="col-md-12">
                    <div class="alert alert-info">
                        <h2>รายรับรายจ่ายของเดือน : <?= $currentDate ?></h2>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <div class="alert alert-info">
                        <h4>ยอดรายรับ : <?= $currentDate ?></h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="alert alert-danger">
                        <h4>ยอดรายจ่าย : <?= $currentDate ?></h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="alert alert-success">
                        <h4>คงเหลือ : <?= $currentDate ?></h4>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-6">
                    <div class="chat-panel panel panel-primary">
                        <div class="panel-heading">
                            <i class="icon-comments"></i>
                            รายรับเข้า
                            <div class="btn-group pull-right">
                                <button data-toggle="dropdown" type="button">
                                    <i class="icon-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu slidedown">
                                    <li>
                                        <a href="#" onclick="reloadDelay(1)">
                                            <i class="icon-refresh"></i> Refresh
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class=" icon-comment"></i> Available
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-time"></i> Busy
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-tint"></i> Away
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-signout"></i> Sign Out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <ul class="chat">
                                <?php foreach ($listMoneyIn as $data): ?>
                                    <li class="left clearfix">                                        
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font"> (<?= $data['money_createdate'] ?>)</strong>
                                                <small class="pull-right text-muted">
                                                    <i class="icon-money"></i> <?= $data['money_price'] ?>
                                                </small>
                                                <br/>
                                                <p><?= $data['money_detail'] ?></p>
                                            </div>
                                        </div>
                                        <span class="chat-img pull-right">
                                            <button type="button" class="btn btn-primary btn-rect"  onclick="editMoney(<?= $data['money_id'] ?>)">
                                                <i class="icon-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-rect"  onclick="deleteItem(<?= $data['money_id'] ?>, 'index.php?r=Money/DeleteMoney')">
                                                <i class="icon-trash"></i>
                                            </button>
                                        </span>
                                    </li>
                                <?php endforeach; ?>                                                                                  
                            </ul>
                        </div>

                        <div class="panel-footer">
                            <form class="form-horizontal" name="frm-money-in" id="frm-money-in">
                                <div class="row-fluid">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="type" id="type-in" value="1"/>
                                            <input type="hidden" name="id" id="id-in"/>
                                            <input type="text" class="form-control validate[required]" name="detail" id="detail-in" placeholder="ชื่อรายการ"/>                                                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="form-group">
                                        <div class="col-md-10">
                                            <input type="number" class="form-control validate[required]" name="price" id="price-in" placeholder="ราคา"/>
                                        </div>       
                                        <div class="col-md-2">
                                            <button type="submit"  class="btn btn-primary">
                                                <i class="icon-save"></i>
                                            </button>
                                        </div>                                    
                                    </div>
                                </div>                                
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="chat-panel panel panel-danger">
                        <div class="panel-heading">
                            <i class="icon-comments"></i>
                            รายจ่ายออก
                            <div class="btn-group pull-right">
                                <button data-toggle="dropdown" type="button">
                                    <i class="icon-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu slidedown">
                                    <li>
                                        <a href="#" onclick="reloadDelay(1)">
                                            <i class="icon-refresh"></i> Refresh
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class=" icon-comment"></i> Available
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-time"></i> Busy
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-tint"></i> Away
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-signout"></i> Sign Out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <ul class="chat">
                                <?php foreach ($listMoneyOut as $data): ?>
                                    <li class="left clearfix">                                        
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font"> (<?= $data['money_createdate'] ?>)</strong>
                                                <small class="pull-right text-muted">
                                                    <i class="icon-money"></i> <?= $data['money_price'] ?>
                                                </small>
                                                <br/>
                                                <p><?= $data['money_detail'] ?></p>
                                            </div>
                                        </div>
                                        <span class="chat-img pull-right">
                                            <button type="button" class="btn btn-primary btn-rect" onclick="editMoney(<?= $data['money_id'] ?>)">
                                                <i class="icon-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-rect"  onclick="deleteItem(<?= $data['money_id'] ?>,'index.php?r=Money/DeleteMoney')">
                                                <i class="icon-trash"></i>
                                            </button>
                                        </span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <div class="panel-footer">
                            <form class="form-horizontal" name="frm-money-out" id="frm-money-out">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="hidden" name="type" id="type-out" value="2"/>
                                        <input type="hidden" name="id" id="id-out"/>
                                        <input type="text" class="form-control validate[required]" name="detail" id="detail-out" placeholder="ชื่อรายการ"/>                                                                    
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-10">
                                        <input type="number" class="form-control validate[required]" name="price" id="price-out" placeholder="ราคา"/>
                                    </div>       
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-danger">
                                            <i class="icon-save"></i>
                                        </button>
                                    </div>                                    
                                </div>                               
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel-footer">

        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        var valid = $('#frm-money-out').validationEngine('attach', {
            onValidationComplete: function(form, status) {
                //alert("The form status is: " + status + ", it will never submit");
                if (status == true) {
                    PostJson('frm-money-out', 'index.php?r=Money/SaveMoney');
                }
            }
        });
    var valid = $('#frm-money-in').validationEngine('attach', {
            onValidationComplete: function(form, status) {
            //alert("The form status is: " + status + ", it will never submit");
            if (status == true) {
                PostJson('frm-money-in', 'index.php?r=Money/SaveMoney');
                }
                    }         });
    });
    function editMoney(id) {
                    $.ajax({
            url: 'index.php?r=Money/NewMoney',
                    data: {
                id: id
            },
                type: 'get',
                    dataType: 'json',
            success: function(data) {
                    if (data.money_type == '1') {
                    $('#id-in').val(data.money_id);
            $('#detail-in').val(data.money_detail);
    $('#price-in').val(data.money_price);
                } else if (data.money_type == '2') {
                    $('#id-out').val(data.money_id);
                    $('#detail-out').val(data.money_detail);
                    $('#price-out').val(data.money_price);
                }
            }
        });
    }
</script>
