AmCharts.ready(function () {
	    // PIE CHART
	    chart = new AmCharts.AmPieChart();

	    // title of the chart
	    chart.addTitle("Student To District Ratio", 14);

	    chart.dataProvider = chartData;
	    chart.titleField = "Region";
	    chart.valueField = "Total Students";
	    chart.sequencedAnimation = true;
	    chart.startEffect = "elastic";
	    chart.innerRadius = "30%";
	    chart.startDuration = 2;
	    chart.labelRadius = 15;
	    chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>";
	    // the following two lines makes the chart 3D
	    chart.depth3D = 10;
	    chart.angle = 15;

	    // WRITE
	    chart.write("chartdiv");
	});