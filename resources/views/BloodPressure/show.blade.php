<!DOCTYPE html>
<html lang="ja">
<head>
 <meta charset="utf-8">
 <title>グラフ</title> 
</head>
 <body>
		<h1>グラフ</h1>
   	<canvas id="myChart"></canvas>
		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
	<!-- グラフを描画 -->
   <script>
	//ラベル
	var labels = @json($days);
		
		

	
	//平均体重ログ
    var high_pressure = @json($high_pressures);
    
    var low_pressure = @json($low_pressures);

		
	
	

	//グラフを描画
   var ctx = document.getElementById("myChart");
   var myChart = new Chart(ctx, {
		type: 'line',
		data : {
			labels: labels,
			datasets: [
				{
					label: '収縮期血圧',
					data: high_pressure,
					borderColor: "rgba(255,51,102)",
         			backgroundColor: "rgba(0,0,0,0)"
				},
				{
					label: '拡張期血圧',
					data: low_pressure,
					borderColor: "rgba(102,153,255)",
         			backgroundColor: "rgba(0,0,0,0)"
				},	
			]
        },
		options: {
			title: {
				display: true,
				text: '血圧ログ（過去一ヶ月）'
			}
		}
   });
   </script>
   <!-- グラフを描画ここまで -->
 </body>
</html>
◆

<canvas id="myChart"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
