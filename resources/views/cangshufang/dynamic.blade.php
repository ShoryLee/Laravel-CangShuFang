<!DOCTYPE html>
<html>
<head>
	<title>动态 | 藏书房</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
	<link rel="icon" type="image/png" href="{{ asset('favicon-16x16.png') }}" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="{{ asset('static/css/jquery.fullpage.min.css') }}">
	<style type="text/css">
		body {
			background-color: #fefefe;
		}
		#hidden {
			display: none;
		}
		#p1, #p2 {
			text-align: center;
		}
		#chart1, #chart2 {
			width: 600px;
			height: 600px;
			float: none;
			display: block;
			margin-left: auto;
			margin-right: auto;
		}
		#chart1 {
			margin-left: -20%;

		}
		#chart2 {
			margin-top: 30%;
		}
	</style>
</head>
<body>
<div id="hidden">
	{{--书籍类目数量--}}
	<span class="categoryCount">{{ $countNovel }}</span>
	<span class="categoryCount">{{ $countPoem }}</span>
	<span class="categoryCount">{{ $countPhilosophy }}</span>
	<span class="categoryCount">{{ $countProse }}</span>
	<span class="categoryCount">{{ $countTale }}</span>
	<span class="categoryCount">{{ $countSocial }}</span>
	<span class="categoryCount">{{ $countBiography }}</span>
	<span class="categoryCount">{{ $countWhodunit }}</span>
	<span class="categoryCount">{{ $countOthers }}</span>
	<span class="categoryCount">{{ $countHistory }}</span>
	<span class="categoryCount">{{ $countClassical }}</span>
	<span class="categoryCount">{{ $countDrama }}</span>
	{{--每月书籍存入统计--}}
	<span class="monthCount">{{ $Jan }}</span>
	<span class="monthCount">{{ $Feb }}</span>
	<span class="monthCount">{{ $Mar }}</span>
	<span class="monthCount">{{ $Apr }}</span>
	<span class="monthCount">{{ $May }}</span>
	<span class="monthCount">{{ $Jun }}</span>
	<span class="monthCount">{{ $Jul }}</span>
	<span class="monthCount">{{ $Aug }}</span>
	<span class="monthCount">{{ $Sep }}</span>
	<span class="monthCount">{{ $Nov }}</span>
	<span class="monthCount">{{ $Oct }}</span>
	<span class="monthCount">{{ $Dec }}</span>
</div>
<div id="fullpage">

	<div class="section">
		<h2 id="p1">藏书房书籍类目比例</h2>
		<div id="chart1">
			<canvas id="myChart" width="200" height="200"></canvas>
		</div>
	</div>
	<div class="section">
		<h1 id="p2">每个月书籍存入趋势</h1>
		<div id="chart2">
			<canvas id="yourChart" width="200" height="200"></canvas>	
		</div>
	</div>
</div>

<!-- jquery -->
<script type="text/javascript" src="{{ asset('static/js/jquery-3.1.1.min.js') }}"></script>
<!-- fullPage -->
<script type="text/javascript" src="{{ asset('static/js/jquery.fullpage.min.js') }}"></script>
<!-- animation -->
<script type="text/javascript" src="{{ asset('static/js/move.min.js') }}"></script>
<!-- Chart -->
<script type="text/javascript" src="{{ asset('static/js/Chart.min.js') }}"></script>
<!-- myJS -->
<script type="text/javascript" src="{{ asset('static/js/dynamic.js') }}"></script>
</body>
</html>