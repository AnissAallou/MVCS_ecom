var vMyChart = new Highcharts.Chart({
    chart: {
        renderTo: 'container',
        type: 'column',
        options3d: {
            enabled: true,
            alpha: 15,
            beta: 15,
            depth: 50,
            viewDistance: 25
        }
    },

	xAxis: {
		// categories: <?php echo $resultabscisse; ?>,
		// categories: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre']
		categories: [],

    labels : {
      useHTML : true
    }
	},

	yAxis: {
        title: {
            text: 'Nombre d'/'articles'
        }
    },

    title: {
        text: ''
    },
    subtitle: {
        // text: 'Test options by dragging the sliders below'
    },
    plotOptions: {
        column: {
            depth: 25
        }
    },
    series: [{
		name: '',
        data: []
    }]
});

function showValues() {
    $('#alpha-value').html(vMyChart.options.chart.options3d.alpha);
    $('#beta-value').html(vMyChart.options.chart.options3d.beta);
    $('#depth-value').html(vMyChart.options.chart.options3d.depth);
}

// Activate the sliders
$('#sliders input').on('input change', function () {
    vMyChart.options.chart.options3d[this.id] = parseFloat(this.value);
    showValues();
    vMyChart.redraw(false);
});

showValues();
