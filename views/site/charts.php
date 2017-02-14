<?php

/* @var $this yii\web\View */

$this->title = 'Charts';
?>

<div id="container"></div>

<script src="https://code.highcharts.com/highcharts.src.js"></script>
<script>
    var request = new XMLHttpRequest();
    request.open('GET', './data.json', false);
    request.send(null);
    var data = JSON.parse(request.responseText);

    Highcharts.chart('container', {
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: 'Средние показатели доходов'
        },
        subtitle: {
            text: ''
        },
        xAxis: [{
            categories: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн',
                'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
            crosshair: true
        }],
        yAxis: [{
            labels: {
                format: '${value}',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            title: {
                text: 'Количество',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            }
        }],
        tooltip: {
            shared: true
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            x: 120,
            verticalAlign: 'top',
            y: 100,
            floating: true,
            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
        },
        series: data
    });
</script>