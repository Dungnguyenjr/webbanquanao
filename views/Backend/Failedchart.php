<?php
$obj = new Report;
// Lấy dữ liệu từ mảng "data"
$totalsoluong = $data["data"]["totalsoluong"];
$totalquantity = $data["data"]["totalquantity"];
?>

<div style="text-align:center;">
    <h3>Số lượng đơn hàng bị huỷ</h3>
    <p><strong>Tổng Số Lượng:</strong> <?php echo $totalsoluong; ?></p>
</div>

<!-- Hiển thị biểu đồ cột -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Loại Đơn Hàng'); // Thay đổi loại cột thành string
        data.addColumn('number', 'Số Lượng');

        data.addRow(['Đơn Hàng Bị Huỷ', <?php echo $totalquantity; ?>]); // Thêm nhãn cho hàng

        var options = {
            title: 'Tổng người Huỷ hàng',
            vAxis: { title: 'Số Lượng' },
            width: 700,
            height: 500,
            colors: ['#FF0000'] 
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>

<div id="chart_div" style="width: 700px; height: 550px; margin: 0 auto;"></div>
<div id="button_div" style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 5vh;">
    <a href="<?php echo BASE_URL;?>Report/chartbydatefail"><button style="margin-bottom: 10px;">Xem chi tiết các đơn hàng bị hủy theo ngày</button></a>
</div>