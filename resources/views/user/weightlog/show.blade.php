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
		
		

	
	//体重ログ
	var weights = @json($weights);
		
	
	

	//グラフを描画
   var ctx = document.getElementById("myChart");
   var myChart = new Chart(ctx, {
		type: 'line',
		data : {
			labels: labels,
			datasets: [
				{
					label: '体重',
					data: weights,
					borderColor: "rgba(255,204,102)",
         			backgroundColor: "rgba(0,0,0,0)"
				},
				
			]
		},
		options: {
			title: {
				display: true,
				text: '体重ログ（過去一ヶ月）'
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
