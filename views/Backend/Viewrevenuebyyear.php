<?php
$totalRevenue = 0;
$year = isset($_POST['year']) ? $_POST['year'] : date('Y');

if (isset($_POST['filter_specific']) && !empty($year)) {
    $filteredData = array_filter($data['databyyear'], function($order) use ($year) {
        return $order['year'] == $year;
    });
    $data['databyyear'] = $filteredData;
}
?>

<form method="post" action="">
    <label for="year">Chọn năm:</label>
    <input type="number" id="year" name="year" min="2000" max="<?= date('Y'); ?>" value="<?= htmlspecialchars($year); ?>" placeholder="YYYY">

    <input type="submit" name="filter_specific" value="Lọc theo năm">
    <input type="submit" name="filter_all" value="Lọc Tất Cả">
</form>

<table align="center" width="60%" border="1">
    <tr>
        <td colspan="2">
            <h3 style="text-align:center;">Doanh Thu Theo Năm</h3>
        </td>
    </tr>
    <tr>
        <th>Năm</th>
        <th>Doanh Thu</th>
    </tr>

    <?php 
    if (!empty($data['databyyear'])) {
        foreach ($data['databyyear'] as $r):
            if (isset($r['year']) && isset($r['total_revenue'])):
                $totalRevenue += $r['total_revenue'];
    ?>
        <tr>
            <td><?= htmlspecialchars($r['year']); ?></td>
            <td><?= number_format($r['total_revenue'], 0, '', ' ') . " VND"; ?></td>
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
        data.addColumn('string', 'Năm');
        data.addColumn('number', 'Doanh Thu');

        <?php if (!empty($data['databyyear'])): ?>
            <?php foreach ($data['databyyear'] as $r): ?>
                data.addRow(['<?= htmlspecialchars($r['year']); ?>', <?= $r['total_revenue']; ?>]);
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

<div id="chart_div" style="width: 800px; height: 600px; margin: 0 auto;"></div>
