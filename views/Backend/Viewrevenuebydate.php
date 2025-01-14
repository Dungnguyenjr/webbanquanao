<?php
$totalRevenue = 0;
$start_date = isset($_POST['start_date']) ? $_POST['start_date'] : '';
$end_date = isset($_POST['end_date']) ? $_POST['end_date'] : '';

if (isset($_POST['filter_specific']) && !empty($start_date) && !empty($end_date)) {
    $filteredData = array_filter($data['databydate'], function($order) use ($start_date, $end_date) {
        $orderDate = strtotime($order['createdate']);
        return $orderDate >= strtotime($start_date) && $orderDate <= strtotime($end_date);
    });
    $data['databydate'] = $filteredData;
}
?>

<form method="post" action="">
    <label for="start_date">Từ ngày:</label>
    <input type="date" id="start_date" name="start_date" value="<?= htmlspecialchars($start_date ?? ''); ?>">

    <label for="end_date">Đến ngày:</label>
    <input type="date" id="end_date" name="end_date" value="<?= htmlspecialchars($end_date ?? ''); ?>">

    <input type="submit" name="filter_specific" value="Lọc từng ngày">
    <input type="submit" name="filter_all" value="Lọc Tất Cả">
</form>


<table align="center" width="60%" border="1">
    <tr>
        <td colspan="2">
            <h3 style="text-align:center;">Doanh Thu</h3>
        </td>
    </tr>
    <tr>
        <th>Ngày</th>
        <th>Doanh Thu</th>
    </tr>

    <?php 
    if (!empty($data['databydate'])) {
        // Lặp qua từng đơn hàng để hiển thị dữ liệu
        foreach ($data['databydate'] as $r):
            // Kiểm tra dữ liệu có hợp lệ không
            if (isset($r['createdate']) && isset($r['tongtien'])):
                $totalRevenue += $r['tongtien']; // Tính tổng doanh thu
    ?>
        <tr>
            <td><?= htmlspecialchars($r['createdate']); ?></td>
            <td><?= number_format($r['tongtien'], 0, '', ' ') . " VND"; ?></td>
        </tr>
    <?php
            endif;
        endforeach;
    } else {
        echo "<tr><td colspan='2'>Không có dữ liệu</td></tr>";
    }
    ?>

    <tr>
        <td>Tổng</td>
        <td><?= number_format($totalRevenue, 0, '', ' ') . " VND"; ?></td>
    </tr>
</table>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(function () {
        drawChart();
    });

    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Ngày');
        data.addColumn('number', 'Doanh Thu');

        <?php if (!empty($data['databydate'])): ?>
            <?php foreach ($data['databydate'] as $r): ?>
                data.addRow(['<?= htmlspecialchars($r['createdate']); ?>', <?= $r['tongtien']; ?>]);
            <?php endforeach; ?>
        <?php endif; ?>

        var options = {
            title: 'Doanh Thu',
            vAxis: { title: 'Doanh Thu (VND)' },
            width: 800,
            height: 600,
            colors: ['#4285F4']
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>

<<div id="chart_div" style="width: 800px; height: 600px; margin: 0 auto;"></div>

