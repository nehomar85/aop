<?php require_once('../connections/Portal.php'); ?>
<?php 

	$meses = array('','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
	for($x=1;$x<=12;$x=$x+1){
		$casos[$x]=0;	
		$casos2[$x]=0;		
	}
	$anno=date('Y');
	
	if(isset($_GET['rangofechas']) && !empty($_GET['rangofechas'])){
		date_default_timezone_set('America/Bogota');
		$endDate= date('Y-m-d');
		$rango=$_GET['rangofechas'];
		switch ($rango) {
			case "week": $intervalo="SELECT date_sub('".$endDate."', interval 1 week) startDate "; break;
			case "1M": $intervalo="SELECT date_sub('".$endDate."', interval 1 month) startDate "; break;
			case "3M": $intervalo="SELECT date_sub('".$endDate."', interval 3 month) startDate "; break;
			case "6M": $intervalo="SELECT date_sub('".$endDate."', interval 6 month) startDate "; break;
			case "year": $intervalo="SELECT date_sub('".$endDate."', interval 1 year) startDate "; break;
		}
	} else {
		$intervalo="SELECT date('2020-01-01') startDate ";
		$endDate="2020-12-31";
	}
	
	$qry_date=mysqli_query($Portal,$intervalo);
	$row_qry_date=mysqli_fetch_assoc($qry_date);
	$startDate=$row_qry_date['startDate'];	
	
	$query = "SELECT date(fecha_imp) as Reporte, COUNT(*) As valor
	FROM implementaciones
	WHERE date(fecha_imp) between '$startDate' and '$endDate'
	GROUP BY 1;";
	$sql=mysqli_query($Portal,$query);
	while($row=mysqli_fetch_array($sql)){
		$fecha = date_create($row['Reporte']);
		$label[] = date_format($fecha, "'d-M'") ;
		$data[] = $row['valor'];
	}
	//echo $query;
	$query2 = "SELECT date(fecha_solucion) as Resueltos, COUNT(*) As valor
	FROM implementaciones
	WHERE date(fecha_imp) between '$startDate' and '$endDate'
	AND estatus in ('Resuelto','Cerrado')
	GROUP BY 1;";
	$sql2=mysqli_query($Portal,$query2);
	while($row2=mysqli_fetch_array($sql2)){
		$fecha2 = date_create($row2['Resueltos']);
		$label2[] = date_format($fecha, "'d-M'") ;
		$data2[] = $row2['valor'];
	}
	//echo $query2;
?>
<html style="zoom:90%;">
<head>
	<link rel="stylesheet" href="../dist/css/adminlte.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="http://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
</head>
<body>

	<form action="EscalamientoCasosImp" method="get">
	  <div class="container-fluid">
		<div class="row">
		  <div class="col-md-12">
			<!-- general form elements -->
			  <div class="row">
				<div class="col-md-2">
					<div class="form-group">
					  <div class="input-group">
						<div class="input-group-prepend">
						  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
						</div>
						<select class="form-control form-control-sm" id="rangofechas" name="rangofechas" >
						  <option disabled selected hidden>Rango de Fechas</option>
						  <option value="week">1 Semana</option>
						  <option value="1M">1 Mes</option>
						  <option value="3M">3 Meses</option>
						  <option value="6M">6 Meses</option>
						  <option value="year">1 Año</option>
						</select>
					  </div>
					  <!-- /.input group -->
					</div>
				</div>
				<!-- /.col -->
				<div class="col-md-3">
				  <div class="form-group">
					<button type="submit" class="btn btn-outline-primary fas fa-filter " />
					<?php if(isset($rango)){echo $rango." ";} else{ echo " 2020";} ?>
				  </div>
				</div>
			  </div>
		  </div>
		  <div class="col-md-12">
			<div class="form-group">
			  <div id="container" style="width: 100%; height: 230; margin: 0 auto"></div>
			</div>
		  </div>
		</div>
	  </div>
	</form>
	<!--div id="container" style="width: 100%; height: 100%; margin: 0 auto"></div-->
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
        categories: [<?php echo join($label, ',') ?>]
    },
	yAxis: {
		labels: {
		},
        title: {
            text: ''
        }
    },
	tooltip: {
		pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> <br/>',
        shared: true,
    },
	plotOptions: {
        series: {
            stacking: false
            //stacking: 'line'
        }
    },
	series: [{
            //type: 'line',
            name: 'Escalados IMP',
			//color: '#138496',
            data: [<?php echo join($data, ',') ?>]
        },{
            //type: 'line',
            name: 'Resueltos IMP',
			color: '#28a745',
            data: [<?php echo join($data2, ',') ?>]
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