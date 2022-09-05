$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Gráfica de columnas apiladas'
        },
        xAxis: {
            categories: ['Manzanas', 'Naranjas', 'Peras', 'Uvas', 'Plátanos']
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total consumición de futa'
            },
            stackLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                }
            }
        },
        legend: {
            align: 'right',
            x: -30,
            verticalAlign: 'top',
            y: 25,
            floating: true,
            backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
            borderColor: '#CCC',
            borderWidth: 1,
            shadow: false
        },
        tooltip: {
            formatter: function () {
                return '<b>' + this.x + '</b><br/>' +
                    this.series.name + ': ' + this.y + '<br/>' +
                    'Total: ' + this.point.stackTotal;
            }
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: true,
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                    style: {
                        textShadow: '0 0 3px black'
                    }
                }
            },
          series: {
            animation: false
          }
        },
        series: [{
            name: 'Juan',
            data: [5, 3, 4, 7, 2]
        }, {
            name: 'Julia',
            data: [2, 2, 3, 2, 1]
        }, {
            name: 'Julian',
            data: [3, 4, 4, 2, 5]
        }]
    });
});