<?php require_once('../connections/Portal.php'); ?>
<?php 

	$meses = array('','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
	for($x=1;$x<=12;$x=$x+1){
		$casos[$x]=0;	
		$casos2[$x]=0;		
	}
	$anno=date('Y');
	
	$sql=mysqli_query($Portal,"SELECT fechaReporte, COUNT(*) As valor
	FROM casos
	WHERE fechaReporte IS NOT NULL
	AND reabierto IS NULL
	GROUP BY 1;");
	while($row=mysqli_fetch_array($sql)){
		$y=date("Y", strtotime($row['fechaReporte']));
		
		$mes=(int)date("m", strtotime($row['fechaReporte'])); 
		
		if($y==$anno){
			$casos[$mes]=$casos[$mes]+$row['valor'];
		}
	}
	
	$sql2=mysqli_query($Portal,"SELECT fechaReporte, COUNT(*) As valor
	FROM casos
	WHERE fechaReporte IS NOT NULL
	AND reabierto='Si'
	GROUP BY 1");
	while($row2=mysqli_fetch_array($sql2)){
		$y=date("Y", strtotime($row2['fechaReporte']));
		
		$mes2=(int)date("m", strtotime($row2['fechaReporte'])); 
		
		if($y==$anno){
			$casos2[$mes2]=$casos2[$mes2]+$row2['valor'];
		}
	}
		
?>
<html>
<head>
<title>.:Operaciones-Ptesa:.</title>
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   <script src="http://code.highcharts.com/highcharts.js"></script>
   <script src="https://code.highcharts.com/modules/exporting.js"></script>
</head>
<body>
<div id="container" style="width: 100%; height: 100%; margin: 0 auto"></div>
<script language="JavaScript">
$(function () {
    $(document).ready(function() {
	var chart;
	$('#container').highcharts({
	    chart: {
        type: 'line'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: 'Escalados | Resueltos IMP'
    },
	xAxis: {
        categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
    },
	yAxis: {
		labels: {
		},
        title: {
            text: ''
        }
    },
	tooltip: {
		pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
        shared: true,
    },
	plotOptions: {
        series: {
            stacking: 'line'
        }
    },
	series: [{
	name: 'Escalados',
	data: (function() {
			   var data = [];
				<?php
					for($x=1;$x<=date('m');$x=$x+1){
				?>
				data.push(['<?php echo $meses[$x]; ?>',  <?php echo $casos[$x] ?>]);
				<?php } ?>
			return data;
			})(),
	color: '#138496',
	}, {
	name: 'Reabiertos',
	data: (function() {
			   var data = [];
				<?php
					for($x=1;$x<=date('m');$x=$x+1){
				?>
				data.push(['<?php echo $meses[$x]; ?>',  <?php echo $casos2[$x] ?>]);
				<?php } ?>
			return data;
			})(),
	color: '#343a40',
	}],
	credits: {
			enabled: false
	}
});
});
});
</script>
</body>
</html>