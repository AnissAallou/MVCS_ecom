var vMyChart =
Highcharts.chart('container', {
    chart: {
        type: 'bar'
    },
    title: {
        text: ''
    },
    subtitle: {
        // text: 'Source: <a href="https://en.wikipedia.org/wiki/World_population">Wikipedia.org</a>'
    },
    xAxis: {
        categories: [],
        // categories: ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
        title: {
            text: null
        },

        labels : {
          useHTML : true
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Nombre d\'articles',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    // tooltip: {
    //     valueSuffix: ' millions'
    // },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    // legend: {
    //     layout: 'vertical',
    //     align: 'right',
    //     verticalAlign: 'top',
    //     x: -40,
    //     y: 80,
    //     floating: true,
    //     borderWidth: 1,
    //     backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
    //     shadow: true
    // },
    credits: {
        enabled: false
    },
    series: [{
        name: '',
        data: []
    }
    // , {
    //     name: 'Year 1900',
    //     data: [133, 156, 947, 408, 6]
    // }, {
    //     name: 'Year 2000',
    //     data: [814, 841, 3714, 727, 31]
    // }, {
    //     name: 'Year 2016',
    //     data: [1216, 1001, 4436, 738, 40]
  // }
]
});
