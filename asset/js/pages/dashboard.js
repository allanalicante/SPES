var optionsProfileVisit = {
	annotations: {
		position: 'back'
	},
	dataLabels: {
		enabled:false
	},
	chart: {
		type: 'bar',
		height: 300
	},
	fill: {
		opacity:1
	},
	plotOptions: {
	},
	series: [{
		name: 'students',
		data: [83,189,221,178,158,216,256]
	}],
	colors: ['#435ebe'],
	xaxis: {
		categories: ["Kinder","Grade 1","Grade 2","Grade 3","Grade 4","Grade 5","Grade 6"],
	},
}

let optionsVisitorsProfile  = {
	series: [70,40,24,3,4],
	labels: ['Online-Class','Modular','Blended','Radio','Television'],
	colors: ['#435ebe','#55c6e8','#20c997','#9932CC','#F7c8d9'],
	chart: {
		type: 'donut',
		width: '100%',
		height:'350px'
	},
	legend: {
		position: 'bottom'
	},
	plotOptions: {
		pie: {
			donut: {
				size: '30%'
			}
		}
	}
}

var optionsGender = {
	series: [{
		data: [800,697]
	  }],
		chart: {
		type: 'bar',
		height: 300
	  },
	  plotOptions: {
		bar: {
		  barHeight: '60%',
		  distributed: true,
		  horizontal: true,
		  dataLabels: {
			position: 'bottom'
		  },
		}
	  },
	  colors: ['#33b2df', '#F7c8d9'],
	  dataLabels: {
		enabled: true,
		textAnchor: 'start',
		style: {
		  colors: ['#fff']
		},
		formatter: function (val, opt) {
		  return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val
		},
		offsetX: 0,
		dropShadow: {
		  enabled: true
		}
	  },
	  stroke: {
		width: 1,
		colors: ['#fff']
	  },
	  xaxis: {
		categories: ['Boys', 'Girls'],
	  },
	  yaxis: {
		labels: {
		  show: false
		}
	  },
	  tooltip: {
		theme: 'dark',
		x: {
		  show: false
		},
		y: {
		  title: {
			formatter: function () {
			  return ''
			}
		  }
		}
	  }
  };



var optionsEurope = {
	series: [{
		name: 'series1',
		data: [310, 800, 600, 430, 540, 340, 605, 805,430, 540, 340, 605]
	}],
	chart: {
		height: 80,
		type: 'area',
		toolbar: {
			show:false,
		},
	},
	colors: ['#5350e9'],
	stroke: {
		width: 2,
	},
	grid: {
		show:false,
	},
	dataLabels: {
		enabled: false
	},
	xaxis: {
		type: 'datetime',
		categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z","2018-09-19T07:30:00.000Z","2018-09-19T08:30:00.000Z","2018-09-19T09:30:00.000Z","2018-09-19T10:30:00.000Z","2018-09-19T11:30:00.000Z"],
		axisBorder: {
			show:false
		},
		axisTicks: {
			show:false
		},
		labels: {
			show:false,
		}
	},
	show:false,
	yaxis: {
		labels: {
			show:false,
		},
	},
	tooltip: {
		x: {
			format: 'dd/MM/yy HH:mm'
		},
	},
};

let optionsAmerica = {
	...optionsEurope,
	colors: ['#008b75'],
}
let optionsIndonesia = {
	...optionsEurope,
	colors: ['#dc3545'],
}



var chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visit"), optionsProfileVisit);
var chartVisitorsProfile = new ApexCharts(document.getElementById('chart-visitors-profile'), optionsVisitorsProfile)
var genderchart = new ApexCharts(document.querySelector("#chart-gender"), optionsGender);
       
var chartEurope = new ApexCharts(document.querySelector("#chart-europe"), optionsEurope);
var chartAmerica = new ApexCharts(document.querySelector("#chart-america"), optionsAmerica);
var chartIndonesia = new ApexCharts(document.querySelector("#chart-indonesia"), optionsIndonesia);

chartIndonesia.render();
chartAmerica.render();
chartEurope.render();
chartProfileVisit.render();
chartVisitorsProfile.render();
genderchart.render();