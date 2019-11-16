$(function() {
    var chart;
    for (var i = 0; i < exp.length; i++) {
        exp[i] *= -1;
    }
    $(document).ready(function() {
        Highcharts.setOptions({
            lang: {
                thousandsSep: ','
            }
        });
        //------------------------------------------------------------------------------------
        var income_expense_column = new Highcharts.Chart({
            chart: {
                renderTo: 'chart1',
                type: 'column'
            },
            title: {
                text: 'Income vs Expenses'
            },
            legend: {
                itemStyle: {
                    fontWeight: 'bold'
                }
            },
            tooltip: {
                valueDecimals: 2,
                valuePrefix: '$',
                valueSuffix: ' USD',
                thousandsSep: ','
            },
            xAxis: {
                categories: ['2017', '2018', '2019']
            },
            yAxis: {
                title: {
                    text: '$'
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Income',
                data: inc,
                color: '#4BE450'
            }, {
                name: 'Expenses',
                data: exp,
                color: '#E44B4B'
            }]
        });
        //------------------------------------------------------------------------------------
        var income_pi = new Highcharts.Chart({
            chart: {
                renderTo: 'chart2',
                type: 'pie'
            },
            title: {
                text: 'Income Breakdown (2017 - 2019)'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Income Source',
                colorByPoint: true,

                data: [{
                    name: 'Birthday Events',
                    y: e_bday
                }, {
                    name: 'Wedding Events',
                    y: e_wed,
                    color: '#f4ff7f'
                }, {
                    name: 'Company Party Events',
                    y: e_comp_party
                }, {
                    name: 'Misc. Events',
                    y: e_other
                }, {
                    name: 'Family Season Pass Tickets',
                    y: t_seas_fam
                }, {
                    name: 'Single Season Pass Tickets',
                    y: t_seas_sing
                }, {
                    name: 'Single Tickets',
                    y: t_single
                }, {
                    name: 'Family Tickets',
                    y: t_family
                }, {
                    name: 'Gift Shop Purchases',
                    y: c_gift
                }, {
                    name: 'First Aid Purchases',
                    y: c_firstaid
                }, {
                    name: 'Restaurant Purchases',
                    y: c_restaurant
                }, {
                    name: 'Hospitality',
                    y: c_restroom,
                    color: '#ffa0ea'
                }, {
                    name: 'Misc. Purchases',
                    y: c_other
                }]
            }]
        })
        //------------------------------------------------------------------------------------
        var expense_pi = new Highcharts.Chart({
            chart: {
                renderTo: 'chart3',
                type: 'pie'
            },
            title: {
                text: 'Expense Breakdown (2017 - 2019)'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Expense',
                colorByPoint: true,

                data: [{
                    name: 'TV Advertisements',
                    y: a_tv
                }, {
                    name: 'Billboard Advertisements',
                    y: a_bill
                }, {
                    name: 'Radio Advertisements',
                    y: a_rad
                }, {
                    name: 'Web Advertisements',
                    y: a_web
                }, {
                    name: 'Magazine Advertisements',
                    y: a_mag
                }, {
                    name: 'Misc. Advertisements',
                    y: a_other
                }, {
                    name: 'Paint Maintenance',
                    y: m_paint
                }, {
                    name: 'Breakdown Maintenance',
                    y: m_break
                }, {
                    name: 'Ride Parts',
                    y: m_part
                }, {
                    name: 'Complaint Handling',
                    y: m_comp
                }, {
                    name: 'Misc. Maintenance',
                    y: m_other
                }, {
                    name: 'Salary',
                    y: sal,
                    color: '#ffb5da'
                }]
            }]
        })
        //------------------------------------------------------------------------------------
    });
});