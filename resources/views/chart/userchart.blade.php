<html>
<body>
<div id="container"></div>
</body>

<script src="https://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript">
var userData = <?php echo json_encode($userData)?>;
Highcharts.chart('container', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'No. of Registered Users'
    },
    subtitle: {
        text: 'ShopPhone'
    },
    xAxis: {
        categories: <?php echo json_encode($xAxisCategories)?>,
        title: {
            text: 'Month'
        }
    },
    yAxis: {
        title: {
            text: 'Number of New Users'
        }
    },
    series: [{
        name: 'Users',
        data: <?php echo json_encode($userData)?>
    }]
});
</script>
</html>
