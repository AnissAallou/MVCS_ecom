var vMyChart =
Highcharts.chart('container', {
    chart: {
        type: 'area'
    },
    title: {
        text: ''
    },
    subtitle: {
        // text: 'Sources: <a href="https://thebulletin.org/2006/july/global-nuclear-stockpiles-1945-2006">' +
            // 'thebulletin.org</a> &amp; <a href="https://www.armscontrol.org/factsheets/Nuclearweaponswhohaswhat">' +
            // 'armscontrol.org</a>'
    },
    xAxis: {
		// categories:  <?php echo $resultabscisse; ?>,
		categories : [],
        allowDecimals: false,
        labels: {
            formatter: function () {
                return this.value; // clean, unformatted number for year
            }
        },

        labels : {
          useHTML : true
        }
    },
    yAxis: {
        // title: {
        //     text: ''
        // }
		// , labels: {
            // formatter: function () {
                // return this.value / 1000 + 'k';
            // }
        // }
    },
    tooltip: {
        // pointFormat: '{series.name} had stockpiled <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
    },
    plotOptions: {
        // area: {
            // pointStart: 1940,
            // marker: {
                // enabled: false,
                // symbol: 'circle',
                // radius: 2,
                // states: {
                    // hover: {
                        // enabled: true
                    // }
                // }
            // }
        // }
    },
    series: [{
        name: '',
        data: []
    }
	// , {
        // name: 'USSR/Russia',
        // data: [null, null, null, null, null, null, null, null, null, null,
            // 5, 25, 50, 120, 150, 200, 426, 660, 869, 1060,
            // 1605, 2471, 3322, 4238, 5221, 6129, 7089, 8339, 9399, 10538,
            // 11643, 13092, 14478, 15915, 17385, 19055, 21205, 23044, 25393, 27935,
            // 30062, 32049, 33952, 35804, 37431, 39197, 45000, 43000, 41000, 39000,
            // 37000, 35000, 33000, 31000, 29000, 27000, 25000, 24000, 23000, 22000,
            // 21000, 20000, 19000, 18000, 18000, 17000, 16000, 15537, 14162, 12787,
            // 12600, 11400, 5500, 4512, 4502, 4502, 4500, 4500
        // ]
    // }
	]
});
