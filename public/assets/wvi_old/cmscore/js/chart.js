var defaultChartJsColors = [
	'#337ab7',
	'#4dc9f6',
	'#f67019',
	'#f53794',
	'#acc236',
	'#ff0000',
];

	function GenerateLineChart(element, ajaxUrl, labelsX, labelsZ, borderColors, data){
		if (!borderColors) borderColors = [];
        data = typeof data === 'undefined' ? {} : data;
		$.ajax({
			url: ajaxUrl,
			method: 'GET',
            data: data,
			success: function(data) {
				var currentData = data.data;
				var datasets = [];
				labelsZ.forEach(function(labelZ, index){
					var borderColor = (borderColors[index]) ? borderColors[index] : (defaultChartJsColors[index] ? defaultChartJsColors[index] : defaultChartJsColors[0]);
					datasets.push({
						label: labelZ,
						borderColor: borderColor,
						backgroundColor: transparentize(borderColor),
						fill: true,
						data: currentData[index],
					});
				});

				new Chart($(element)[0].getContext('2d'), {
					type: 'line',
					data: {
						labels: labelsX,
						datasets: datasets
					},
					options: {
						legend: {
							display: true,
							position: 'top'
						},
						tooltips: {
							mode: 'index',
							intersect: false,
							callbacks: {
								label: function (tooltipItems, data) {
									return data.datasets[tooltipItems.datasetIndex].label + ' : ' + tooltipItems.yLabel;
								}
							}
						},
						responsive: true,
						scales: {
							xAxes: [{
								stacked: true,
								maxBarThickness: 100,
							}],
							yAxes: [{
								stacked: false,
								ticks: {
									beginAtZero: false
								}
							}]
						},
					}
				});

				Chart.plugins.register({
					afterDraw: function(chart) {
						if (currentData.length === 0) {
							// No data is present
							let ctx = chart.chart.ctx;
							let width = chart.chart.width;
							let height = chart.chart.height
							chart.clear();

							ctx.save();
							ctx.textAlign = 'center';
							ctx.textBaseline = 'middle';
							ctx.font = "16px normal 'Helvetica Nueue'";
							ctx.fillText('No data to display', width / 2, height / 2);
							ctx.restore();
						}
					}
				});
			},
			error: function(data) {
				console.log(data);
			}
		});
	}

