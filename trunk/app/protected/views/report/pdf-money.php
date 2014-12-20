<link rel="stylesheet" href="./plugins/bootstrap/css/bootstrap.css" />
<style type="">
    table tr th{
        padding: 10px;
        font-weight: bold;
    }
    table tr td{
        padding: 10px;
    }
</style>
<h2>รายรับ รายจ่าย ของ <?= $date ?></h2>
<hr/>
<table class="table table-bordered">
    <thead>
        <tr>
            <th style="text-align: center">ลำดับ</th>
            <th style="text-align: center">ชื่อ</th>
            <th style="text-align: center">วันที่</th>
            <th style="text-align: center">ชนิด</th>
            <th style="text-align: right">ราคา</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $in = 0;
        $out = 0;
        $oper = "";
        ?>
        <?php for ($index = 0; $index < count($listMoney); $index++) : ?>
            <?php $data = $listMoney[$index] ?>
            <?php
            if ($data['money_type'] == 1):
                $in = ($in + $data['money_price']);
                $oper = "+";
            else:
                $out = ($out + $data['money_price']);
                $oper = "-";
            endif;
            ?>       
            <tr style="line-height: 15px;">
                <td style="text-align: center;"><?= ($index + 1) ?></td>
                <td><?= $data['money_detail'] ?></td>                
                <td style="text-align: center;"><?= DateUtil::formatDate($data['money_createdate']) ?></td>
                <td style="text-align: center;"><?= $data['money_typeth'] ?></td>                
                <td style="text-align: right"><?= "( " . $oper . " )" . number_format($data['money_price'], 2, ".", ",") ?></td>
            </tr>            
        <?php endfor; ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4" style="text-align: center;">รวม</th>
            <th style="text-align: right;"><?= number_format(($in - $out), 2, ".", ",") ?></th>
        </tr>
    </tfoot>
</table>
