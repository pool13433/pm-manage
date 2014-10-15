<table class="table table-bordered dataTable">
    <thead>
        <tr>
            <th>รหัส</th>
            <th>ชื่อ</th>
            <th>เลือก</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listData as $data) : ?>
            <tr>
                <td style="width: 20%">'.$data['pro_id'].'</td>
                <td>'.$data['pro_id'].'</td>
                <td style="width: 10%">
                    <button class="btn btn-primary btn-rect">
                        <i class=" icon-check icon-1x"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>