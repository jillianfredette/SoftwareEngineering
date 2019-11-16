$(function() {
    var data1 = w_2011;
    var data2 = w_2019;
    data1.forEach(function(element, index) {
        if (element === 0) {
            data1[index] = null;
        }
    });
    data2.forEach(function(element, index) {
        if (element === 0) {
            data2[index] = null;
        }
    });
    var chart = $('#chart20').highcharts({
        chart: {
            type: 'line'
        },
        title: {
            text: 'Monthly Rainout Totals (2011 - 2019)'
        },
        legend: {
            itemStyle: {
                fontWeight: 'bold'
            }
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Rainout Totals'
            }
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            series: {
                dataLabels: {
                    enabled: false,
                    formatter: function() {
                        if (this.y != 0) {
                            return this.y;
                        }
                    }
                }
            }
        },
        series: [{
            name: '2011',
            data: data1,
            visible: false
        }, {
            name: '2012',
            data: w_2012,
            visible: false
        }, {
            name: '2013',
            data: w_2013,
            visible: false
        }, {
            name: '2014',
            data: w_2014,
            visible: false
        }, {
            name: '2015',
            data: w_2015,
            visible: false
        }, {
            name: '2016',
            data: w_2016,
            visible: false
        }, {
            name: '2017',
            data: w_2017,
            visible: false
        }, {
            name: '2018',
            data: w_2018
        }, {
            name: '2019',
            data: data2
        }]
    });
});

