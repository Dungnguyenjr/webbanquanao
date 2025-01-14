<?php
        $obj = new Report;
   // Lấy dữ liệu từ mảng "data"
    $totalQuantity = $data["data"]["totalQuantity"];
    $totalRevenue = $data["data"]["totalRevenue"];
    // var_dump($data);
  

    ?>
<div style="text-align:center;">
    <h3>Đơn hàng đã bán thành công</h3>
    <p><strong>Tổng Số Lượng:</strong> <?php echo $totalQuantity; ?></p>
    <p><strong>Tổng Tiền:</strong> <?php echo number_format($totalRevenue, 0, '', ' ') . " VND"; ?></p>
</div>

<!-- Hiển thị biểu đồ cột -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Tổng Tiền');
        data.addColumn('number', 'Số tiền');

        data.addRow(['Tổng Tiền', <?php echo $totalRevenue; ?>]);

        var options = {
            title: 'Tổng người mua hàng thành công',
            vAxis: { title: 'Tổng Tiền (VND)' },
            width: 700,
            height: 500,
            colors: ['#4285F4'] 
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>
<!-- Không hiển thị bảng dữ liệu, chỉ giữ lại biểu đồ và các phần khác -->
<div id="chart_div" style="width: 700px; height: 550px; margin: 0 auto;"></div>
<div id="button_div" style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 5vh;">
    <a href="<?php echo BASE_URL;?>Report/chartbydate"><button style="margin-bottom: 10px;">Xem chi tiết các đơn hàng thành công theo ngày</button></a>
    <a href="<?php echo BASE_URL;?>Report/chartbyyear"><button style="margin-top: 10px;">Xem chi tiết các đơn hàng thành công theo năm</button></a>
</div>
