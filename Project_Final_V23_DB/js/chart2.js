$(function() {
    var data = m_2019;
    var data2 = w_data_19;
    data.forEach(function(element, index) {
        if (element === 0) {
            data[index] = null;
        }
    });
    data2.forEach(function(element, index) {
        if (element === 0) {
            data2[index] = null;
        }
    });
    var chart = $('#chart10').highcharts({
        chart: {
            type: 'line'
        },
        title: {
            text: 'Monthly Ticket Purchases (2017 - 2019)',
            style: {
                color: 'white'
            }
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
                text: 'Ticket Puchases'
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
            name: '2017',
            data: m_2017
        }, {
            name: '2018',
            data: m_2018,
            color: '#ff828c'
        }, {
            name: '2019',
            data: data
            
        }]
    });
    var chart1 = $('#chart11').highcharts({
        chart: {
            type: 'line'
        },
        title: {
            text: 'Weekly Ticket Puchases (2018 - 2019)'
        },
        legend: {
            itemStyle: {
                fontWeight: 'bold'
            }
        },
        xAxis: {
        },
        yAxis: {
            title: {
                text: 'Ticket Puchases'
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
            name: '2018',
            data: w_data_18
        }, {
            name: '2019',
            data: data2,
            color: '#ff87af',
            visible: false
        }]
    });
});

function maxMonth(monthData){
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var max = Math.max.apply(null, monthData);
    var i = monthData.indexOf(max);
    return months[i];
}
function minMonth(monthData){
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var data_temp = [];
    var inx = 0;
    var cur_min = 1000000;
    for( var i = 0; i < monthData.length; i++ ){
        if(monthData[i] != 0)
        {
            if(monthData[i] < cur_min)
            {
                cur_min = monthData[i];
                inx = i;
            }
        }
    }
    return months[inx];
}
function percentDiffmax(monthData){
    var max = Math.max.apply(null, monthData);
    var sum = 0;
    var count = 0;
    for( var i = 0; i < monthData.length; i++ ){
        sum += parseInt( monthData[i], 10 ); //don't forget to add the base
        if(monthData[i] != 0)
        {
            count+=1;
        }
    }
    var avg = sum/count; 
    var pdif = ((max - avg)/avg)*100;
    var n = pdif.toFixed(2);
    return n;
}
function percentDiffmin(monthData){
    var data_temp = [];
    for( var i = 0; i < monthData.length; i++ ){
        if(monthData[i] != 0)
        {
            data_temp.push(monthData[i]);
        }
    }
    var min = Math.min.apply(null, data_temp);
    var sum = 0;
    var count = 0;
    for( var i = 0; i < monthData.length; i++ ){
        sum += parseInt( monthData[i], 10 ); //don't forget to add the base
        if(monthData[i] != 0)
        {
            count+=1;
        }
    }
    var avg = sum/count; 
    var pdif = (((avg - min)/avg)*100);
    var n = pdif.toFixed(2);
    return n;
}
function averageMonth(monthData){
    var sum = 0;
    var count = 0;
    for( var i = 0; i < monthData.length; i++ ){
        sum += parseInt( monthData[i], 10 ); //don't forget to add the base
        if(monthData[i] != 0)
        {
            count+=1;
        }
    }
    var avg = sum/count;
    avg = avg.toFixed(2);
    return avg;
}