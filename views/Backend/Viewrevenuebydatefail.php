<?php
$totalquantity = 0;
$start_date = isset($_POST['start_date']) ? $_POST['start_date'] : '';
$end_date = isset($_POST['end_date']) ? $_POST['end_date'] : '';

if (isset($_POST['filter_specific']) && !empty($start_date) && !empty($end_date)) {
    $filteredData = array_filter($data['databydate'], function($order) use ($start_date, $end_date) {
        $orderDate = strtotime($order['createdate']);
        return $orderDate >= strtotime($start_date) && $orderDate <= strtotime($end_date);
    });
    $data['databydate'] = $filteredData;
}

// Nhóm dữ liệu theo tháng và năm
$monthlyData = [];
foreach ($data['databydate'] as $r) {
    if (isset($r['createdate']) && isset($r['soluong'])) {
        // Lấy tháng và năm từ createdate
        $monthYear = date('Y-m', strtotime($r['createdate']));
        
        // Tính tổng số lượng cho mỗi tháng
        if (!isset($monthlyData[$monthYear])) {
            $monthlyData[$monthYear] = 0;
        }
        $monthlyData[$monthYear] += $r['soluong'];
    }
}
?>

<form method="post" action="">
    <label for="start_date">Từ ngày:</label>
    <input type="date" id="start_date" name="start_date" value="<?= htmlspecialchars($start_date); ?>">

    <label for="end_date">Đến ngày:</label>
    <input type="date" id="end_date" name="end_date" value="<?= htmlspecialchars($end_date); ?>">

    <input type="submit" name="filter_specific" value="Lọc từng tháng năm">
    <input type="submit" name="filter_all" value="Lọc Tất Cả">
</form>

<table align="center" width="60%" border="1" style="border-color: red;">
    <tr>
        <td colspan="2">
            <h3 style="text-align:center;">Bảng Thống Kê Số lượng theo tháng</h3>
        </td>
    </tr>
    <tr>
        <th>Tháng</th>
        <th>Số lượng</th>
    </tr>

    <?php 
    if (!empty($monthlyData)) {
        foreach ($monthlyData as $monthYear => $quantity):
            $totalquantity += $quantity;
    ?>
        <tr>
            <td><?= htmlspecialchars($monthYear); ?></td>
            <td><?= number_format($quantity, 0, '', ' '); ?></td>
        </tr>
    <?php
        endforeach;
    } else {
        echo "<tr><td colspan='2'>Không có dữ liệu</td></tr>";
    }
    ?>

    <tr>
        <td style="font-weight: bold;">Tổng</td>
        <td style="font-weight: bold;"><?= number_format($totalquantity, 0, '', ' '); ?></td>
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
        data.addColumn('string', 'Tháng');
        data.addColumn('number', 'Số lượng');

        <?php if (!empty($monthlyData)): ?>
            <?php foreach ($monthlyData as $monthYear => $quantity): ?>
                data.addRow(['<?= htmlspecialchars($monthYear); ?>', <?= $quantity; ?>]);
            <?php endforeach; ?>
        <?php endif; ?>

        var options = {
            vAxis: { title: 'Số Lượng: ' },
            width: 800,
            height: 600,
            colors: ['#FF0000']
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>

<div id="chart_div" style="width: 800px; height: 600px; margin: 0 auto;"></div>
