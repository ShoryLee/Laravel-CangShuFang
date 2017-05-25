$(document).ready(function(){

	// fullPage动画
	$('#fullpage').fullpage({
		css3: true,
        scrollingSpeed: 700,
        autoScrolling: true,
        fitToSection: true,
        fitToSectionDelay: 1000,
        scrollBar: false,
        verticalCentered: true,
        recordHistory: true,
        navigation: true,
        //页面加载完成后执行的动画
        afterLoad: function(link, index){
        	switch(index) {
        		case 1: 
        			move('#p1').scale(2.0).end();
        			move('#p1').scale(1.0).end();
        			move('#chart1').set('margin-left', '35%').end();
        		break;
        		case 2: 
        			move('#chart2').set('margin-top', '0px').end();
        			move('#p2').scale(0.7).end();
        		break;
        		default: break;
        	}
        },
        //离开当前页面执行的动画
        onLeave: function(link, index) {
			switch(index) {
        		case 1: 
        			move('#p1').scale(1.0).end();
        			move('#p1').scale(2.0).end();
        			move('#chart1').set('margin-left', '-20%').end();
        		break;
        		case 2: 
        			move('#chart2').set('margin-top', '30%').end();
        			move('#p2').scale(1.0).end();
        		break;
        		default: break;
        	}
        }
	});

	//开始图表绘制
	//第一个图表--饼图

	//获取书籍数据
	var categoryCount = [];
	var i = 0;
	$(".categoryCount").each(function() {
		categoryCount[i] = $(this).html();
		i++;
	});
	//alert(categoryCount);
    //设置饼图数据
	var pieData = {
	        labels: ["小说", "诗词", "哲学", "散文", "童话", "社会", "传记", "推理", "其它", "历史", "古典", "戏剧"],
	        datasets: [{
				data: categoryCount,
				backgroundColor: [
					'rgba(19, 21, 133, 0.9)',
					'rgba(139, 0, 139, 0.9)',
					'rgba(65, 105, 225, 0.9)',
					'rgba(32, 178, 170, 0.9)',
					'rgba(85, 107, 47, 0.9)',
                    'rgba(46, 139, 87, 0.9)',
					'rgba(255, 215, 0, 0.9)',
					'rgba(255, 165, 0, 0.9)',
					'rgba(255, 69, 0, 0.9)',
					'rgba(173, 255, 47, 0.9)',
                    'rgba(255, 250, 205, 0.9)',
					'rgba(222, 184, 135, 0.9)'
				],
				hoverBackgroundColor: [
	                'rgba(19, 21, 133, 0.6)',
	                'rgba(139, 0, 139, 0.6)',
	                'rgba(65, 105, 225, 0.6)',
	                'rgba(32, 178, 170, 0.6)',
	                'rgba(85, 107, 47, 0.6)',
	                'rgba(46, 139, 87, 0.6)',
					'rgba(255, 215, 0, 0.6)',
					'rgba(255, 165, 0, 0.6)',
					'rgba(255, 69, 0, 0.6)',
					'rgba(173, 255, 47, 0.6)',
					'rgba(255, 250, 205, 0.6)',
					'rgba(222, 184, 135, 0.6)'
	            ]
	        }]
	    };
	var ctx = $("#myChart");
	var myChart = new Chart(ctx, {
	    type: 'pie',
	    data: pieData
	});


	// 第二个图表--线图
	var monthCount = [];
	var j = 0;
	$(".monthCount").each(function() {
		monthCount[j] = $(this).html();
		j++;
	});
	//alert(monthCount);
	var lineData = {
    	labels: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
    	datasets: [
        	{
	            label: "趋势",
	            data: monthCount,
	            fill: true,	//是否填充曲线下方区域
	            lineTension: 0.0,	//曲线弧度
	            backgroundColor: "rgba(75,192,192,0.4)",
	            borderColor: "rgba(75,192,192,1)",
	            borderCapStyle: 'butt',
	            borderDash: [],
	            borderDashOffset: 0.0,
	            borderJoinStyle: 'miter',
	            pointBorderColor: "rgba(75,192,192,1)",
	            pointBackgroundColor: "#fff",	//曲线数值点填充色
	            pointBorderWidth: 1,
	            pointHoverRadius: 5,
	            pointHoverBackgroundColor: "rgba(75,192,192,1)",
	            pointHoverBorderColor: "rgba(220,220,220,1)",
	            pointHoverBorderWidth: 2,
	            // pointRadius: 1,	//是否显示曲线上的数据点
	            pointHitRadius: 10,
	            spanGaps: true	//
	        }
	    ]
	};
	var cty = $("#yourChart");
	var yourChart = new Chart(cty, {
		type: 'line',
		data: lineData,
		options: {
	        scales: {
	            xAxes: [{
	                display: true	//是否显示x轴数值
	            }],
	            yAxes: [{
	            	display: true,	// 是否显示y轴数值
	            	stacked: true	//是否从0开始计数，否则从数据中最小的数值开始
	            }]
	        }
    	}
	});
});