<?php require_once('../Connections/Portal.php'); ?>
<?php
	$strProducto = "SELECT * FROM producto ORDER BY producto ASC";
	$resultProducto = $Portal->query($strProducto);
	$Producto = '<option value=""></option>';
	while( $fila = $resultProducto->fetch_array() )
	{
		$Producto.='<option value="'.$fila["producto"].'">'.$fila["producto"].'</option>';
	}

	$strCliente = "SELECT * FROM cliente ORDER BY Cliente ASC";
	$resultCliente = $Portal->query($strCliente);
	$Cliente = '<option value=""></option>';
	while( $fila = $resultCliente->fetch_array() )
	{
		$Cliente.='<option value="'.$fila["cliente"].'">'.$fila["cliente"].'</option>';
	}

	if(isset($_GET['annio']) && !empty($_GET['annio'])){
		$anno=$_GET['annio'];
		$y=$_GET['annio'];
	} else {
		$anno=date('2020');
		$y=date('2020');
	}
	
	$sqlAnnio=" and year(fechaReporte) = '".$y."' ";
	
	if(isset($_GET['Cliente']) && !empty($_GET['Cliente'])){
		$cliente=$_GET['Cliente'];
		$sqlCliente=" and cliente = '".$cliente."' ";
	} else {
		$cliente="PTESA";
		$sqlCliente="";
	}

	$meses = array('','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
	for($x=1;$x<=12;$x=$x+1){
		$casos1[$x]=0;	$casos13[$x]=0;
	}
	
	
	//*************************************//
	$sql1=mysqli_query($Portal,"SELECT fechaReporte, COUNT(*) As valor FROM casos WHERE idCaso IS NOT NULL ".$sqlAnnio.$sqlCliente." GROUP BY 1;");
	while($row=mysqli_fetch_array($sql1)){
	$y=date("Y", strtotime($row['fechaReporte']));	$mes=(int)date("m", strtotime($row['fechaReporte'])); 
	if($y==$anno){ $casos1[$mes]=$casos1[$mes]+$row['valor']; }}
		
	$sql12=mysqli_query($Portal,"SELECT count(*) as valor FROM casos WHERE idCaso IS NOT NULL ".$sqlAnnio.$sqlCliente.";");
	$row12=mysqli_fetch_array($sql12);
	$total1=$row12['valor'];

	$sql13=mysqli_query($Portal,"SELECT month(fechaReporte) Mes, SLA_ResolCliente('$cliente',fechaReporte,'$y') '%Resolucion' FROM casos 
	WHERE idCaso IS NOT NULL ".$sqlAnnio." GROUP BY 1;");
	while($row13=mysqli_fetch_array($sql13)){
	$mes13=$row13['Mes']; if($y==$anno){ $casos13[$mes13]=$casos13[$mes13]+$row13['%Resolucion']; }}
	
?>
<html style="zoom:90%;">
<head>
	<link rel="stylesheet" href="../dist/css/adminlte.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="http://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/drilldown.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
</head>
<body>

	<form action="ResolClientes" method="get">
	  <div class="container-fluid">
		<div class="row">
		  <div class="col-md-12">
			<!-- general form elements -->
			  <div class="row">
				<div class="col-md-2">
				  <div class="form-group">
					<select class="form-control form-control-sm" id="annio" name="annio" >
					  <option ></option>
					  <option value="2020">2020</option>
					  <option value="2019">2019</option>
					  <option value="2018">2018</option>
					</select>
				  </div>
				</div>
				<div class="col-md-3">
				  <div class="form-group">
					<select class="form-control form-control-sm" id="Cliente" name="Cliente"><?php echo $Cliente; ?></select>
				  </div>
				</div>
				<!-- /.col -->
				<div class="col-md-2">
				  <div class="form-group">
					<button type="submit" class="btn btn-outline-primary  fas fa-filter " />
				  </div>
				</div>
			  </div>
		  </div>
		  <div class="col-md-12">
			<div class="form-group">
			  <div id="container" style="height: 250px;"/>
			  <!--div id="container" style="width: 100%; height: 100%; margin: 0 auto"></div-->
			</div>
		  </div>
		</div>
	  </div>
	</form>

<script language="JavaScript">
$(function () {
    $(document).ready(function() {
	var chart;
	$('#container').highcharts({
		chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: 'Escalamiento | Resolutividad Clientes'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: [{ // Primary yAxis
        labels: {
            format: '{value}',
            style: {
				color: '#00417a',
                //color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Escalados',
            style: {
				color: '#00417a',
                //color: Highcharts.getOptions().colors[1]
            }
        }
    }, { // Secondary yAxis
        title: {
            text: 'Resolucion',
            style: {
                color: '#ffc107'
            }
        },
		plotLines: [{
                value: 90,
                color: '#28a745',
                dashStyle: 'shortdash',
                width: 1,
				label:{text:'90%'},
                }],
        labels: {
            format: '{value}%',
            style: {
				color: '#ffc107'
                //color: Highcharts.getOptions().colors[0]
            }
        },
        opposite: true
    }],
	legend: {
        enabled: false
    },
	tooltip: {
        shared: true
    },
	series: [{
		name: 'Casos Total',
        colorByPoint: true,
        data: [{
            name: 'Total Escalados',
			color: '#00417a',
            y: <?php echo $total1 ?>,
            drilldown: 'Escalados'
        }]
    }, {
        name: 'Resolucion',
		colorByPoint: true,
		data: [{
            //name: 'Escalados',
            y: 0,
            drilldown: 'Resolutividad'
        }]
    }],
    drilldown: {
        allowPointDrilldown: false,
        series: [{
			id: 'Resolutividad',
            name: 'Escalados',
			color: '#00417a',
            data: (function() {
			   var data = [];
				<?php
					for($x=1;$x<=12;$x=$x+1){
				?>
				data.push(['<?php echo $meses[$x]; ?>',  <?php echo $casos1[$x] ?>]);
				<?php } ?>
			return data;
			})(),
        }, {
			id: 'Escalados',
            name: '%Resolucion',
			color: '#ffc107',
            type:'spline',
			zIndex: 1,
            data: (function() {
			   var data = [];
				<?php
					for($x=1;$x<=12;$x=$x+1){
				?>
				data.push(['<?php echo $meses[$x]; ?>',  <?php echo $casos13[$x] ?>]);
				<?php } ?>
			return data;
			})(),
			yAxis: 1,
			tooltip: {
            valueSuffix: '%'
			},
        }],
    },
	credits: {
			enabled: false
	}
});
});
});
</script>
</body>
</html>