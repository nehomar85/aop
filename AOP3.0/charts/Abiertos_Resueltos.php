<?php require_once('../connections/Portal.php'); ?>
<?php
	
	$y=date('Y');
	
	//ABIERTOS
	$sql11=mysqli_query($Portal,"SELECT count(*) as valor FROM casos WHERE fechaSolucion is null and estatus = 'Abierto';");
	$row7=mysqli_fetch_array($sql11);
	$total=$row7['valor'];
	
	//RESUELTOS MES
	$sql21=mysqli_query($Portal,"SELECT count(*) as valor FROM casos WHERE fechaSolucion is not null and month(fechaReporte) = month(now()) and year(fechaReporte) = '$y';");
	$row8=mysqli_fetch_array($sql21);
	$total2=$row8['valor'];
	
	//PENDIENTE CLIENTES
	$sql31=mysqli_query($Portal,"SELECT count(*) as valor FROM casos WHERE fechaSolucion is null and estatus = 'Pendiente por Cliente';");
	$row9=mysqli_fetch_array($sql31);
	$total3=$row9['valor'];
	
	//PENDIENTE INGENIERIA
	$sql41=mysqli_query($Portal,"SELECT count(*) as valor FROM casos WHERE fechaSolucion is null and estatus = 'Pendiente por Ing';");
	$row10=mysqli_fetch_array($sql41);
	$total4=$row10['valor'];

?>
<html>
<head>
<title>.:Operaciones-Ptesa:.</title>
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   <script src="http://code.highcharts.com/highcharts.js"></script>
   <script src="https://code.highcharts.com/modules/data.js"></script>
   <script src="https://code.highcharts.com/modules/exporting.js"></script>
</head>
<body>
<div id="container" style="min-width: 250px; max-width: 100%; height: 100%; margin: 0 auto"></div>
<script language="JavaScript">
$(function () {
    $(document).ready(function() {
	var chart;
	$('#container').highcharts({
		chart: {
        type: 'pie'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: '% Estatus Global'
    },
    plotOptions: {
        series: {
			allowPointSelect: true,
            dataLabels: {
                enabled: true,
                format: '{point.name}: {point.y} ({point.percentage:.1f}%)',
				style:{
					fontSize:"11px",
					fontWeight: 'normal'
				}
            }
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> ({point.percentage:.1f}%)<br/>'
    },
    series: [{
        name: 'Casos',
        colorByPoint: true,
        data: [{
            name: 'Resueltos',
			y: <?php echo $total2 ?>,
			color: '#3291f6'
        },{
            name: 'Abiertos',
            y: <?php echo $total ?>,
			color: '#dc3545',
			sliced: true,
            selected: true
        },{
            name: 'Pendiente Cliente',
            y: <?php echo $total3 ?>,
			color: '#28a745'
        },{
            name: 'Pendiente Ingenieria',
            y: <?php echo $total4 ?>,
			color: '#ffc107'
        }]
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